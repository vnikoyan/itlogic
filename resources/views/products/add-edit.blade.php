@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
    $priceObject = false;
@endphp

@extends('voyager::master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/newStyles.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" value ="{{ config('app.url') }}" class="public-path">
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <input type="hidden" value="{{ public_path() }}" class="public-path">
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                          class="form-edit-add"
                          action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                          method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                    @if($edit)
                        {{ method_field("PUT") }}
                    @endif

                    <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                            @endphp

                            @foreach($dataTypeRows as $row)
                            <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $display_options = $row->details->display ?? NULL;
                                    if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                    }
                                @endphp
                                @if (isset($row->details->legend) && isset($row->details->legend->text))
                                    <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                @endif

                                <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    {{ $row->slugify }}
                                    @if ($row->field === 'price')
                                        @if ($edit)
                                            @php
                                                $priceObject = json_decode($dataTypeContent->price);
                                            @endphp
                                        @endif
                                    @endif
                                    @if ($row->field === 'features')
                                        <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }} #1</label>
                                        @else
                                        <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                        @endif
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if (isset($row->details->view))
                                        @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add'), 'view' => ($edit ? 'edit' : 'add'), 'options' => $row->details])
                                    @elseif ($row->type == 'relationship')
                                        @include('voyager::formfields.relationship', ['options' => $row->details])
                                    @else
                                        @if ($row->field === 'features')
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                            <input data-index="0" type="text" class="form-control" name="feature-0" id="feature-0" onkeyup="products.featuresSve(this)" placeholder="Feature text" value=" /" required>
                                </div>
                            <div id="featuresList" class="col-md-12">
                                            @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                        @endif
                                    @endif

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                    @if ($errors->has($row->field))
                                        @foreach ($errors->get($row->field) as $error)
                                            <span class="help-block">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                                @if ($row->field === 'features')
                                <div class="form-group col-md-12">
                                    <button id="addFeature" class="btn btn-info" onclick="event.preventDefault();products.addFeature()">Add new feature</button>
                                </div>
                                @endif
                            @endforeach

                                {{-- price table --}}
                                @php
                                    $sizesEdit = [];
                                    $colorsEdit = [];
                                    $sizeNames = [];
                                    $colorNames = [];

                                    if ($priceObject){
                                        foreach ($priceObject as $po){
                                            if (!in_array($po->size, $sizesEdit)) {
                                                $sizesEdit[] = $po->size;
                                            }
                                            if (!in_array($po->color, $sizesEdit)) {
                                                $colorsEdit[] = $po->color;
                                            }
                                        }
                                    }

                                    if ($priceObject){
                                    foreach ($priceObject as $po){
                                    $sizesEdit[] = $po->size;
                                    $colorsEdit[] = $po->color;
                                    }
                                    }
                                @endphp
                                    <fieldset class="form-group col-md-12" >
                                        <legend class="text-left" style="background-color: #ffffff;padding: 5px;">Price</legend>
                                        <div class="col-md-3" style="padding: 10px;">
                                            <label for="color_dd_0">Color</label>
                                            <select id="color_dd_0" name="color_dd[]" class="price-color form-group select2" onchange="products.setColor(this)" multiple required>
                                                @foreach ($colors as $color)
                                                    @php
                                                        $colorNames[$color->id] = $color->name;
                                                    @endphp
                                                    <option value="{{ $color->id }}_{{ $color->name }}" @if (in_array($color->id, $colorsEdit, 0)) selected @endif>{{ $color->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6" style="padding: 10px;">
                                            <label for="size_dd_0">Size</label>
                                            <select onchange="products.setSize(this)" id="size_dd_0" name="size_dd" class="price-size form-group select2" multiple required>
                                                @foreach ($sizes as $size)
                                                    @php
                                                        $sizeNames[$size->id] = $size->name;
                                                    @endphp
                                                    <option value="{{ $size->id }}_{{ $size->name }}" @if (in_array($size->id, $sizesEdit, 0)) selected @endif>{{ $size->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </fieldset>

                                <table class="table">
                                    <thead>
                                    <tr id="sizes_head">
                                        <th></th>
                                        @foreach($sizesEdit as $se)
                                        @php
                                        $title = $sizeNames[$se];
                                        @endphp
                                        <th>{{ $title }}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody id="colors_row">
                                    @if ($priceObject)
                                        @php
                                        $tableRows = [];
                                        @endphp
                                        @foreach($priceObject as $tr)
                                            @php
                                                $tableRows[$tr->color][] = $tr;
                                            @endphp
                                        @endforeach
                                        @php
                                        $inputCount = 0;
                                        @endphp
                                        @foreach ($tableRows as $color_id => $tr)
                                            <tr>
                                                <td>{{ $colorNames[$color_id] }}</td>
                                                @php
                                                if ($inputCount < count($tr)){
                                                 $inputCount = count($tr);
                                                }
                                                @endphp
                                                @foreach ($tr as $input)
                                                    <td>
                                                        @if (isset($input->photos))
                                                             @foreach (json_decode($input->photos) as $key => $item)
                                                             <div class="form-group col-md-2">
                                                                 <img src = "{{ asset('storage/'.$item)}}" class="product-colors-images">
                                                                 <input type="hidden"  class= "pr-cl-img" value = "{{$item }}" id="images_{{$key+1}}" data-index="{{$input->index}}" data-color="{{$input->color}}" data-size="{{$input->size}}">
                                                                </div>    
                                                                @endforeach
                                                        @endif
                                                        <div style="padding-left: 0;padding-right: 0;" class="form-group col-md-3">
                                                            <input onkeyup="products.setPrice(this)" value="{{ $input->price }}" id="price_{{$input->index}}" data-index="{{$input->index}}" data-color="{{$input->color}}" data-size="{{$input->size}}" type="number" class="price-input form-control" placeholder="Price">
                                                        </div>
                                                        <div style="padding-left: 0;padding-right: 0;" class="form-group col-md-2">
                                                            <input onkeyup="products.setPrice(this)" value="{{$input->discount}}" id="discount_{{$input->index}}" data-index="{{$input->index}}" data-color="{{$input->color}}" data-size="{{$input->size}}" type="number" class="price-input form-control" placeholder="Discount">
                                                        </div>
                                                        <div style="padding-left: 0;padding-right: 0;" class="form-group col-md-2">
                                                            <input onkeyup="products.setSku(this)" value="{{ (!empty($input->sku)) ? $input->sku : " " }}" id="sku_{{$input->index}}" data-index="{{$input->index}}" data-color="{{$input->color}}" data-size="{{$input->size}}" type="text" class="form-control" placeholder="sku">
                                                        </div>
                                                    </td>
                                                @endforeach
                                                @for ($i = count($tr) -1 ; $i <= (count($sizesEdit) - $inputCount); $i++)
                                                    <td>
                                                        <div style="padding-left: 0;padding-right: 0;" class="form-group col-md-7">
                                                            <input onkeyup="products.setPrice(this)" value="0" id="price_{{ $i }}" data-index="{{ $i }}" data-color="{{ $color_id }}" data-size="{{ $sizesEdit[$i] }}" type="number" class="price-input form-control" placeholder="Price">
                                                        </div>
                                                        <div style="padding-left: 0;padding-right: 0;" class="form-group col-md-3">
                                                            <input onkeyup="products.setPrice(this)" value="0" id="discount_{{ $i }}" data-index="{{ $i }}" data-color="{{ $color_id }}" data-size="{{ $sizesEdit[$i] }}" type="number" class="price-input form-control" placeholder="Discount">
                                                        </div>
                                                        <div style="padding-left: 0;padding-right: 0;" class="form-group col-md-2">
                                                            <input onkeyup="products.setSku(this)" value="0"  id="sku_{{ $i }}" data-index="{{  $i }}" data-color="{{ $color_id }}" data-size="{{ $sizesEdit[$i] }}" type="text" class=" form-control" placeholder="sku">
                                                        </div>
                                                    </td>
                                                @endfor
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                {{-- / price table --}}

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            @section('submit-buttons')
                                <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                            @stop
                            @yield('submit-buttons')
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                          enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                               onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        var params = {};
        var $file;
        var priceTemplate;
        var featuresTemplate;
    </script>
    <script src="{{ asset('js/products.js?v='.date("Y-m-d H:i:s").'') }}"></script>
    <script>
        $('document').ready(function () {
            const featuresInput = document.getElementsByName('features')[0];
            featuresInput.style.display = 'none';
            $("[name='i18n_selector']").on('change', function (e) {
                products.switchLang(e.target.id)
            });
            featuresTemplate = `
            <div class="form-group col-md-12" id="features_box_${products.featureSelector}">
            <label class="control-label" for="features_inline_box_${products.featureSelector}">Feature #${products.featureSelectorForHuman}</label>
            <span class="language-label js-language-label">en</span>
            <div class="input-group col-md-12" id="features_inline_box_${products.featureSelector}">
                <input name="feature-${products.featureSelector}" id="feature-${products.featureSelector}" onkeyup="products.featuresSve(this)" data-index="${products.featureSelector}" placeholder="Feature text" type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)">
                <span class="input-group-addon"  style="background: #fa2a00; color: #fff;cursor: pointer;" onclick="products.removeFeature('${products.featureSelector}')"><span class="icon voyager-trash" data-toggle="tooltip" title="Remove this feature!"></span></span>
           </div>
            </div>
            `;
             priceTemplate = `<fieldset class="form-group col-md-12" id="price_${products.idSelector}">
                                    <legend class="text-left" style="background-color: #ffffff;padding: 5px;">Price <button class="btn btn-danger" onclick="event.preventDefault();products.remove('${products.idSelector}');">Remove</button></legend>
                                    <div class="col-md-3" style="padding: 10px;">
                                        <label for="color_dd_${products.idSelector}">Color</label>
                                        <select data-index="${products.idSelector}" onkeyup="products.setPrice(this)" id="color_dd_${products.idSelector}" name="color_dd_${products.idSelector}[]" class="form-group select2 s2c_${products.idSelector}" required>
                                            @foreach ($colors as $color)
             <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="padding: 10px;">
                                        <label for="size_dd_${products.idSelector}">Size</label>
                                        <select data-index="${products.idSelector}" onkeyup="products.setPrice(this)" id="size_dd_${products.idSelector}" name="size_dd_${products.idSelector}" class="form-group select2 s2s_${products.idSelector}" required>
                                            @foreach ($sizes as $size)
             <option value="{{ $size->id }}">{{ $size->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="padding: 10px;">
                                        <label for="price_dd_${products.idSelector}">Price</label>
                                        <input required="" type="number" id="price_dd_${products.idSelector}" data-index="${products.idSelector}" onkeyup="products.setPrice(this)" class="form-control" name="price_dd_${products.idSelector}" placeholder="Price" value="">
                                    </div>
                                    <div class="col-md-3" style="padding: 10px;">
                                        <label for="discount_dd_${products.idSelector}">Discount</label>
                                        <input required="" type="number" id="discount_dd_${products.idSelector}" data-index="${products.idSelector}" onkeyup="products.setPrice(this)" class="form-control" name="discount_dd_${products.idSelector}" placeholder="Discount" value="0">
                                    </div>

                                </fieldset>`;
            document.getElementsByName('images[]')[0].removeAttribute('required');
                                    @if($edit)
                                    document.getElementsByName('photo')[0].removeAttribute('required');
                                        products.parseTable();
                                        products.parseFeatures();
                                       @endif
        });

        function deleteHandler(tag, isMulti) {
            return function() {
                $file = $(this).siblings(tag);

                params = {
                    slug:   '{{ $dataType->slug }}',
                    filename:  $file.data('file-name'),
                    id:     $file.data('id'),
                    field:  $file.parent().data('field-name'),
                    multi: isMulti,
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text(params.filename);
                $('#confirm_delete_modal').modal('show');
            };
        }

        $('document').ready(function () {
            const subcategory = document.getElementsByName('subcategory');
            for(let i = 0; i < subcategory.length; i++){
                if (subcategory[i].nodeName !== "SELECT"){
                    subcategory[i].remove()
                }
            }
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: [ 'YYYY-MM-DD' ]
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop
