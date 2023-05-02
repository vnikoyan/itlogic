<?php

namespace App\Http\Controllers;
use App\Products;
use App\ProductPrices;
use App\Translate;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Facades\Voyager;
use App\Ads;
use Illuminate\Support\Facades\App;
use Config;
use Illuminate\Support\Facades\Storage;

class ProductsController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public function create(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? new $dataType->model_name()
            : false;

        foreach ($dataType->addRows as $key => $row) {
            $dataType->addRows[$key]['col_width'] = $row->details->width ?? 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'add');

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'add', $isModelTranslatable);

        $view = 'products.add-edit';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
    }

    public function edit(Request $request, $id)
    {

        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                $model = $model->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $model = $model->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$model, 'findOrFail'], $id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        foreach ($dataType->editRows as $key => $row) {
            $dataType->editRows[$key]['col_width'] = isset($row->details->width) ? $row->details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);
        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'edit', $isModelTranslatable);

        $view = 'products.add-edit';
        $productPrices = DB::table('product_prices')->where('product', $id)->get();

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }
        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
    }

    public function show(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $isSoftDeleted = false;

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                $model = $model->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $model = $model->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$model, 'findOrFail'], $id);
            if ($dataTypeContent->deleted_at) {
                $isSoftDeleted = true;
            }
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        // Replace relationships' keys for labels and create READ links if a slug is provided.
        $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType, true);

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'read');

        // Check permission
        $this->authorize('read', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);
        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'read', $isModelTranslatable);

        $view = 'voyager::bread.read';

        if (view()->exists("voyager::$slug.read")) {
            $view = "voyager::$slug.read";
        }
        
        return Voyager::view('products.read', compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'isSoftDeleted'));
    }

    public function update(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof \Illuminate\Database\Eloquent\Model ? $id->{$id->getKeyName()} : $id;

        $model = app($dataType->model_name);
        if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
            $model = $model->{$dataType->scope}();
        }
        if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
            $data = $model->withTrashed()->findOrFail($id);
        } else {
            $data = $model->findOrFail($id);
        }

        // Check permission
        $this->authorize('edit', $data);
        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id)->validate();
        $this->insertUpdateData($request, $slug, $dataType->editRows, $data);
        event(new BreadDataUpdated($dataType, $data));

        if (auth()->user()->can('browse', app($dataType->model_name))) {
            $redirect = redirect()->route("voyager.{$dataType->slug}.index");
        } else {
            $redirect = redirect()->back();
        }
        $pricesWithImg = array();
        $product_images = array();
        $priceJSON = $request->get('price');
        $priceObj = json_decode($priceJSON);
        $priceData = array();
        ProductPrices::where('product', '=', $id)->delete();
        foreach ($priceObj as $index => $price  ){
            $key = 'images_'.$index;
            $product_images = $request->$key;
            $product_images_src = [];
            $product_uploaded_images = $request->file('color_images_'.($index));
            if(!is_null($product_images)){
                $type = gettype($product_images[0]);
                foreach ($product_images as $product_image) {
                    if($type == "object"){
                        $image = $product_image->store('products_color', 'public');
                    }else{
                        $image = $product_image;
                    }
                    $product_images_src[] = $image;
                }
            }
            $priceData = [
                'product' => $id,
                'color' => $price->color,
                'size' => $price->size,
                'price' => $price->price,
                'photos' => json_encode($product_images_src),
                'discount' => $price->discount,
                'sku' => $price->sku,
            ];
            ProductPrices::insert($priceData);
            $priceData['index'] = (int) $index + 1;
            $pricesWithImg[] = $priceData;
        }
        $data = Products::where("id",$id)->first();
        $data->price= json_encode($pricesWithImg);
        $data->save();
        return $redirect->with([
            'message'    => __('voyager::generic.successfully_updated')." {$dataType->getTranslatedAttribute('display_name_singular')}",
            'alert-type' => 'success',
        ]);
    }

    public function store(Request $request)
    {
        $slug = $this->getSlug($request);
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
        $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());
        $pricesWithImg = array();
        $priceJSON = $request->get('price');
        $priceObj = json_decode($priceJSON);
        foreach ($priceObj as $index => $price){
            $product_images = $request->file('images_'.($index));
            $product_images_src = [];
            if(!is_null($product_images)){
                foreach ($product_images as $product_image) {
                    $image = $product_image->store('products_color', 'public');
                    $product_images_src[] = $image;
                }
            }
            $priceObj = [
                'product' => $data->id,
                'color' => $price->color,
                'size' => $price->size,
                'price' => $price->price,
                'photos' => json_encode($product_images_src),
                'discount' => $price->discount,
                'sku' => $price->sku,
            ];
            ProductPrices::insert($priceObj);
            $priceObj['index'] = (int) $index + 1;
            $pricesWithImg[] = $priceObj;
        }
        $data->price = json_encode($pricesWithImg);
        $data->save();
        event(new BreadDataAdded($dataType, $data));

        if (!$request->has('_tagging')) {
            if (auth()->user()->can('browse', $data)) {
                $redirect = redirect()->route("voyager.{$dataType->slug}.index");
            } else {
                $redirect = redirect()->back();
            }

            return $redirect->with([
                'message'    => __('voyager::generic.successfully_added_new')." {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
        } else {
            return response()->json(['success' => true, 'data' => $data]);
        }
    }

    public function destroy(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Init array of IDs
        $ids = [];
        if (empty($id)) {
            // Bulk delete, get IDs from POST
            $ids = explode(',', $request->ids);
        } else {
            // Single item delete, get ID from URL
            $ids[] = $id;
        }
        foreach ($ids as $id) {
            ProductPrices::where('product', '=', $id)->delete();
            $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

            // Check permission
            $this->authorize('delete', $data);

            $model = app($dataType->model_name);
            if (!($model && in_array(SoftDeletes::class, class_uses_recursive($model)))) {
                $this->cleanup($dataType, $data);
            }
        }

        $displayName = count($ids) > 1 ? $dataType->getTranslatedAttribute('display_name_plural') : $dataType->getTranslatedAttribute('display_name_singular');

        $res = $data->destroy($ids);
        $data = $res
            ? [
                'message'    => __('voyager::generic.successfully_deleted')." {$displayName}",
                'alert-type' => 'success',
            ]
            : [
                'message'    => __('voyager::generic.error_deleting')." {$displayName}",
                'alert-type' => 'error',
            ];

        if ($res) {
            event(new BreadDataDeleted($dataType, $data));
        }

        return redirect()->route("voyager.{$dataType->slug}.index")->with($data);
    }

    public function searchResultProduct(Request $request)
    {
        $languageIso = App::getLocale();

        $query = (string) $request->get('query');
        $products = new Products();
        if ($query){
            $products = $products->where("products.name","LIKE","%".$query."%")
            ->orWhere("products.short_description","LIKE","%".$query."%")
            ->orWhere("products.full_description","LIKE","%".$query."%")
            ->orWhere("products.features","LIKE","%".$query."%");
        }
        $products = $products->paginate(56);
        if (Voyager::translatable($products)) {
            $products = $products->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $ad = Ads::inRandomOrder()->first();
        if (Voyager::translatable($ad)) {
            $ad = $ad->translate($languageIso, getenv('DEF_LANGUAGE'));
        }
        $toView = [
            'ad' => $ad,
            'products' => $products,
            'query' => $query,
        ];
        return view('products.search', $toView);
    }

    public function searchProduct(Request $request){
        $languageIso = App::getLocale();
        $val = trim($request->input("value"));
        $data = array();
        $productsEn = Products::select("products.id","products.price","products.name","products.photo")
                            ->where("products.name","LIKE","%".$val."%")
                            ->orWhere("products.short_description","LIKE","%".$val."%")
                            ->orWhere("products.full_description","LIKE","%".$val."%")
                            ->orWhere("products.features","LIKE","%".$val."%")
                            ->limit(10)
                            ->get();
        foreach($productsEn as $k =>$v){
            $data[$k]['productId'] = $v->id;
            $data[$k]['languageIso'] = $languageIso;
            $data[$k]['price'] = json_decode($v->price);
            $data[$k]['image'] = $v->photo;
            $data[$k]['src'] = Config::get('app.url');
            $data[$k]['name']['en'] = $v->name;
            $row = Translate::join("products","products.id","=","translations.foreign_key")->where("translations.foreign_key",$v->id)->get();
            foreach($row as $trKey => $trValue){
                if($trValue->column_name == "name"){
                    $data[$k]['name'][$trValue->locale] = $trValue->value;
                }
            }
        }
        $productsTr = Translate::Where( function($query) use($val){
                                        return $query
                                                ->where("translations.column_name","features")
                                                ->where('translations.value', 'LIKE', "%".$val."%");
                                        })
                                ->orWhere(function($query) use($val){
                                         return $query
                                        ->where("translations.column_name","short_description")
                                        ->where('translations.value', 'LIKE', "%".$val."%");
                                })
                                ->orWhere(
                                    function($query) use($val){
                                    return $query
                                            ->where("translations.column_name","name")
                                            ->where('translations.value', 'LIKE', "%".$val."%");
                                })
                                ->orWhere(
                                    function($query) use($val){
                                    return $query
                                            ->where("translations.column_name","full_description")
                                            ->where('translations.value', 'LIKE', "%".$val."%");
                                })->where("table_name","products")->get();

        foreach($productsTr as $k => $v){
            if($v->table_name == "products"){
                $row = Translate::select("products.id","products.price","products.name","products.photo","translations.column_name","translations.table_name","translations.locale","translations.value")
                        ->join("products","products.id","=","translations.foreign_key")->where("translations.foreign_key",$v->foreign_key)->where("translations.column_name","!=","display_name")->where("translations.column_name","!=","features")->where("translations.column_name","!=","full_description")->get();
                if( count($row) > 0 ){
                    foreach($row as $trKey => $trVal){
                        if($trVal->table_name == "products"){
                        $data[$trVal->id]['productId'] = $trVal->id;
                        $data[$trVal->id]['languageIso'] = $languageIso;
                        $data[$trVal->id]['price'] = json_decode($trVal->price);
                        $data[$trVal->id]['image'] = $trVal->photo;
                        $data[$trVal->id]['src'] = Config::get('app.url');
                        $data[$trVal->id]['name']['en'] = $trVal->name;
                        if($trVal->column_name == "name"){
                            $data[$trVal->id]['name'][$trVal->locale] = $trVal->value;
                        }
                    }
                    }
                }
            }
        }

        $data = array_values($data);
        $data  = array_splice($data, 0, 10, $data);
        if(empty($data)){
            $data['message'] =  __('modal.no_result');
        }
        return $data;
    }

}
