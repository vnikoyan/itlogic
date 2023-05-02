// const { values } = require("lodash");

$(document).ready(function() {

    $(document).on("click", ".navbar", function () {
        let overflowStyle = $('html').css('overflow')
        if(overflowStyle === 'visible'){
            $('html').css({overflow: 'hidden'});
            $('body').append(`<div class="menu-background"></div>`)
        } else if(overflowStyle === 'hidden') {
            $('html').css({overflow: 'visible'});
            $('.menu-background').remove()
        }
    });

    // $(document).on("click", "#filterButton", function () {
    //     let overflowStyle = $('html').css('overflow')
    //     console.log('overflowStyle', overflowStyle)
    //     if(overflowStyle === 'visible'){
    //         console.log('set hidden')
    //         $('html').css({overflow: 'hidden'});
    //         $('body').append(`<div class="menu-background"></div>`)
    //     } else if(overflowStyle === 'hidden') {
    //         console.log('set visible')
    //         $('html').css({overflow: 'visible'});
    //         $('.menu-background').remove()
    //     }
    // });


    // $('').click(function (e) { 
    //     let overflowStyle = $('html').css('overflow')
    //     console.log(overflowStyle)
    //     if(overflowStyle === 'visible'){
    //         $('html').css({overflow: 'hidden'});
    //         $('body').append(`<div class="menu-background"></div>`)
    //         console.log('set hidden')
    //     } else if(overflowStyle === 'hidden') {
    //         $('html').css({overflow: 'visible'});
    //         $('.menu-background').remove()
    //         console.log('set visible')
    //     }
    // });

    $(document).on("input", ".search-input", function () {
        var value = $(this).val().trim();
        if(value != ""){

            $.ajaxSetup({
                headers: {
                'X-XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/search/product",
            data: { 
                _token :$('meta[name="csrf-token"]').attr('content'),
                value: value 
            }
        })
        .done(function( data ) {
            $(".search-result").empty();
            console.log(data.message)
            if(!data.message){
                $(data).each((index, element) => {
                    $(".search-result").append("<a href='/product/"+element.productId+"'><li class='nav-item d-flex'><img src='"+element.src+'/storage/'+element.image+"' class='product-image'><div><p class='product-name'>"+element.name[element.languageIso]+"</p><br><p class='product-price'>"+element.price[0]['price']+" ֏</p></div></li></a>");
                })
            }else{
                $(".search-result").append("<p class='text-center'>"+data.message+"</p>");
            } 
        });
        }else{
             $(".search-result").empty();
        }
    })

    var media =  function () {
        if($(window).width() < 990) {
            var element = $("#navbarSupportedContent")
            element.append($(".header-bottom")[0]);
            element.append($(".header-top")[0]);

            // change functionality for smaller screens
        } else {
            var element = $("header");
            element.before($(".header-top")[0]);
            element.after($(".header-bottom ")[0]);
            // change functionality for larger screens
        }
    }


    var product =  function () {
        if($(window).width() < 990) {
            var element = $("#product-blog")
            element.append($(".catalog-right-description")[0]);


            // change functionality for smaller screens
        } else {
          var element = $(".catalog-right")[0];
          if(typeof  element !== "undefined"){
              element.append($(".catalog-right-description")[0]);
          }

        }
    }


    $(window).resize(function() {
        media();
        product();
    });

    media();
    product();


    //  animatino scroll
    scrolAnim("#contacts", ".contacts-bloc");


    function scrolAnim(clikSelektion, goToSelection) {
        $(clikSelektion).click(function () {
            $('html, body').animate({
                scrollTop: $(goToSelection).offset().top
            }, 500);
        });
    }


    $(".discounts-bloc-content").each(function (index) {
        var element = $(this);
        element.click(function (event) {
            var find = element.find(".disc-button a");
            if(find.length){
                find[0].click();
            }
        });
    })


    $(".col-hov").each(function (index) {
        var element = $(this);
        element.click(function (event) {
            var find = element.find(".icons-title a");
            if(find.length){
                find[0].click();
            }
        });
    })

    // const sidebar = $('.sidebar-container');
    // const widget = $('.widget');
    // const footer = $('.footer-section');
    // const space = 10; // arbitrary value to create space between the window and widget
    // const startTop = sidebar.offset().top; // arbitrary start top position
    // const endTop = footer.offset().top - widget.height();
    
    // widget.css('top', startTop);
    
    // $(window).scroll(function() {
    
    //   let windowTop = $(this).scrollTop();
    //   let widgetTop = widget.offset().top;
    //   let newTop = startTop;
    
    //   if (widgetTop >= startTop && widgetTop <= endTop) {
    //     if (windowTop > startTop - space && windowTop < endTop - space) {
    //         newTop = windowTop + space;
    //     } else if (windowTop > endTop - space) {
    //         console.log(222222)
    //         newTop = endTop;
    //     }
    //     widget.stop().css(
    //       'top', newTop
    //     );
    //   }
 
    // });

});



