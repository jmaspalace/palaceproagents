/**

 * @file
 * Bluez Slider Javascript.
 *
 */
(function($) {
  Drupal.behaviors.slider = {
    attach: function(context, settings) {
      var codeGlobal = "";
      var map_plants;

      function plants_cl() {
        map_plants = new jvm.WorldMap({
          map: 'area_map',
          regionsSelectable: true,
          container: $('#mapa'),
          series: {
            regions: [{
              attribute: 'fill'
            }]
          },
          zoomOnScroll: false,
          /*zoomMin: 3,*/
          backgroundColor: '#000',
          regionStyle: {
            initial: {
              fill: '#005760',
              "fill-opacity": 1,
              stroke: 'none',
              "stroke-width": 0,
              "stroke-opacity": 0
            },
            hover: {
              "fill-opacity": 0.8,
            },
              selected: {
                  fill: '#00ac94'
              }
          },
          onRegionClick: function(e, code) {
            // console.log('|' + code + '|');
            mostrarRegion_plants(code);
          },
          onRegionLabelShow: function(event, label, code) {
              $(label).css({'font-size':'14px','display':'table', 'color':'#00ad95', 'background-image':'none','background-color':'#001a1d', 'line-height':'17px', 'border': '1px solid #00ad95' });
          }
        });

        generateColors_plants = function() {
          var colors = {};
          colors['US-NM'] = '#005760';
          return colors;
        },
        $(".agents").hide();
        // $(".agents").click(function() {
        // $(".agents").hide();
        // });


        var escala = 0.1;
        var top_a = 0;
        var refreshId, timeouto;


          mostrarRegion_plants = function(code, top_, left_) {
          map_plants.clearSelectedRegions();
          codeGlobal = code;
          $(".agents").hide();
          $(".agents").removeClass('activeS');
          $('.agents .slider').attr('data-slide','');
          $('.agents .slider').removeClass('animated');
          $("#bdms > p").hide();
          escala = 0.1;
          top_a = 0;
          top_a = top_ + 180;
          //console.log('Hola' + code);
          $("." + code).show().addClass('activeS');
          $("." + code).css('left', left_);
          $("." + code).css('-webkit-transform', 'scale(' + 0 + ')');
          $("." + code).css('-moz-transform', 'scale(' + 0 + ')');
          $("." + code).css('transform', 'scale(' + 0 + ')');
          $('path').attr('fill', '#005760');
          clearInterval(refreshId);
          clearTimeout(timeouto);
          refreshId = setInterval(function() {
            test(top_);
          }, 20);
          timeouto = setTimeout(function() {
            clearInterval(refreshId);
          }, 5000);

          $('.agents.activeS').each(function(index,value){
            var valuesActive=$('.agents.activeS').length;
            if(valuesActive > 1){
              var valueinitial=($(this).width() + 15 ) * index;
              $(this).find('.slider').attr('data-slide',index);

              $(this).find('.slider').css('transform', 'translateX('+valueinitial+'px)');
              $('#bdms .controls').show();
              $('#bdms .controls .slideprev').hide();
            }else{
              $('#bdms .controls').hide();
            }
          })

        };
        function test(arriba) {
          escala += (1.4 - escala) / 40;
          if (escala > 1) {
            escala = 1;
          }
          ;
          top_a += (arriba - top_a) / 20;
          top_a = Math.round(top_a);
          $("." + codeGlobal).css('-webkit-transform', 'scale(' + Math.round(escala * 100) / 100 + ')');
          $("." + codeGlobal).css('-moz-transform', 'scale(' + Math.round(escala * 100) / 100 + ')');
          $("." + codeGlobal).css('transform', 'scale(' + Math.round(escala * 100) / 100 + ')');
          $("." + codeGlobal).css('top', top_a);
        }
      }
      function showAgetsSearch(code) {
          mostrarRegion_plants(code);
      }
      $(document).ready(function() {
        plants_cl();
        if($('#mapa').length){

          //Funcionalidad mobile
          var arr = $.map(map_plants.regions, function(el) { return el; });
          var contentSelect=$('<div class="content-select"> </div>');
          var menuListaMd = $ ('<select id="select-map"></select>');
          $ (arr).each(function (index,value) {
            var option = $('<option value='+arr[index].element.properties['data-code']+'>'+ arr[index].config.name +'</option>');
            menuListaMd.append (option);
          })
          contentSelect.append(menuListaMd);
          $('#bdms').append(contentSelect);

          $(document.body).on('change','#select-map',function(){
            var codemap=$(this).context.value;

            map_plants.clearSelectedRegions();
            map_plants.setSelectedRegions([codemap]);
            showAgetsSearch(codemap);

          }).change(); // trigger `.change()` event on page load.

          //funcionalidad slider target
          var click=0  ;

          $('#bdms .controls div').click(function(){
            $('.agents.activeS .slider').addClass('animated');
            if($(this).hasClass('slidenext') == true ){
              click = click + 1 ;
              $('.agents.activeS .slider').removeClass('active');
              $('.agents.activeS').each(function(index,value){
                var valueactual= parseInt($(this).find('.slider').css('transform').split(',')[4]) ;

                var value= (( $(this).width() + 15 - valueactual) * (- 1));
                $(this).find('.slider').css('transform', 'translateX('+value+'px)');
                $('#bdms .controls .slideprev').show();
              })

              $('.agents.activeS .slider[data-slide='+click+']').addClass('active');

              var totalslides=$('.agents.activeS').length - 1;

              var slideFist=$('.agents.activeS .slider.active').attr('data-slide');

              if(slideFist == totalslides){
                $('#bdms .controls .slidenext').hide();
              }

            }else{
              click = click - 1 ;
              $('.agents.activeS .slider').removeClass('active');
              $('#bdms .controls .slidenext').show();
              $('.agents.activeS').each(function(index,value){
                var valueactual= parseInt($(this).find('.slider').css('transform').split(',')[4]) ;
                var value= (( $(this).width() + 15 + valueactual) * (1));
                $(this).find('.slider').css('transform', 'translateX('+value+'px)');
              })
              $('.agents.activeS .slider[data-slide='+click+']').addClass('active');

              var slideFist=$('.agents.activeS .slider.active').attr('data-slide');

              if(slideFist == 0){
                $('#bdms .controls .slideprev').hide();
              }

            }
          })

          /*if(settings.slider.state_code){
            if($('.'+settings.slider.state_code).length)
              showAgetsSearch(settings.slider.state_code);
            else
              alert("No hay agentes para este estado");
          }*/
        }
        /* Slider Mapa*/
        /*$(".slider").easySlider({
          auto: false,
          continuous: false,
          controlsShow:false,
        });*/
        /* Fin Slider Mapa*/
      });
    }
  };
})(jQuery);
