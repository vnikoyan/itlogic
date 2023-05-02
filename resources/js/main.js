$(document).ready(function() {


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
    element.append($(".catalog-right-description")[0]);

        }
    }


    $(window).resize(function() {
        media();
        product();
    });

    media();
    product();



    $(document).ready(function() {
        $('.minus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });





    $(document).ready(function () {

        scrolAnim("#contacts", ".contacts-bloc");



        function scrolAnim(clikSelektion, goToSelection) {
            $(clikSelektion).click(function () {
                $('html, body').animate({
                    scrollTop: $(goToSelection).offset().top
                }, 500);
            });
        }


    });


});
