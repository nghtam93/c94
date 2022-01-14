$(document).ready(function(){

    function isEmpty( el ){
          return !$.trim(el.html())
      }

    new WOW().init();

    //-------------------------------------------------
    // Header Search
    //-------------------------------------------------
    var $headerSearchToggle = $('.header__search--toggle');
    var $headerSearchForm = $('.header__search__form');

    $headerSearchToggle.on('click', function() {
        var $this = $(this);
        var $header = $(this).closest('.header__search');

        if(!$header.hasClass('open-search')) {
            $header.addClass('open-search');
            $headerSearchForm.slideDown();
        } else {
            $header.removeClass('open-search');
            $headerSearchForm.slideUp();
        }
    });

    $('.header__search').mousedown(function(e){ e.stopPropagation(); });
    $(document).mousedown(function(e){
        $('.header__search').removeClass('open-search');
        $headerSearchForm.slideUp();
    });


    /*----Get Header Height ---*/
    function get_header_height() {
        var header_sticky=$("header").outerHeight()
        $('body').css("--header-height",header_sticky+'px')
    }

    setTimeout(function(){
        get_header_height()
    }, 500);

    $( window ).resize(function() {
      get_header_height()
    });

        // Sticky navbar
    // =========================

    // Custom function which toggles between sticky class (is-sticky)
    var stickyToggle = function (sticky, stickyWrapper, scrollElement,stickyHeight) {
        var stickyTop = stickyWrapper.offset().top;
        if (scrollElement.scrollTop() >= stickyTop + 10 ) {
            stickyWrapper.height(stickyHeight);
            sticky.addClass("is-sticky");
        }
        else {
            sticky.removeClass("is-sticky");
            stickyWrapper.height('auto');
        }
    };
    $('[data-toggle="sticky-onscroll"]').each(function () {
        var sticky = $(this);
        var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
        sticky.before(stickyWrapper);
        sticky.addClass('sticky');
        var stickyHeight = sticky.outerHeight();
        // Scroll & resize events
        $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
            stickyToggle(sticky, stickyWrapper, $(this),stickyHeight);
        });

        // On page load
        stickyToggle(sticky, stickyWrapper, $(window),stickyHeight);
        // Check scroll top
        var winSt_t = 0;
        $(window).scroll(function() {
            var winSt = $(window).scrollTop();
            if (winSt >= winSt_t) {
                sticky.removeClass("top_show")
            } else {
                sticky.addClass("top_show")
            }
            winSt_t = winSt
        });
    });



    /*----Back to top---*/
    var back_to_top=$(".back-to-top"),offset=220,duration=500;$(window).scroll(function(){$(this).scrollTop()>offset?back_to_top.addClass("active"):back_to_top.removeClass("active")}),$(document).on("click",".back-to-top",function(o){return o.preventDefault(),$("html, body").animate({scrollTop:0},duration),!1});

     //-------------------------------------------------
    // Menu
    //-------------------------------------------------
    $.fn.dnmenu = function( options ) {

        let thiz = this
        let menu = $(this).attr('data-id')
        let menu_id = '#'+menu

        // Default options
        var settings = $.extend({
            name: 'Menu'
        }, options );

        // get ScrollBar Width
        function getScrollBarWidth () {
            var $outer = $('<div>').css({visibility: 'hidden', width: 100, overflow: 'scroll'}).appendTo('body'),
                widthWithScroll = $('<div>').css({width: '100%'}).appendTo($outer).outerWidth();
            $outer.remove();
            return 100 - widthWithScroll;
        };
        let ScrollBarWidth = getScrollBarWidth() + 'px';

        // Create wrap
        // Button click
        thiz.click(function(e){
            e.preventDefault()
            console.log(thiz)
            if(thiz.hasClass('active')){
                // $('.dnmenu-backdrop').remove()
                $('body').removeClass('modal-open').css("padding-right","")
                $(menu_id).removeClass('active')
                $(thiz).removeClass('active')

            } else {
                // $('<div class="dnmenu-backdrop">').appendTo('body')
                $('body').addClass('modal-open').css("padding-right",ScrollBarWidth)
                $(menu_id).addClass('active')
                $(thiz).addClass('active')

            }
        });

        // Custom close
        $('.js-menu__close').click(function(){
            $('body').removeClass('modal-open')
            $('body').removeClass('modal-open').css("padding-right","")
            $(thiz).removeClass('active')
            $(menu_id).removeClass('active')
        })

        // Menu
        var el= $(menu_id).find(".nav__mobile--ul");
        el.find(".menu-item-has-children>a").after('<button class="nav__mobile__btn"><i></i></button>'),

        el.find(".nav__mobile__btn").on("click",function(e){
            e.stopPropagation(),
            $(this).parent().find('.sub-menu').first().is(":visible")?$(this).parent().removeClass("sub-active"):
            $(this).parent().addClass("sub-active"),
            $(this).parent().find('.sub-menu').first().slideToggle()
        })

        // Apply options
        return;
    };

    $('.menu-mb__btn').dnmenu()
    $('.js-sidebarRight').dnmenu()

    //check home
    if($('body').hasClass( "home" )){

        $('.home-about__slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            responsive: [
                {
                  breakpoint: 1199,
                  settings: {
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 767,
                  settings: {
                    centerMode: true,
                    variableWidth: true,
                    slidesToShow: 1,
                  }
                }
            ]
        });

        $('.nav-link').on("click",function(e) {
            var thiz = $(this)

            event.preventDefault()
            var bs_target = thiz.data('bs-target')
            var content = thiz.closest('section').find(bs_target + ' .js-loadmore-content')
            var catid = thiz.data('catid')
            if(isEmpty( content )){
                $.ajax({ // Hàm ajax
                    url : dntheme_params['ajax_url'], // Nơi xử lý dữ liệu
                    data : {
                        action: "loadmore",
                        catid: catid
                    },
                    beforeSend: function(){
                        content.addClass('active')
                    },
                    success: function(response) {
                        content.append(response);
                        content.removeClass('active')
                    },
                    error: function( jqXHR, textStatus, errorThrown ){
                        //Làm gì đó khi có lỗi xảy ra
                        console.log( 'The following error occured: ' + textStatus, errorThrown );
                        content.removeClass('active')
                    }
                });
            }else{
                console.log('load roi')
            }

        })

        $('.js-slick__news2').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            responsive: [
                {
                  breakpoint: 1199,
                  settings: {
                    arrows: false,
                    dots: true,
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 575,
                  settings: {
                    centerMode: true,
                    variableWidth: true,
                    slidesToShow: 1,
                  }
                }
            ]
        });

    }

    if($('body').hasClass( "page-template-page-about" )){

        $('.home-about__slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            responsive: [
                {
                  breakpoint: 1199,
                  settings: {
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 767,
                  settings: {
                    centerMode: true,
                    variableWidth: true,
                    slidesToShow: 1,
                  }
                }
            ]
        });
    }

    //check home

    if($('body').hasClass( "single" )){
        var offset_default_top = 80+"px"
        var offset_top = $('.wrap__page').offset().top + 24
        var offset_bottom = $('footer.footer').outerHeight();
        var wrap_single_height = $('.wrap__single').outerHeight();

        setTimeout(function(){
            offset_top = $('.wrap__page').offset().top + 24
            if(window.pageYOffset - offset_bottom > offset_top){
                $('.ads--pc').css('top',offset_default_top - offset_bottom +"px")
            }else{
                $('.ads--pc').css('top',offset_top +"px")
            }
        }, 500);

        $(window).scroll(function(){
            var doc = document.documentElement;
            var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);

            // console.log("top: "+top)
            // console.log( "clientHeight: " + wrap_single_height)
            // console.log( "offset_bottom: " + offset_bottom)
            // console.log(wrap_single_height - top)
            if(top > offset_top){
                if(wrap_single_height - top < offset_bottom){
                    $('.ads--pc').css({"top":offset_top - offset_bottom+"px","position":"absolute"});
                }else{
                    $('.ads--pc').css({"top":offset_default_top,"position":"fixed"});
                }
            }else{
                $('.ads--pc').css({"top":offset_top+"px"});
            }
        });

        $('.related__slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            responsive: [
                {
                  breakpoint: 1299,
                  settings: {
                    arrows: false,
                    dots: true,
                    slidesToShow: 3,
                  }
                },
                {
                  breakpoint: 767,
                  settings: {
                    arrows: false,
                    dots: true,
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 575,
                  settings: {
                    arrows: false,
                    dots: true,
                    slidesToShow: 1,
                  }
                }
            ]
        });

        Fancybox.bind("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']", {
          groupAttr: false,
        });
    }

});


