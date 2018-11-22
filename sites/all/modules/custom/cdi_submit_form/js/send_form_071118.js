(function($) {
  Drupal.behaviors.sendForms = {
    attach: function (context, settings) {
      $("#send").on('click', function(event)
      {
        event.preventDefault();
        event.stopPropagation();

        var agent_name_val = $("#agent_name").val();
        var travel_agency_val = $("#travel_agency").val();
        var address_val = $("#address").val();
        var state_val = $("#state").val();
        var phone_val = $("#phone").val();
        var country_val = $("#country").val();
        var agency_val = $("#agency").val();
        var e_mail_val = $("#e_mail").val();
        var city_val = $("#city").val();
        var zip_val = $("#zip").val();
        var fax_val = $("#fax").val();
        var preferred_resort_val = $("#preferred_resort").val();
        var preferred_travel_date_for_agent_arr_val = $("#preferred_travel_date_for_agent_arr").val();
        var preferred_travel_date_for_agent_dep_val = $("#preferred_travel_date_for_agent_dep").val();
        var agent_companion_name_val = $("#agent_companion_name").val();
        var if_traveling_with_children_please_list_ages_val = $("#if_traveling_with_children_please_list_ages").val();
        var of_adults_in_room_val = $("#_of_adults_in_room").val();
        var of_children_in_room_val = $("#_of_children_in_room").val();
        var bedding_val = $("#bedding").val();
        var id_form_val = $("#idForm").val();
        var sendEmail_val = $("#sendEmail").val();

        var client = customerInformation();

        if( !validateCustomerInformation() ) {
          $.ajax({
            type: "POST",
            url: Drupal.settings.basePath+Drupal.settings.pathPrefix+'form/redemption_form',
            dataType: 'json',
            data: {
              agent_name: agent_name_val,
              travel_agency: travel_agency_val,
              address: address_val,
              state: state_val,
              phone: phone_val,
              country: country_val,
              agency: agency_val,
              e_mail: e_mail_val,
              city: city_val,
              zip: zip_val,
              fax: fax_val,
              preferred_resort: preferred_resort_val,
              preferred_travel_date_for_agent_arr: preferred_travel_date_for_agent_arr_val,
              preferred_travel_date_for_agent_dep: preferred_travel_date_for_agent_dep_val,
              agent_companion_name: agent_companion_name_val,
              if_traveling_with_children_please_list_ages: if_traveling_with_children_please_list_ages_val,
              of_adults_in_room: of_adults_in_room_val,
              of_children_in_room: of_children_in_room_val,
              bedding: bedding_val,
              id_form: id_form_val,
              sendEmail: sendEmail_val,
              clients: client
            }
          }).done(function (obj) {
              if (obj.status)
              {
                alert('Request successfully sent');
                $('#form2').find(".filas input[type=text]").val('');
				  $('#form2').find(".filas input[type=textfield]").val('');
                $('#form2').find(".filas select").val('');
              }
              else
              {
                alert("Error");
              }
          });
        }
        else
        {
          alert('Please, confirm the missing fields');
        }
      });

      function customerInformation()
      {
        var clients = [];

        var numClient = parseInt($('#numCliente').val());

        var client = [$("#name").val(), $("#arrival_date").val(), $("#departure_date").val(), $("#resort").val(), $("#confirmation_").val()];
        clients.push(client);

        for (var i = 1; i < numClient; i++)
        {
          client = [$("#name" + i).val(), $("#arrival_date" + i).val(), $("#departure_date" + i).val(), $("#resort" + i).val(), $("#confirmation_" + i).val()];
          clients.push(client);
        }
        return clients;
      }

      function validateCustomerInformation()
      {
        var bandError = false;
        $('.box-cliente,#form-user').each(function(index, element)
        {
          $(element).find('input, select').each(function(index, element)
          {
            var _value = $(element).val().trim();
            if( _value == '' )
            {
              $(element).addClass('input-error');
              bandError = true;
            }
            else
            {
              $(element).removeClass('input-error');
            }
          });
        });
        return bandError;
      }

      $(".more-cl").click(function() {
        var text = $('#box-cliente');
        var numClient = parseInt($('#numCliente').val());

        //$("#webform").prepend('<div id="box-cliente' + numClient + '" class="box-cliente">' + text.html() + '</div>');
        $("#webform > .box-cliente:last").after('<div id="box-cliente' + numClient + '" class="box-cliente">' + text.html() + '</div>');

        $("#box-cliente" + numClient + " input[type=text], #box-cliente" + numClient + " select").attr("id", function() {
          return this.id + numClient;
        });
        $('#numCliente').val(numClient + 1);
        $('#arrival_date' + numClient).removeClass("hasDatepicker").parent().find("img").remove();
        $('#departure_date' + numClient).removeClass("hasDatepicker").parent().find("img").remove();
        $("#box-cliente" + numClient + " .cliente-header span.number-client").text(numClient + 1 );
        //fecha();
      });

      $(document).on("click", ".reset", function(e)
      {
        e.preventDefault();
        e.stopPropagation();
        $(this).parent().parent().find(".datos-1 .filas input").val('');
        $(this).parent().parent().find(".datos-1 .filas select").val('');
      });

    }
  }
})(jQuery);
