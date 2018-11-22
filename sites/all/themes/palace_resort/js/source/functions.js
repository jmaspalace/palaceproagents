jQuery(function ($) {
    function switcheventos() {
        if (jQuery(window).width() < 767) {
            jQuery("nav .menu > li").off("mouseenter mouseleave");
        } else {
            jQuery("nav .menu > li").on("mouseenter mouseleave");
        }
    }

    function tamanomenumobile() {
        if (jQuery(window).width() < 767) {
            jQuery('#recovery').appendTo('#box-login');

        } else {
            jQuery('#recovery').appendTo('#box-login form');
        }
    }

    function moveArrowTabs(contenedor) {
        jQuery('.' + contenedor + ' .sombra span').css({
            left: jQuery('.' + contenedor + ' ul li.active').offset().left + jQuery('.' + contenedor + ' ul li.active').innerWidth() / 2
        });
    }

    tamanomenumobile();

    switcheventos();

    jQuery('.navbar-toggle').click(function () {
        if (!jQuery(this).hasClass('collapsed')) {
            jQuery('.submenu').hide();
        }
    });

    var owl = jQuery('.owl-carousel-offers');

    owl.on('initialized.owl.carousel' +
        'resize.owl.carousel resized.owl.carousel',
        function (event) {
            var items = event.item.count;
            var size = event.page.size;

            if (size == 4 || size == 3) {
                if (items < 4) {
                    jQuery(event.target).addClass('center');
                }
            } else {
                jQuery(event.target).removeClass('center');
            }

        });

    owl.owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            769: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    })


    // Tabs Section Live
    jQuery('.tab-bloque-live-right').html(jQuery('.tab-bloque-live ul li:first-child').find('div').clone());

    jQuery('.bloque-live article figure').html(jQuery('.tab-bloque-live ul li:first-child').find('img.imagen-fondo').clone());
    jQuery('.bloque-live .rombo').attr('src', jQuery('.tab-bloque-live ul li:first-child').find('img.imagen-rombo').attr('src'));

    jQuery('.bloque-live figure').css({
        'background-image': 'url(' + jQuery('.bloque-live figure img').attr('src') + ')'
    });

    jQuery('.tab-bloque-live ul li').click(function () {
        jQuery('.tab-bloque-live ul li').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.tab-bloque-live-right').html(jQuery(this).find('div').clone());

        jQuery('.bloque-live article figure').html(jQuery(this).find('img').clone());
        jQuery('.bloque-live figure').css({
            'background-image': 'url(' + jQuery('.bloque-live figure img').attr('src') + ')'
        });

        jQuery('.bloque-live .rombo').attr('src', jQuery(this).find('img.imagen-rombo').attr('src'))
    });

    jQuery('.block-faqs .faq h3').click(function () {
        if (jQuery(window).width() < 768) {
            jQuery(this).parent().toggleClass('open');
        }
    })

    jQuery('body').click(function (e) {
        if (e.target['id'] == 'logear' || e.target['id'] == 'register' || e.target['id'] == 'edit-name' || e.target['id'] == 'edit-pass' || e.target.className == 'btn-submenu') {
            e.preventDefault();
            if (e.target['id'] == 'logear') {
                jQuery('#login').toggleClass('open');
                jQuery('.onclick-menu-content').removeClass('open');
            } else if (e.target['id'] == 'register') {
                jQuery('.drop-register').parent().find('ul').toggleClass('open');
                jQuery('#login').removeClass('open');
            }
            if (e.target.className == 'btn-submenu') {
                jQuery(e.target).parent().parent().toggleClass('in-submenu');
                jQuery(e.target).parent().find('.submenu').show();
            }
        } else {
            jQuery('.drop-register').parent().find('ul').removeClass('open');
            jQuery('#login').removeClass('open');
            jQuery('nav .navbar-collapse').removeClass('in-submenu');
        }
    });

    jQuery('.navbar-collapse').on('shown.bs.collapse', function () {
        var alto = jQuery(window).height() - (jQuery('header .col-md-3').innerHeight() + jQuery('.menu-superior').innerHeight());
        jQuery('header nav').height(alto);
    })

    jQuery('.navbar-collapse').on('hidden.bs.collapse', function () {
        jQuery('header nav').height('0');
    })
    //Sliders
    if (jQuery(window).width() > 768) {
        var widthSlide = (jQuery('.container').width() / 2);
        var widthActivity = (jQuery('.slider-activities').width() / 3);
        //console.log(widthSlide+'___vs___'+jQuery('.container').width());
        jQuery('.slider-entertaiment .flexslider').flexslider({
            controlNav: false,
            animation: 'slide',
            prevText: '',
            nextText: '',
            touch: true,
            itemWidth: widthSlide
        });
        jQuery('.slider-activities .flexslider').flexslider({
            controlNav: false,
            animation: 'slide',
            prevText: '',
            nextText: '',
            touch: true,
            itemWidth: widthActivity
        });

    } else {
        jQuery('.slider-entertaiment .flexslider').flexslider({
            animation: 'slide',
            prevText: '',
            nextText: '',
            touch: true
        });
        jQuery('.slider-activities .flexslider').flexslider({
            animation: 'slide',
            prevText: '',
            nextText: '',
            touch: true
        });
        jQuery('.block-terms h2').on('click', function () {
            jQuery('.block-terms .content').toggleClass('open');
        })
        jQuery('.back-submenu, .submenu li').on('click', function () {
            jQuery('nav .navbar-collapse').removeClass('in-submenu');
            jQuery('nav .submenu').hide();
        })
    }
    jQuery('.container-tabs .tab1 .block-resortspage .flexslider').flexslider({
        animation: 'slide',
        prevText: '',
        nextText: '',
        touch: true
    });
    jQuery('.block-resortspage .flexslider').flexslider({
        animation: 'slide',
        prevText: '',
        nextText: '',
        touch: true
    });
    jQuery('.bloque-tripadvisor .flexslider').flexslider({
        controlNav: false,
        animation: 'slide',
        prevText: '',
        nextText: '',
        touch: true
    });

    jQuery('.bloque-slider .flexslider').flexslider({
        controlNav: false,
        animation: 'fade',
        prevText: '',
        nextText: '',
        touch: true
    });

    jQuery('.bloque-slider-white.flexslider').flexslider({
        controlNav: false,
        animation: 'fade',
        prevText: '',
        nextText: '',
        touch: true
    });

    jQuery('.bloque-contenido2.flexslider').flexslider({
        controlNav: false,
        animation: 'fade',
        prevText: '',
        nextText: '',
        touch: true
    });

    jQuery('.bloque-contenido4.flexslider').flexslider({
        controlNav: false,
        animation: 'fade',
        prevText: '',
        nextText: '',
        touch: true
    });


    //Over Menu Superior

    jQuery("nav .menu > li").hover(function () {
        if (jQuery(window).width() > 768) {
            jQuery(this).find(".submenu").show();
            jQuery('<div class="area-activa"></div>').appendTo(this)
        }
    }, function () {
        jQuery(window).width() > 768 && (jQuery(".submenu").hide(), jQuery(".area-activa").remove());
    })

    /*jQuery('nav .menu > li').hover(function(){
        if(jQuery(window).width()>768) {
            jQuery(this).find('.submenu').show();
            if(jQuery(this).find('.area-activa').length == 0 ){
                var areaActiva = '<div class="area-activa"></div>';
                jQuery(areaActiva).appendTo(this);
            }
        }
	}),function(){jQuery(window).width()>768&&(jQuery(".submenu").hide(),jQuery(".area-activa").remove())*/


    // idioma
    jQuery('.language > p').click(function () {
        jQuery('.down').toggle();
    })

    //Posicion Booking
    if (jQuery('.bloque-slider').height() >= jQuery(window).height()) {
        jQuery('.bloque-booking').addClass('booking-position');
    } else {
        jQuery('.bloque-booking').removeClass('booking-position');
    }

    //Hover Botones Booking
    jQuery('.booking-btn').click(function () {
        jQuery('.booking-btn').removeClass('active');
        jQuery(this).addClass('active');

        jQuery('.booking-btn').find('span').removeClass('active');
        jQuery(this).find('span').addClass('active');
    })

    //Imagenes Galery Overblack
    var imagesFive = jQuery('.bloque-gallery-overblack ul li');
    for (var i = 0; i < imagesFive.length; i++) {
        var image = imagesFive[i];
        jQuery(image).find('.fondo-gallery').css({
            'background-image': 'url(' + jQuery(image).find('img').attr('src') + ')'
        })
    }

    //Imagenes Bloques
    var images = jQuery('.bloque-real-weddings .row img, .bloque-cuadros img, .bloque-accommodations img, .gallery-tab img');
    for (var i = 0; i < images.length; i++) {
        var image = images[i];
        jQuery(image).parent().find('.fondo-imagen').css({
            'background-image': 'url(' + jQuery(image).attr('src') + ')'
        })
    }

    //Tabs Home
    if (jQuery('.bloque-tabs').is(':visible')) {
        if (jQuery('.bloque-tabs header').is(':visible')) {
            jQuery('.bloque-tabs header ul li').click(function () {
                jQuery('.bloque-tabs header ul li').removeClass('active');
                jQuery(this).addClass('active');



                jQuery('.container-tabs > div').removeClass('active');
                jQuery('.' + jQuery(this).attr('data-media')).addClass('active');
                jQuery('html, body').animate({
                    scrollTop: jQuery('.' + jQuery(this).attr('data-media')).offset().top - 115
                }, 1500);

                moveArrowTabs('bloque-tabs header');

                jQuery('.' + jQuery(this).attr('data-media') + ' .block-resortspage .flexslider').flexslider({
                    animation: 'slide',
                    controlNav: true,
                    prevText: '',
                    nextText: '',
                    touch: true
                });
            })
        }

    }


    //Multimedia Fotos
    jQuery('.grid').masonry({
        itemSelector: '.grid-item',
        percentPosition: true
    });

    jQuery(".fancybox").fancybox();

    jQuery('.fancybox-media').fancybox({
        helpers: {
            media: {}
        }
    });


    // Funciones Mobile

    jQuery('.bloque-slider-mobile').flexslider({
        controlNav: true,
        animation: 'fade',
        prevText: '',
        nextText: '',
        touch: true
    });



    jQuery('.icon_menu').click(function () {
        jQuery('#menu-mobile').addClass('open');
    });
    jQuery('.icon-user').click(function () {
        jQuery('.form-login').addClass('open');
    });
    /*visible search*/
    var div2 = document.getElementById('search-desktop');
    var but2 = document.getElementById('icon-search');
    document.addEventListener("click", function (e) {
        var clic = e.target;

        if (jQuery(window).width() < 767) {
            if (clic != but2 && clic != div2 && clic.className != 'form-submit' && clic.className != 'form-text') {
                jQuery('#search-desktop').removeClass("open");
            } else {
                console.log(clic.className);
                if (clic.className == 'form-submit' || clic.className == 'form-text') {

                } else {
                    jQuery('#search-desktop').toggleClass("open");
                }

            }
        } else {
            if (clic != but2 && clic != div2 && clic.className != 'form-submit' && clic.className != 'form-text') {
                jQuery('#search-desktop').removeClass("open");
            } else {
                jQuery('#search-desktop').addClass("open");
            }
        }


    }, false);



    /*visible search mobile*/
    /* var div= document.getElementById('search-desktop');
     var but = document.getElementById('icon-search');
     document.addEventListener("click", function(e){
         var clic = e.target.parentNode;

         if(clic != but && clic != div){
             jQuery('#search-desktop').removeClass("open");
         }
         if(clic == but || clic.id == 'search-desktop'){
             jQuery('#search-desktop').toggleClass('open');
         }
     }, false);*/

    jQuery('.btn-book').click(function () {
        jQuery('#booking-mobile').addClass('open');
    });

    jQuery('.btn-chat').click(function () {
        jQuery('#chat-mobile').addClass('open');
    });

    jQuery('.cerrar_menu').click(function () {
        jQuery('#login').toggleClass('open');
    });
    jQuery(".datepicker").datepicker();
    jQuery('.styled').selectpicker();
    jQuery("body").on("click", ".datepicker", function () {
        jQuery(this).datepicker();
        jQuery(this).datepicker("show");
    });
    /*valid email*/
    jQuery(".newsletter .webform-client-form").validate({
        errorClass: "errornewsletter",
        rules: {
            "submitted[email_adress]": {
                required: true,
                email: true,
            },
        },
        messages: {
            "submitted[email_adress]": {
                required: 'Este campo es requerido',
                email: 'Por favor, introduce una dirección de correo electrónico válida.',
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    /*})*/

    jQuery(window).resize(function () {
        tamanomenumobile();
        switcheventos();

        //Posicion Booking
        if (jQuery('.bloque-slider').height() >= jQuery(window).height()) {
            jQuery('.bloque-booking').addClass('booking-position');
        } else {
            jQuery('.bloque-booking').removeClass('booking-position');
        }

    })

    jQuery(window).load(function () {
        if (jQuery('.bloque-tabs').is(':visible')) {
            if (jQuery('.bloque-tabs header').is(':visible')) {
                moveArrowTabs('bloque-tabs header');
            }
        }

        if (jQuery('.bloque-tabs .quicktabs-tabs').is(':visible')) {
            jQuery('<div class="sombra"><span class="triangulo-sombra"></span></div>').appendTo('.bloque-tabs .item-list');
            moveArrowTabs('bloque-tabs .item-list');
            jQuery('.bloque-tabs .item-list ul li a').click(function () {
                moveArrowTabs('bloque-tabs .item-list');
            })
        }

        jQuery('.grid').masonry({
            itemSelector: '.grid-item',
            percentPosition: true
        });

        jQuery(".fancybox").fancybox();

        jQuery('.fancybox-media').fancybox({
            helpers: {
                media: {}
            }
        });
    })

    jQuery(window).scroll(function () {
        // Color fondo Menu Scroll
        if (jQuery(document).scrollTop() >= 10) {
            jQuery('header.header').addClass('fondo');
        } else {
            jQuery('header.header').removeClass('fondo');
        }
        if (jQuery(document).scrollTop() >= 10) {
            jQuery('.bloque-banner ul').addClass('menu-fixed');
        } else {
            jQuery('.bloque-banner ul').removeClass('menu-fixed');
        }
    })


});