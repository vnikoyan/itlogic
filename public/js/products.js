let products = {
    priceTplCount: 0,
    featureTplCount: 0,
    idSelector: 'PRICE_ID',
    featureSelector: 'FEATURE_ID',
    featureSelectorForHuman: 'FEATURE_HUMAN',
    priceTpl: '',
    featureTpl: '',
    priceObject: [],
    priceStorage: [],
    featuresObject: [],
    tableElement: 'pricesTable',
    featuresList: 'featuresList',
    colors: [],
    sizes: [],
    photos:[],
    photosPath:'',
    getCurrentStorage: () => {
        // const prodsArray = [];
        const priceStorageClone = Object.values(Object.assign(products.priceStorage))
        products.priceStorage = [];
        let currIndex = 0;
        if(priceStorageClone.length){
            products.colors.forEach(color => {
                // colorObjs = Object.values(priceStorageClone).filter(i => +color.id === +i.color)
                // if(colorObjs.length){
                //     colorObjs.forEach((element, index) => {
                //         const exist = Boolean(products.sizes.find(i => +i.id === +element.size))
                //         if(exist){
                //             currIndex++;
                //             products.priceStorage['item_' + currIndex] = {
                //                 'index': currIndex,
                //                 'color': element.color,
                //                 'size': element.size,
                //                 'price': element.price,
                //                 'discount': element.discount,
                //             };
                //         } else{
                //             console.log('HERE')
                //         }
                //     });
                // }
                products.sizes.forEach(size => {
                    currIndex++;

                    const exist = priceStorageClone.find(i => +i.color === +color.id && +i.size === +size.id)
                    if(exist){
                        products.priceStorage['item_' + currIndex] = {
                            'index': currIndex,
                            'color': exist.color,
                            'size': exist.size,
                            'price': exist.price,
                            'discount': exist.discount,
                            'sku': exist.sku,
                        };
                    } else {
                        products.priceStorage['item_' + currIndex] = {
                            'index': currIndex,
                            'color': +color.id,
                            'size': +size.id,
                            'price': 0,
                            'discount': 0,
                            'sku': sku,
                        };
                    }
                });
            });
            const sortedPriceStorage = Object.values(products.priceStorage).sort(function (a, b) {
                return a.color - b.color;
            });
            products.priceStorage = [];
            sortedPriceStorage.forEach((element, index) => {
                const currIndex = index+1
                products.priceStorage['item_' + currIndex] = {
                    'index': currIndex,
                    'color': element.color,
                    'size': element.size,
                    'price': element.price,
                    'discount': element.discount,
                    'sku': element.sku,
                };
            });
            products.priceObject = [];
            Object.keys(products.priceStorage).forEach(key => {
                products.priceObject.push(products.priceStorage[key])
            });
            products.priceObject = products.priceObject.filter(function (el) {
                return el != null;
            });
            document.getElementsByName('price')[0].value = JSON.stringify(products.priceObject);
        }
    },
    setColor: (el, build = false) => {
        let values = $('#' + el.id).val();
        values = values.toString();
        if (values.length > 0){
            let items = values.split(',');
            products.colors = [];
            for (let i = 0; i < items.length; i++){
                let color = items[i].split('_');
                products.colors.push({
                    id: color[0],
                    name: color[1],
                });
            }
            products.getCurrentStorage();
            if (!build){
                products.buildTable();
            }
        }
    },
    setSize: (el, build = false) => {
        let values = $('#' + el.id).val();
        values = values.toString();
        if (values.length > 0){
            let items = values.split(',');
            products.sizes = [];
            for (let i = 0; i < items.length; i++){
                let color = items[i].split('_');
                products.sizes.push({
                    id: color[0],
                    name: color[1],
                });
            }
            products.getCurrentStorage();
            if (!build){
                products.buildTable();
            }
        }
    },
    buildTable: () => {
        var photos = [];
        let colors = products.colors;
        let sizes = products.sizes;
        products.photosPath = $(".public-path").val();
        $( ".pr-cl-img" ).each(function( index ) {
            products.photos[$(this).data("color")] = [];
        })
        $( ".pr-cl-img").each(function( index ) {
            var key = $(this).data("color");
            const isDuplicate = Boolean(products.photos[key].find(item => item === $(this).val()))
            if(!isDuplicate){
                products.photos[key].push($(this).val());
            }
        });
        $('#sizes_head').html('<th></th>');
        $('#colors_row').html('');
        if (sizes.length >= 1 && colors.length >= 1){
            for (let i = 0; i < sizes.length; i++){
                let sizeName = sizes[i].name;
                $('#sizes_head').append('<th>' + sizeName + '</th>')
            }
            let tdId = 0;
            for (let c_i = 0; c_i < colors.length; c_i++){
                fileUpload = `<div class='file-upload-section'><input id="images_${tdId}" 
                data-index="${tdId}" type="file" name="images_${tdId}[]" class="form-control" 
                placeholder="Images" multiple="multiple" style="padding:0;"><div class="color-images-${tdId}"></div></div>`;
                let colorName = colors[c_i].name;
                let row = '<tr>';
                row += '<td><p class="color-name">' + colorName +'</p>'+ fileUpload ;
                let sizeIndex = 0;
                for (let td = 0; td < sizes.length; td++){
                    let size_id = sizes[td].id;
                    let color_id = colors[c_i].id;
                    tdId++;
                    sizeIndex++;
                    let price = '';
                    let discount = 0;
                    let imagesSection = '';
                    let fileUpload = '';
                    let sku = '';
                    let storage = products.priceStorage;
                    Object.keys(products.priceStorage).map((oid) => {
                        if (+storage[oid].color === +color_id  && +storage[oid].size === +size_id){
                            price = storage[oid].price;
                            discount = storage[oid].discount;
                            images = storage[oid].images;
                            sku = storage[oid].sku;
                        }
                    });
                    imagesSection += '<div style="padding-left: 0;padding-right: 0;" class="form-group">';
                    if(products.photos[color_id]){
                        for(var i= 0; i<products.photos[color_id].length; i++){
                            imagesSection+= '<div class="product-color-image-sections"><span class="delete-product-color-image">✖</span><img  src='+products.photosPath+'storage/'+products.photos[color_id][i]+' class="product-colors-images"><input type="hidden" name="images_'+tdId+'[]" value="'+products.photos[color_id][i]+'"></div>'
                        }
                    }
                    imagesSection += '</div>';
                    if(sizeIndex <= 1){
                        row += `${imagesSection}</td>'
                                <td>
                                ${fileUpload}
                                    <div style="padding-left: 0;padding-right: 0; margin-right:2px" class="form-group col-md-3">
                                    <p style="margin-bottom:5px;font-size: 13px;">Price</p>
                                    <input value="${price}" style= "padding: 6px 4px;" onkeyup="products.setPrice(this)" id="price_${tdId}" data-index="${tdId}" data-color="${color_id}" data-size="${size_id}" type="number" class="form-control"  required min="1">
                                    </div>
                                    <div style="padding-left: 0;padding-right: 0;margin-right:2px" class="form-group col-md-3">
                                        <p style="margin-bottom:5px;font-size: 13px;" >Discount</p>
                                        <input value="${discount}" style= "padding: 6px 4px;" onkeyup="products.setPrice(this)" id="discount_${tdId}" data-index="${tdId}" data-color="${color_id}" data-size="${size_id}" type="number" class="form-control"  required >
                                    </div>
                                    <div style="padding-left: 0;padding-right: 0;" class="form-group col-md-2">
                                        <p style="margin-bottom:5px;font-size: 13px;">Code</p>
                                        <input onkeyup="products.setsku(this)" value="${sku}" id="sku_${tdId}" data-index="${tdId}" data-color="${color_id}" data-size="${size_id}" type="text " class="form-control">
                                    </div>
                                </td>`;
                    }else{
                        row += `<td>
                                    <div style="padding-left: 0;padding-right: 0; margin-right:2px" class="form-group col-md-3">
                                        <p style="margin-bottom:5px;font-size: 13px;">Price</p>
                                        <input value="${price}" style ="padding: 6px 4px;" onkeyup="products.setPrice(this)" id="price_${tdId}" data-index="${tdId}" data-color="${color_id}" data-size="${size_id}" type="number" class="form-control" required min="1">
                                        </div>
                                        <div style="padding-left: 0;padding-right: 0;margin-right:2px" class="form-group col-md-3">
                                        <p style="margin-bottom:5px;font-size: 13px;">Discount</p>
                                        <input value="${discount}"style= "padding: 6px 4px;" onkeyup="products.setPrice(this)" id="discount_${tdId}" data-index="${tdId}" data-color="${color_id}" data-size="${size_id}" type="number" class="form-control" required>
                                    </div>
                                    <div style="padding-left: 0;padding-right: 0;" class="form-group col-md-2">
                                    <p style="margin-bottom:5px;font-size: 13px;">Code</p>
                                    <input onkeyup="products.setsku(this)" value="${sku}" id="sku_${tdId}" data-index="${tdId}" data-color="${color_id}" data-size="${size_id}" type="text" class="form-control">
                                    </div>
                                </td>`;
                    }      
                }
                row += '</tr>';
                $('#colors_row').append(row)
            }
        }
    },
    setPrice: (el) => {
        const index = +el.dataset.index;
        let isNew = false
        const color = +el.dataset.color;
        const size = +el.dataset.size;
        const price = +document.getElementById('price_' + index).value;
        const discount = +document.getElementById('discount_' + index).value;
        const sku = document.getElementById('sku_' + index).value;
        console.log(sku)
        products.priceObject = [];
        const afterThisPrices = [];

        if(products.priceStorage['item_' + index]){
            isNew = products.priceStorage['item_' + index].color !== color && products.priceStorage['item_' + index].size !== size
        }

        if(isNew){
            for (let i = index; i <= Object.values(products.priceStorage).length; i++) {
                afterThisPrices.push(products.priceStorage['item_' + i]);
            }
        }
        if (price > 0){
            products.priceStorage['item_' + index] = {
                'index': index,
                'color': color,
                'size': size,
                'price': price,
                'discount': discount,
                'sku': sku,
            };
        } else {
            delete products.priceStorage['item_' + index];
        }

        if(isNew){
            afterThisPrices.forEach((element, ind) => {
                const currIndex = index + ind + 1
                products.priceStorage['item_' + currIndex] = element;
            });

        }

        Object.keys(products.priceStorage).forEach(key => {
            products.priceObject.push(products.priceStorage[key])
        });
        products.priceObject = products.priceObject.filter(function (el) {
            return el != null;
        });
        products.priceObject = products.priceObject.sort(function (a, b) {
            return a.index - b.index;
        });
        document.getElementsByName('price')[0].value = JSON.stringify(products.priceObject);
    },
    setsku: (el) => {
        const index = +el.dataset.index;
        let isNew = false
        const color = +el.dataset.color;
        const size = +el.dataset.size;
        const price = +document.getElementById('price_' + index).value;
        const discount = +document.getElementById('discount_' + index).value;
        const sku = document.getElementById('sku_' + index).value;
        products.priceObject = [];
        const afterThisPrices = [];

        if(products.priceStorage['item_' + index]){
            isNew = products.priceStorage['item_' + index].color !== color && products.priceStorage['item_' + index].size !== size
        }

        if(isNew){
            for (let i = index; i <= Object.values(products.priceStorage).length; i++) {
                afterThisPrices.push(products.priceStorage['item_' + i]);
            }
        }

        if (price > 0){
            products.priceStorage['item_' + index] = {
                'index': index,
                'color': color,
                'size': size,
                'price': price,
                'discount': discount,
                'sku': sku,
            };
        } else {
            delete products.priceStorage['item_' + index];
        }

        if(isNew){
            afterThisPrices.forEach((element, ind) => {
                const currIndex = index + ind + 1
                products.priceStorage['item_' + currIndex] = element;
            });

        }

        Object.keys(products.priceStorage).forEach(key => {
            products.priceObject.push(products.priceStorage[key])
        });
        products.priceObject = products.priceObject.filter(function (el) {
            return el != null;
        });
        products.priceObject = products.priceObject.sort(function (a, b) {
            return a.index - b.index;
        });
        document.getElementsByName('price')[0].value = JSON.stringify(products.priceObject);
    },
    parseTable: () => {
        let sizes = document.getElementsByClassName('price-size');
        let colors = document.getElementsByClassName('price-color');
        let inputs = document.getElementsByClassName('price-input');
        for (let i = 0; i < sizes.length; i++){
            products.setSize(sizes[i], false);
        }
        for (let i = 0; i < colors.length; i++){
            products.setColor(colors[i], false);
        }
        let prodObjs = JSON.parse(document.getElementsByName('price')[0].value);
        for (let pos = 0; pos < prodObjs.length; pos++){
            let price_inputs = document.querySelectorAll('[data-color]');
            for (let ii = 0; ii < price_inputs.length; ii++){
                if (+price_inputs[ii].dataset.color === +prodObjs[pos].color && +price_inputs[ii].dataset.size === +prodObjs[pos].size){
                    let pr_i = document.getElementById('price_' + prodObjs[pos].index);
                    let ds_i = document.getElementById('discount_' + prodObjs[pos].index);
                    let cd_i = document.getElementById('sku_' + prodObjs[pos].index);
                    pr_i.value = prodObjs[pos].price;
                    ds_i.value = prodObjs[pos].discount;
                    cd_i.value = (prodObjs[pos].sku) ? prodObjs[pos].sku : "" ;
                    products.setPrice(pr_i);
                }
            }
        }
        for (let i = 0; i < inputs.length; i++){
            products.setPrice(inputs[i]);
        }
    },
    parsePrice: () => {
        const priceObj = JSON.parse(document.getElementsByName('price')[0].value);
        const priceCount = priceObj.length;
        products.priceObject = priceObj;
        document.getElementById('color_dd_0').value = priceObj[0].color;
        document.getElementById('size_dd_0').value = priceObj[0].size;
        $("#size_dd_0").select2("val", priceObj[0].size);
        $("#color_dd_0").select2("val", priceObj[0].color);
        document.getElementById('price_dd_0').value = priceObj[0].price;
        document.getElementById('discount_dd_0').value = priceObj[0].discount;
        priceObj.splice(0, 1);
        for (let i = 0; i < priceObj.length; i++){
            const index = i + 1;
            products.add();
            document.getElementById('color_dd_' + index).value = priceObj[i].color;
            document.getElementById('size_dd_' + index).value = priceObj[i].size;
            $("#size_dd_" + index).select2("val", priceObj[i].size);
            $("#color_dd_" + index).select2("val", priceObj[i].color);
            document.getElementById('price_dd_'+ index).value = priceObj[i].price;
            document.getElementById('discount_dd_'+ index).value = priceObj[i].discount;
        }
    },
    removeFeature: (id) => {
        let approve;
        const feature = document.getElementById('feature-' + id).value;
        if (feature.length > 0){
            approve = confirm('Do you want to remove "'+feature+'" feature?')
        } else {
            approve = true;
        }
        if(approve){
            document.getElementById('features_box_' + id).remove();
            products.featuresObject.splice(id, 1);
            document.getElementsByName('features')[0].value = JSON.stringify(products.featuresObject);
        }
        document.getElementById('addFeature').removeAttribute('disabled');
    },
    addFeature: () => {
        products.featureTplCount++;
        if (products.featureTplCount <= 7){
            products.featureTpl = featuresTemplate.replace(/FEATURE_ID/g, products.featureTplCount).replace(/FEATURE_HUMAN/g, products.featureTplCount + 1);
            document.getElementById(products.featuresList).insertAdjacentHTML( 'beforeend', products.featureTpl );
            $('[data-toggle="tooltip"]').tooltip();
        }else {
            document.getElementById('addFeature').setAttribute('disabled', 'true');
        }
    },
    featuresSve: (el) => {
        const index = +el.dataset.index;
        products.featuresObject[index] = el.value;
        document.getElementsByName('features')[0].value = JSON.stringify(products.featuresObject);
    },
    switchLang: (lang) => {
        let translate;
        const obj = JSON.parse(document.getElementById('features_i18n').value);
        if (obj[lang].length > 0){
            translate = JSON.parse(obj[lang]);
            products.featuresObject = translate;
            for (let i = 0; i < translate.length; i++){
                setTimeout(function () {
                    if (typeof translate[i] === 'undefined'){
                        document.getElementById('feature-' + i).value = '';
                    } else {
                        document.getElementById('feature-' + i).value = translate[i];
                    }
                }, 100)
            }
        } else {
            for (let i = 0; i < products.featuresObject.length; i++){
                document.getElementById('feature-' + i).value = '';
            }
            products.featuresObject = [];
        }
    },
    parseFeatures: () => {
        setTimeout(function () {
            products.featuresObject = JSON.parse(document.getElementsByName('features')[0].value);
            document.getElementById('feature-0').value = products.featuresObject[0];
            products.featuresObject.splice(0,1);
            for (let i = 0; i < products.featuresObject.length; i++){
                const index = i + 1;
                products.addFeature();
                document.getElementById('feature-' + index).value = products.featuresObject[i];
            }
        }, 100)
    }
};

// $(document).on("click",".select2-selection__choice__remove",function() {
//     console.log($(this).val())
//     // document.getElementsByName('price')
// })

$(document).on("click",".delete-product-color-image",function() {
    $(this).parent().remove();
})
