jQuery(function(e){function r(){jQuery(window).width()<767?jQuery("nav .menu > li").off("mouseenter mouseleave"):jQuery("nav .menu > li").on("mouseenter mouseleave")}function i(){jQuery(window).width()<767?jQuery("#recovery").appendTo("#box-login"):jQuery("#recovery").appendTo("#box-login form")}function o(e){jQuery("."+e+" .sombra span").css({left:jQuery("."+e+" ul li.active").offset().left+jQuery("."+e+" ul li.active").innerWidth()/2})}i(),r(),jQuery(".navbar-toggle").click(function(){jQuery(this).hasClass("collapsed")||jQuery(".submenu").hide()});var t=jQuery(".owl-carousel-offers");if(t.on("initialized.owl.carouselresize.owl.carousel resized.owl.carousel",function(e){var r=e.item.count,i=e.page.size;4==i||3==i?r<4&&jQuery(e.target).addClass("center"):jQuery(e.target).removeClass("center")}),t.owlCarousel({loop:!1,margin:10,nav:!0,responsive:{0:{items:1},769:{items:3},1200:{items:4}}}),jQuery(".tab-bloque-live-right").html(jQuery(".tab-bloque-live ul li:first-child").find("div").clone()),jQuery(".bloque-live article figure").html(jQuery(".tab-bloque-live ul li:first-child").find("img.imagen-fondo").clone()),jQuery(".bloque-live .rombo").attr("src",jQuery(".tab-bloque-live ul li:first-child").find("img.imagen-rombo").attr("src")),jQuery(".bloque-live figure").css({"background-image":"url("+jQuery(".bloque-live figure img").attr("src")+")"}),jQuery(".tab-bloque-live ul li").click(function(){jQuery(".tab-bloque-live ul li").removeClass("active"),jQuery(this).addClass("active"),jQuery(".tab-bloque-live-right").html(jQuery(this).find("div").clone()),jQuery(".bloque-live article figure").html(jQuery(this).find("img").clone()),jQuery(".bloque-live figure").css({"background-image":"url("+jQuery(".bloque-live figure img").attr("src")+")"}),jQuery(".bloque-live .rombo").attr("src",jQuery(this).find("img.imagen-rombo").attr("src"))}),jQuery(".block-faqs .faq h3").click(function(){jQuery(window).width()<768&&jQuery(this).parent().toggleClass("open")}),jQuery("body").click(function(e){"logear"==e.target.id||"register"==e.target.id||"edit-name"==e.target.id||"edit-pass"==e.target.id||"btn-submenu"==e.target.className?(e.preventDefault(),"logear"==e.target.id?(jQuery("#login").toggleClass("open"),jQuery(".onclick-menu-content").removeClass("open")):"register"==e.target.id&&(jQuery(".drop-register").parent().find("ul").toggleClass("open"),jQuery("#login").removeClass("open")),"btn-submenu"==e.target.className&&(jQuery(e.target).parent().parent().toggleClass("in-submenu"),jQuery(e.target).parent().find(".submenu").show())):(jQuery(".drop-register").parent().find("ul").removeClass("open"),jQuery("#login").removeClass("open"),jQuery("nav .navbar-collapse").removeClass("in-submenu"))}),jQuery(".navbar-collapse").on("shown.bs.collapse",function(){var e=jQuery(window).height()-(jQuery("header .col-md-3").innerHeight()+jQuery(".menu-superior").innerHeight());jQuery("header nav").height(e)}),jQuery(".navbar-collapse").on("hidden.bs.collapse",function(){jQuery("header nav").height("0")}),jQuery(window).width()>768){var l=jQuery(".container").width()/2,a=jQuery(".slider-activities").width()/3;jQuery(".slider-entertaiment .flexslider").flexslider({controlNav:!1,animation:"slide",prevText:"",nextText:"",touch:!0,itemWidth:l}),jQuery(".slider-activities .flexslider").flexslider({controlNav:!1,animation:"slide",prevText:"",nextText:"",touch:!0,itemWidth:a})}else jQuery(".slider-entertaiment .flexslider").flexslider({animation:"slide",prevText:"",nextText:"",touch:!0}),jQuery(".slider-activities .flexslider").flexslider({animation:"slide",prevText:"",nextText:"",touch:!0}),jQuery(".block-terms h2").on("click",function(){jQuery(".block-terms .content").toggleClass("open")}),jQuery(".back-submenu, .submenu li").on("click",function(){jQuery("nav .navbar-collapse").removeClass("in-submenu"),jQuery("nav .submenu").hide()});jQuery(".container-tabs .tab1 .block-resortspage .flexslider").flexslider({animation:"slide",prevText:"",nextText:"",touch:!0}),jQuery(".block-resortspage .flexslider").flexslider({animation:"slide",prevText:"",nextText:"",touch:!0}),jQuery(".bloque-tripadvisor .flexslider").flexslider({controlNav:!1,animation:"slide",prevText:"",nextText:"",touch:!0}),jQuery(".bloque-slider .flexslider").flexslider({controlNav:!1,animation:"fade",prevText:"",nextText:"",touch:!0}),jQuery(".bloque-slider-white.flexslider").flexslider({controlNav:!1,animation:"fade",prevText:"",nextText:"",touch:!0}),jQuery(".bloque-contenido2.flexslider").flexslider({controlNav:!1,animation:"fade",prevText:"",nextText:"",touch:!0}),jQuery(".bloque-contenido4.flexslider").flexslider({controlNav:!1,animation:"fade",prevText:"",nextText:"",touch:!0}),jQuery("nav .menu > li").hover(function(){jQuery(window).width()>768&&(jQuery(this).find(".submenu").show(),jQuery('<div class="area-activa"></div>').appendTo(this))},function(){jQuery(window).width()>768&&(jQuery(".submenu").hide(),jQuery(".area-activa").remove())}),jQuery(".language > p").click(function(){jQuery(".down").toggle()}),jQuery(".bloque-slider").height()>=jQuery(window).height()?jQuery(".bloque-booking").addClass("booking-position"):jQuery(".bloque-booking").removeClass("booking-position"),jQuery(".booking-btn").click(function(){jQuery(".booking-btn").removeClass("active"),jQuery(this).addClass("active"),jQuery(".booking-btn").find("span").removeClass("active"),jQuery(this).find("span").addClass("active")});for(var s=jQuery(".bloque-gallery-overblack ul li"),n=0;n<s.length;n++){var u=s[n];jQuery(u).find(".fondo-gallery").css({"background-image":"url("+jQuery(u).find("img").attr("src")+")"})}for(var d=jQuery(".bloque-real-weddings .row img, .bloque-cuadros img, .bloque-accommodations img, .gallery-tab img"),n=0;n<d.length;n++){var u=d[n];jQuery(u).parent().find(".fondo-imagen").css({"background-image":"url("+jQuery(u).attr("src")+")"})}jQuery(".bloque-tabs").is(":visible")&&jQuery(".bloque-tabs header").is(":visible")&&jQuery(".bloque-tabs header ul li").click(function(){jQuery(".bloque-tabs header ul li").removeClass("active"),jQuery(this).addClass("active"),jQuery(".container-tabs > div").removeClass("active"),jQuery("."+jQuery(this).attr("data-media")).addClass("active"),jQuery("html, body").animate({scrollTop:jQuery("."+jQuery(this).attr("data-media")).offset().top-115},1500),o("bloque-tabs header"),jQuery("."+jQuery(this).attr("data-media")+" .block-resortspage .flexslider").flexslider({animation:"slide",controlNav:!0,prevText:"",nextText:"",touch:!0})}),jQuery(".grid").masonry({itemSelector:".grid-item",percentPosition:!0}),jQuery(".fancybox").fancybox(),jQuery(".fancybox-media").fancybox({helpers:{media:{}}}),jQuery(".bloque-slider-mobile").flexslider({controlNav:!0,animation:"fade",prevText:"",nextText:"",touch:!0}),jQuery(".icon_menu").click(function(){jQuery("#menu-mobile").addClass("open")}),jQuery(".icon-user").click(function(){jQuery(".form-login").addClass("open")});var c=document.getElementById("search-desktop"),y=document.getElementById("icon-search");document.addEventListener("click",function(e){var r=e.target;jQuery(window).width()<767?r!=y&&r!=c&&"form-submit"!=r.className&&"form-text"!=r.className?jQuery("#search-desktop").removeClass("open"):(console.log(r.className),"form-submit"==r.className||"form-text"==r.className||jQuery("#search-desktop").toggleClass("open")):r!=y&&r!=c&&"form-submit"!=r.className&&"form-text"!=r.className?jQuery("#search-desktop").removeClass("open"):jQuery("#search-desktop").addClass("open")},!1),jQuery(".btn-book").click(function(){jQuery("#booking-mobile").addClass("open")}),jQuery(".btn-chat").click(function(){jQuery("#chat-mobile").addClass("open")}),jQuery(".cerrar_menu").click(function(){jQuery("#login").toggleClass("open")}),jQuery(".datepicker").datepicker(),jQuery(".styled").selectpicker(),jQuery("body").on("click",".datepicker",function(){jQuery(this).datepicker(),jQuery(this).datepicker("show")}),jQuery(".newsletter .webform-client-form").validate({errorClass:"errornewsletter",rules:{"submitted[email_adress]":{required:!0,email:!0}},messages:{"submitted[email_adress]":{required:"Este campo es requerido",email:"Por favor, introduce una dirección de correo electrónico válida."}},submitHandler:function(e){e.submit()}}),jQuery(window).resize(function(){i(),r(),jQuery(".bloque-slider").height()>=jQuery(window).height()?jQuery(".bloque-booking").addClass("booking-position"):jQuery(".bloque-booking").removeClass("booking-position")}),jQuery(window).load(function(){jQuery(".bloque-tabs").is(":visible")&&jQuery(".bloque-tabs header").is(":visible")&&o("bloque-tabs header"),jQuery(".bloque-tabs .quicktabs-tabs").is(":visible")&&(jQuery('<div class="sombra"><span class="triangulo-sombra"></span></div>').appendTo(".bloque-tabs .item-list"),o("bloque-tabs .item-list"),jQuery(".bloque-tabs .item-list ul li a").click(function(){o("bloque-tabs .item-list")})),jQuery(".grid").masonry({itemSelector:".grid-item",percentPosition:!0}),jQuery(".fancybox").fancybox(),jQuery(".fancybox-media").fancybox({helpers:{media:{}}})}),jQuery(window).scroll(function(){jQuery(document).scrollTop()>=10?jQuery("header.header").addClass("fondo"):jQuery("header.header").removeClass("fondo"),jQuery(document).scrollTop()>=10?jQuery(".bloque-banner ul").addClass("menu-fixed"):jQuery(".bloque-banner ul").removeClass("menu-fixed")})});
