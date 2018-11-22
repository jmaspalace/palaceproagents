jQuery(function ($) {

    jQuery(window).scroll(function () {
        if (jQuery(document).scrollTop() >= jQuery(window).height()) {
            jQuery('#btn-vertical-booking').addClass('visible');
            jQuery('#tabbed_box_1').addClass('derecha');
        } else {
            jQuery('#btn-vertical-booking').removeClass('visible');
            jQuery('#tabbed_box_1').removeClass('vertical');
            jQuery('#tabbed_box_1').removeClass('derecha');
        }
    })


    jQuery('#tabbed_box_1 button.close').click(function () {
        jQuery('#tabbed_box_1').removeClass('vertical');
    })


    // When a link is clicked
    jQuery("a.tab").click(function (e) {
        e.preventDefault();
        // switch all tabs off
        jQuery("#tabbed_box_1 .active").removeClass("active");

        if (jQuery(this).attr("title") == 'content_1') {
            jQuery("#tabbed_box_1").addClass('active');
        } else {
            jQuery("#tabbed_box_1").removeClass('active');
        }


        checkOutDate(jQuery(this));

        //jQuery('.check_out_input').eq(i).val(' ').datepicker('setStartDate', minDate).datepicker('update', ('startDate', dateOut));



        // switch this tab on
        jQuery(this).addClass("active");

        // slide all content up
        jQuery("#tabbed_box_1 .content").hide();

        // slide this content up
        var content_show = jQuery(this).attr("title");
        jQuery("#" + content_show).show();

    });


    jQuery('#hotel').change(function () {
        if (jQuery('#hotel').val() == '10458' || jQuery('#hotel').val() == '10399' || jQuery('#hotel').val() == '10403' || jQuery('#hotel').val() == '10400') {
            jQuery('.children-form2').hide();
        } else {
            jQuery('.children-form2').show();
        }
        jQuery('select#child').selectpicker('val', '0');

    });
    jQuery('#hotel2').change(function () {
        if (jQuery('#hotel2').val() == '10458' || jQuery('#hotel2').val() == '10399' || jQuery('#hotel2').val() == '10403' || jQuery('#hotel2').val() == '10400') {
            jQuery('.childrenform1').hide();
        } else {
            jQuery('.childrenform1').show();
        }
        jQuery('select#child2').selectpicker('val', '0');

    });

    // El boton Book Now ahora despliega el widget en un lightbox
    jQuery('.book-now').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        jQuery('a[title="content_1"]').trigger('click');
        //jQuery('#tabbed_box_1').modal('show');

        if (jQuery(window).width() > '992') {
            jQuery('#tabbed_box_1').addClass('vertical');
        } else {
            jQuery('#tabbed_box_1').modal('show');
        }


    });


    jQuery('.btn-book-now').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        jQuery('a[title="content_2"]').trigger('click');
        //jQuery('#tabbed_box_1').modal('show');
        //jQuery('#tabbed_box_1').modal('show');
        if (jQuery(window).width() > '992') {
            jQuery('#tabbed_box_1').addClass('vertical');
            jQuery('#tabbed_box_1').addClass('derecha');
        } else {
            jQuery('#tabbed_box_1').modal('show');
        }

    });


    // Oculto el lightbox del widget
    jQuery('#widget-close').click(function () {
        jQuery('#tabbed_box_1').fadeOut(250);
    });
});

var monthname = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

window.onload = function () {

    //jQuery(function() {

    jQuery("a", ".demo").button();

    var unavailable_dates = [];
    var promotions = [];
    var rates = {};
    var last_avail_date = null;

    // get the rates from xml
    var xmlDoc = jQuery.parseXML(CAL_XML);
    parse_rates(xmlDoc);

    function parse_rates(xml) {
        var unavailable = [];
        var promotion = [];
        var rate = {};
        jQuery(xml).find('RS').each(function () {
            jQuery(this).find('R').each(function () {
                var date = new Date(jQuery(this).attr("D").substr(0, 4), jQuery(this).attr("D").substr(4, 2) - 1, jQuery(this).attr("D").substr(6, 2));
                last_avail_date = date;
                var d = jQuery.datepicker.formatDate("yyyy-mm-dd", date);
                var a = Math.round(jQuery(this).attr("A"));
                var c = jQuery(this).attr("C");
                var p = jQuery(this).attr("P");

                if (c === 'Y') {
                    unavailable.push(d);
                } else if (p === 'Y') {
                    promotion.push(d);
                }
                rate[d] = a;
            });
        });
        unavailable_dates = unavailable;
        promotions = promotion;
        rates = rate;
    }

    function check_the_date(needle, hay) {
        for (var i = 0; i < hay.length; i++) {
            if (needle == hay[i]) {
                return true;
            }
        }
        return false;
    }

    function showRate(date) {
        return rates[date] ? rates[date] : '';
    }

    var d1 = -1,
        d2 = -1;
    var stopDate = -1;
    var _selected_date = null;
    var dT1 = -1,
        dT2 = -1;

    jQuery("#dDate").datepicker({
        numberOfMonths: 1,
        dateFormat: "yy-mm-dd",
        minDate: 0,
        maxDate: "+24M +10D",
        showOn: "both",
        buttonImage: "",
        buttonImageOnly: true,
        showAnim: 'fold',
        dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        showRate: function (date) {
            var cur = jQuery.datepicker.formatDate("yyyy-mm-dd", date);
            var price = showRate(cur);
            return price != 0 ? price : '';
        },
        beforeShowDay: function (date) {
            var cur = jQuery.datepicker.formatDate("yyyy-mm-dd", date);
            var classDate = jQuery.datepicker.formatDate("yyyy-mm-dd", date);
            var available = true;
            var classn = '';
            var d = new Date(); // today!\
            d.setDate(d.getDate() - 1);
            if (date < d) {
                classn = 'unavail';
                available = false;
            } else if (check_the_date(cur, promotions)) {
                classn = 'promos';
            } else if (check_the_date(cur, unavailable_dates)) {
                classn = 'unavail' + " " + classDate;
                available = false;
            } else if (date > last_avail_date) {
                classn = 'unavail';
                available = false;
            }
            if ((d1 == -1 && d2 != -1 && d2 === date.getTime()) || (d2 == -1 && d1 != -1 && d1 === date.getTime())) {
                classn = 'date-range-selected';
            }
            if (d1 != -1 && d2 != -1 && date.getTime() >= Math.min(d1, d2) && date.getTime() <= Math.max(d1, d2)) {
                if (classn != 'unavail' + " " + classDate) {
                    if (stopDate != -1) {
                        if (stopDate >= date.getTime()) {
                            classn = 'date-range-selected';
                        } else {
                            if (check_the_date(cur, promotions)) {
                                classn = 'promos';
                            } else {
                                classn = '';
                            }
                        }
                    } else {
                        if (+_selected_date == +date) {
                            classn = 'date-range-selected selected';
                        } else {
                            classn = 'date-range-selected';
                        }
                    }
                } else {
                    classn = 'unavail';
                    stopDate = new Date(Math.max(d1, d2));
                }
            } else if (d1 != -1 && d2 == -1 && d1 <= date.getTime()) {
                available = true;
            }
            return [available, classn];
        },
        beforeShow: function (input, inst) {
            jQuery('#ui-datepicker-div').addClass('travel-calendar');
        },
        onSelect: function (selected, inst) {
            cur = (new Date(inst.selectedYear, inst.selectedMonth, inst.selectedDay)).getTime();
            var arrivalDate = jQuery("#aDate").datepicker("getDate");
            if (cur >= arrivalDate) {
                if (dT1 == -1 && dT2 == -1) {
                    d1 = -1;
                    d2 = -1;
                    dT1 = arrivalDate ? arrivalDate : -1;
                    d1 = dT1;
                } else if (dT1 != -1) {
                    dT2 = cur;
                    d2 = dT2;
                    dT1 = -1;
                    dT2 = -1;
                    stopDate = -1;
                    _selected_date = new Date(Math.max(d1, d2));
                }
            } else {
                alert('Depart date should be great than Arrival date.');
                jQuery("#dDate").val(jQuery.datepicker.formatDate('yyyy-mm-dd', new Date(Math.max(d1, d2))));
            }
            document.getElementById("dDate2").value = jQuery("#dDate").val();
        }
    });

    jQuery("#aDate").datepicker({
        numberOfMonths: 1,
        dateFormat: "yy-mm-dd",
        minDate: 0,
        maxDate: "+24M +10D",
        showOn: "both",
        buttonImage: "",
        buttonImageOnly: true,
        showAnim: 'fold',
        dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        showRate: function (date) {
            var cur = jQuery.datepicker.formatDate("yyyy-mm-dd", date);
            var price = showRate(cur);
            return price != 0 ? price : '';
        },
        beforeShowDay: function (date) {
            var cur = jQuery.datepicker.formatDate("yyyy-mm-dd", date);
            var classDate = jQuery.datepicker.formatDate("yyyy-mm-dd", date);
            var available = true;
            var classn = '';
            var d = new Date(); // today!\
            d.setDate(d.getDate() - 1);
            if (date < d) {
                classn = 'unavail';
                available = false;
            } else if (check_the_date(cur, promotions)) {
                classn = 'promos';
            } else if (check_the_date(cur, unavailable_dates)) {
                classn = 'unavail';
                available = false;
            } else if (date > last_avail_date) {
                classn = 'unavail';
                available = false;
            }
            if ((d1 == -1 && d2 != -1 && d2 === date.getTime()) || (d2 == -1 && d1 != -1 && d1 === date.getTime())) {
                classn = 'date-range-selected';
            }
            if (d1 != -1 && d2 != -1 && date.getTime() >= Math.min(d1, d2) && date.getTime() <= Math.max(d1, d2)) {
                if (classn != 'unavail' + " " + classDate) {
                    if (stopDate != -1) {
                        if (stopDate >= date.getTime()) {
                            classn = 'date-range-selected';
                        } else {
                            if (check_the_date(cur, promotions)) {
                                classn = 'promos';
                            } else {
                                classn = '';
                            }
                        }
                    } else {
                        if (+_selected_date == +date) {
                            classn = 'date-range-selected selected';
                        } else {
                            classn = 'date-range-selected';
                        }
                    }
                } else {
                    classn = 'unavail';
                    stopDate = new Date(Math.max(d1, d2));
                }
            } else if (d1 != -1 && d2 == -1 && d1 <= date.getTime()) {
                available = true;
            }
            return [available, classn];
        },
        beforeShow: function (input, inst) {
            jQuery('#ui-datepicker-div').addClass('travel-calendar');
        },
        onSelect: function (dateText, inst) {
            var t = new Date(dateText);
            var f = new Date(dateText);
            f.setDate(f.getDate() + 7);

            d1 = t, dT1 = d1;
            d2 = f, dT2 = d2;
            jQuery('#dDate2').datepicker("setDate", f);
            jQuery('#dDate').datepicker("setDate", f);
            jQuery('#aDate2').datepicker("setDate", t);
        }
    });

    jQuery("#dDate2").datepicker({
        numberOfMonths: 1,
        dateFormat: "yy-mm-dd",
        minDate: 0,
        maxDate: "+24M +10D",
        showOn: "both",
        buttonImage: "",
        buttonImageOnly: true,
        showAnim: 'fold',
        dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        showRate: function (date) {
            var cur = jQuery.datepicker.formatDate("yyyy-mm-dd", date);
            var price = showRate(cur);
            return price != 0 ? price : '';
        },
        beforeShowDay: function (date) {
            var cur = jQuery.datepicker.formatDate("yyyy-mm-dd", date);
            var classDate = jQuery.datepicker.formatDate("yyyy-mm-dd", date);
            var available = true;
            var classn = '';
            var d = new Date(); // today!\
            d.setDate(d.getDate() - 1);
            if (date < d) {
                classn = 'unavail';
                available = false;
            } else if (check_the_date(cur, promotions)) {
                classn = 'promos';
            } else if (check_the_date(cur, unavailable_dates)) {
                classn = 'unavail';
                available = false;
            } else if (date > last_avail_date) {
                classn = 'unavail';
                available = false;
            }
            if ((d1 == -1 && d2 != -1 && d2 === date.getTime()) || (d2 == -1 && d1 != -1 && d1 === date.getTime())) {
                classn = 'date-range-selected';
            }
            if (d1 != -1 && d2 != -1 && date.getTime() >= Math.min(d1, d2) && date.getTime() <= Math.max(d1, d2)) {
                if (classn != 'unavail' + " " + classDate) {
                    if (stopDate != -1) {
                        if (stopDate >= date.getTime()) {
                            classn = 'date-range-selected';
                        } else {
                            if (check_the_date(cur, promotions)) {
                                classn = 'promos';
                            } else {
                                classn = '';
                            }
                        }
                    } else {
                        if (+_selected_date == +date) {
                            classn = 'date-range-selected selected';
                        } else {
                            classn = 'date-range-selected';
                        }
                    }
                } else {
                    classn = 'unavail';
                    stopDate = new Date(Math.max(d1, d2));
                }
            } else if (d1 != -1 && d2 == -1 && d1 <= date.getTime()) {
                available = true;
            }
            return [available, classn];
        },
        beforeShow: function (input, inst) {
            jQuery('#ui-datepicker-div').addClass('travel-calendar');
        },
        onSelect: function (dateText, inst) {
            cur = (new Date(inst.selectedYear, inst.selectedMonth, inst.selectedDay)).getTime();
            var arrivalDate = jQuery("#aDate2").datepicker("getDate");
            var DateOut = new Date();
            if (cur >= arrivalDate) {
                if (dT1 == -1 && dT2 == -1) {
                    d1 = -1;
                    d2 = -1;
                    dT1 = arrivalDate ? arrivalDate : -1;
                    d1 = dT1;
                } else if (dT1 != -1) {
                    dT2 = cur;
                    d2 = dT2;
                    dT1 = -1;
                    dT2 = -1;
                    stopDate = -1;
                    _selected_date = new Date(Math.max(d1, d2));
                }
            } else {
                alert('Depart date should be great than Arrival date.');
                jQuery("#dDate2").val(jQuery.datepicker.formatDate('yyyy-mm-dd', new Date(Math.max(d1, d2))));
            }

            DateOut.setDate(DateOut.getDate() + 7);
            jQuery('#dDate').datepicker("setDate", DateOut);
            //document.getElementById("dDate").value= jQuery( "#dDate2" ).val();
        }

    });

    jQuery("#aDate2").datepicker({
        numberOfMonths: 1,
        dateFormat: "yy-mm-dd",
        minDate: 0,
        maxDate: "+24M +10D",
        showOn: "both",
        buttonImage: "",
        buttonImageOnly: true,
        showAnim: 'fold',
        dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        showRate: function (date) {
            var cur = jQuery.datepicker.formatDate("yyyy-mm-dd", date);
            var price = showRate(cur);
            return price != 0 ? price : '';
        },
        beforeShowDay: function (date) {
            var cur = jQuery.datepicker.formatDate("yyyy-mm-dd", date);
            var classDate = jQuery.datepicker.formatDate("yyyy-mm-dd", date);
            var available = true;
            var classn = '';
            var d = new Date(); // today!\
            d.setDate(d.getDate() - 1);
            if (date < d) {
                classn = 'unavail';
                available = false;
            } else if (check_the_date(cur, promotions)) {
                classn = 'promos';
            } else if (check_the_date(cur, unavailable_dates)) {
                classn = 'unavail';
                available = false;
            } else if (date > last_avail_date) {
                classn = 'unavail';
                available = false;
            }
            if ((d1 == -1 && d2 != -1 && d2 === date.getTime()) || (d2 == -1 && d1 != -1 && d1 === date.getTime())) {
                classn = 'date-range-selected';
            }
            if (d1 != -1 && d2 != -1 && date.getTime() >= Math.min(d1, d2) && date.getTime() <= Math.max(d1, d2)) {
                if (classn != 'unavail' + " " + classDate) {
                    if (stopDate != -1) {
                        if (stopDate >= date.getTime()) {
                            classn = 'date-range-selected';
                        } else {
                            if (check_the_date(cur, promotions)) {
                                classn = 'promos';
                            } else {
                                classn = '';
                            }
                        }
                    } else {
                        if (+_selected_date == +date) {
                            classn = 'date-range-selected selected';
                        } else {
                            classn = 'date-range-selected';
                        }
                    }
                } else {
                    classn = 'unavail';
                    stopDate = new Date(Math.max(d1, d2));
                }
            } else if (d1 != -1 && d2 == -1 && d1 <= date.getTime()) {
                available = true;
            }
            return [available, classn];
        },
        beforeShow: function (input, inst) {
            jQuery('#ui-datepicker-div').addClass('travel-calendar');
        },
        onSelect: function (dateText, inst) {
            var t = new Date(dateText);
            var f = new Date(dateText);
            f.setDate(f.getDate() + 7);

            d1 = t, dT1 = d1;
            d2 = f, dT2 = d2;
            jQuery('#dDate2').datepicker("setDate", f);
            jQuery('#dDate').datepicker("setDate", f);
            jQuery('#aDate').datepicker("setDate", t);

        }
    });

    jQuery("#dialog").dialog({
        modal: true,
        autoOpen: false,
        show: "fold",
        hide: "fold",
        buttons: {
            Ok: function () {
                jQuery(this).dialog("close");
            }
        }
    });

    //});
    checkOutDate(jQuery('.tabbed_area .tabs a.active'));
    jQuery('#ui-datepicker-div').hide();
};


var aD, dD; //Arrival & departure dates
var today = new Date();
today.setDate(today.getDate() + 5); //todays date plus 5
var AFFILIATE = ""; //Affiliate code IATA/ARC/CLID, etc
var HOTELONLY = false;

//Go to Reservhotel function will check all parameters before submitting the form
function gotoReservHotel() {
    var dateform;
    var dateddateform;
    var adultosform;
    var childrenform;
    var dateformat = document.myform.date_format;

    if (jQuery('#isflight').hasClass('active')) {
        dateform = document.myform.aDate;
        dateddateform = document.myform.dDate;
        adultosform = jQuery("#adults option:selected").text();
        childrenform = jQuery("#adults option:selected").text();
    } else {
        dateform = document.myform.aDate;
        dateddateform = document.myform.dDate;
        adultosform = jQuery("#adults2 option:selected").text();
        childrenform = jQuery("#adults2 option:selected").text();
    }

    if (dateform.value != "" && dateform.value != "") {
        aD = new Date();
        dD = new Date();


        var i, month, month2, dateText, dateText2;
        //dateText = document.myform.aDate.value;
        //dateText2 = document.myform.dDate.value;

        if (jQuery('a.tab.active').hasClass('is--flight')) {
            dateText = jQuery("#aDate").val();
            dateText2 = jQuery("#dDate").val();
        } else {
            dateText = jQuery("#aDate2").val();
            dateText2 = jQuery("#dDate2").val();

            dateform.value = jQuery("#aDate2").val();
            dateddateform.value = jQuery("#dDate2").val();

        }


        for (i = 0; i < 12; i++) {
            if (monthname[i] == dateText.substring(3, 6)) {
                month = i;
            }
            if (monthname[i] == dateText2.substring(3, 6)) {
                month2 = i;
            }
        }
        //aD.setFullYear("20"+dateText.substring(7),month, dateText.substring(0,2));
        //dD.setFullYear("20"+dateText2.substring(7),month2, dateText2.substring(0,2));
        aD = new Date(dateText);
        dD = new Date(dateText2);
    }
    //debugger

    // if (document.myform.hotel.value == ""){//Check if arrival date has been selected
    // 	document.getElementById("error").innerHTML = "Select your hotel";
    // 	jQuery( "#dialog" ).dialog( "open" );
    // }


    if (dateform.value == "") { //Check if arrival date has been selected
        document.getElementById("error").innerHTML = "Select your arrival date";
        jQuery("#dialog").dialog("open");
    } else if (dateddateform.value == "") { //Check if departure date has been selected
        document.getElementById("error").innerHTML = "Select your departure date";
        jQuery("#dialog").dialog("open");
    } else if (dD <= aD) { //check to see that departure date is after the arrival date
        document.getElementById("error").innerHTML = "The departure date can not be after the return date.";
        jQuery("#dialog").dialog("open");

    } else if (HOTELONLY == false && document.getElementById("airport") && document.getElementById("airport").value == "") { //check to see if the airport has been selected
        document.getElementById("error").innerHTML = "You must select a departing airport for hotel and air packages.";
        jQuery("#dialog").dialog("open");
    } else if (aD < today && (document.getElementById("airport") && HOTELONLY == false)) { //check to see packages are selected in the future
        document.getElementById("error").innerHTML = "Packages must have be select at least 5 days from today.";
        jQuery("#dialog").dialog("open");
    } else {
        //check affiliate and add hidden attribute to the form
        if (AFFILIATE != "") {
            var field3 = document.createElement("input");
            field3.setAttribute("type", "hidden");
            field3.setAttribute("value", AFFILIATE);
            field3.setAttribute("name", "aff");
            document.getElementById("myform").appendChild(field3);
        }
        //debugger;

        var hotel = "";
        var nombreHotel = "";

        if (jQuery('a.tab.active').hasClass('is--flight')) {
            hotel = "";
            hotel = jQuery("#hotel").val();
            nombreHotel = jQuery("#hotel option:selected").text();

            document.myform.hotel.value = hotel;

        } else {
            hotel = "";
            hotel = jQuery("#hotel2").val();
            nombreHotel = jQuery("#hotel2 option:selected").text();
            document.myform.hotel.value = hotel;
        }

        //			hotel = jQuery( "#hotel option:selected" ).val();
        if (hotel == "") {
            document.getElementById("error").innerHTML = "You must select a hotel.";
            jQuery("#dialog").dialog("open");
            return;
        }

        nombreHotel = nombreHotel.replace(/ /g, '_');

        console.log(nombreHotel);

        if (hotel == '10458') {
            url = 'https://www.reservhotel.com/los-cabos-mexico/' + nombreHotel + '/booking-engine/ibe4.main?hotel=' + hotel;
        } else {
            url = 'https://www.reservhotel.com/palace-resorts/' + nombreHotel + '/booking-engine/ibe4.main?hotel=' + hotel
        }

        jQuery('#myform').attr('action', '');
        jQuery('#myform2').attr('action', '');

        if (jQuery('#isflight').hasClass('active')) {
            jQuery('#myform').attr('action', url);
        } else {
            jQuery('#myform2').attr('action', url);
        }

        //jQuery('#myform').attr('action', url);


        var arrivalDate;
        var departureDate;
        dateformat.value = "YYYY-MM-DD";

        if (jQuery('#isflight').hasClass('active')) {
            arrivalDate = jQuery("#aDate").val();
            departureDate = jQuery("#dDate").val();
        } else {
            arrivalDate = jQuery("#aDate2").val();
            departureDate = jQuery("#aDate2").val();
        }

        //ar hotel = jQuery("select[name=hotel]").val();
        //var arrivalDate = jQuery( "#aDate" ).val();
        //var departureDate = jQuery( "#dDate" ).val();
        var adults = adultosform;
        var childrens = childrenform;
        //var currency = jQuery("select[name=currency]").val();
        var airport = jQuery("#countries option:selected").text();
        //var airline = jQuery("select[name=airline]").val();
        //var fareclass = jQuery("select[name=fareclass]").val();
        //var promoCode = jQuery( "#adults option:selected" ).text();


        dataLayer.push({
            'hotel': hotel,
            'arrivalDate': arrivalDate,
            'departureDate': departureDate,
            'adults': adults,
            'childrens': childrens,
            //'currency': currency,
            'airport': airport
            //'airline': airline,
            //'class': fareclass ,
            //'promoCode': promoCode
        });

        document.myform.submit();
    }
}

var request = null;

function createRequest() {
    try {
        request = new XMLHttpRequest();
    } catch (trymicrosoft) {
        try {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (othermicrosoft) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (failed) {
                request = null;
            }
        }
    }
    if (request == null) {
        alert("Error creating request object!  Your browser does not support AJAX.  Please update it to use this site.")
    };
}

function getAirports() {
    createRequest();
    var url = Drupal.settings.basePath + "sites/all/themes/palace_resort/libraries/smartwidget/html_countries/" + document.getElementById("countries").value + ".html";
    if (request == null) {
        document.write("Asynchronous Request Failed");
    } else {
        request.open("GET", url, true);
        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                //document.getElementById("airport_list").innerHTML=request.responseText;
                jQuery("#airport_list").find('#airport').html(request.responseText).selectpicker('refresh');
            }
        };
        request.send(null);
    }
}

function checkOutDate(e) {


    if (e.hasClass('is--flight')) {

        var dateToday = new Date();
        dateToday.setDate(dateToday.getDate() + 15);

        var dateAir = new Date();
        dateAir.setDate(dateAir.getDate() + 22);


        jQuery('#aDate').datepicker("setDate", dateToday);
        jQuery('#dDate').datepicker("setDate", dateAir);


    } else {
        var dateTodayf = new Date();
        dateTodayf.setDate(dateTodayf.getDate() + 15);

        var datef = new Date();
        datef.setDate(datef.getDate() + 20);

        jQuery('#aDate2').datepicker("setDate", dateTodayf);
        jQuery('#dDate2').datepicker("setDate", datef);
    }
}