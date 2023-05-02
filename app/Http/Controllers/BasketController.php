<?php

namespace App\Http\Controllers;

use App\Orders;
use App\ProductPrices;
use App\Products;
use App\UserBasket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use TCG\Voyager\Facades\Voyager;

class BasketController extends Controller
{
    public $customer_id;
    public $memcached;
    public $customerKey;

    public function __construct()
    {
        $this->customer_id = Cookie::get('customer_id');
        // $this->memcached = new \Memcached();
        // $this->memcached->addServer('127.0.0.1', 11211);
        // $this->customerKey = md5('customer_'.$_SERVER['REMOTE_ADDR']);
        // $this->customer_id = $this->memcached->get($this->customerKey);
    }

    public function done(Request  $request){
        $full_name = $request->get('full_name');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $tax_number = $request->get('tax_number');
        $delivery = $request->get('delivery');
        $sku = UserBasket::where('customer_id', $this->customer_id)->first();
        $orders = new Orders();
        $orders->full_name = $full_name;
        $orders->address = $address;
        $orders->phone = $phone;
        $orders->vat = $tax_number;
        $orders->shipping = $delivery;
        $orders->status = 1;
        $orders->product = $this->customer_id;
        $orders->attributes = ' ';
        $orders->save();
        UserBasket::where('customer_id', $this->customer_id)->update([
            'active' => 0
        ]);
       // setcookie('customer_id', 'reload', strtotime('+1 month'));
          $sku = UserBasket::where('customer_id', $this->customer_id)->first();
          $sku = json_decode($sku->attributes)->sku;
          // $orders->sku = $sku;
          $orders->save();
        $this->memcached->set($this->customerKey, time());
       // Cookie::queue(Cookie::forget('customer_id'));
        return view('basket_success');
    }

    public function update(Request $request){
        $jsonBody = $request->getContent();
        $req = json_decode($jsonBody);
        UserBasket::where('id', $req->id)->update([
            'count' => $req->count
        ]);
        return response()->json(['error' => false, 'message' => '']);
    }

    public function remove(Request $request){
        $jsonBody = $request->getContent();
        $req = json_decode($jsonBody);
        UserBasket::where('id', $req->id)->delete();
        return response()->json(['error' => false, 'message' => '']);
    }

    public function checkout(Request $request){
        $jsonBody = $request->getContent();
        $req = json_decode($jsonBody);
        $sku = ProductPrices::where("color",$req->color)->where("size",$req->size)->where("product",$req->id)->first();
        UserBasket::insert([
            'customer_id' => $this->customer_id,
            'product_id' => $req->id,
            'count' => $req->count,
            'attributes' => json_encode([
                'color' => $req->color,
                'size'  => $req->size,
                'sku'   => $sku->sku,
            ]),
        ]);
        return response()->json(['error' => false, 'message' => '']);
    }

    public function index(){
        $languageIso = App::getLocale();
        $basket = UserBasket::where('customer_id', $this->customer_id)->where('active', 1)->get();
        $toView = [];
        foreach ($basket as $b){
            $atr = json_decode($b->attributes);
            $product = Products::where('id', $b->product_id)->first();
            if (isset($product->id)){
                $product->price = ProductPrices::where('product', $product->id)->where('color', $atr->color)->where('size', $atr->size)->first();
                $product->count = $b->count;
                $product->bid = $b->id;
                $toView['basket'][] = $product;
            }
            if (Voyager::translatable($product)) {
                $product = $product->translate($languageIso, getenv('DEF_LANGUAGE'));
            }
        }
        return view('basket', $toView);
    }
}
