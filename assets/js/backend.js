$(document).on('change', '#field-hotel_relation_id', function(evt, params) {
    hotels = $(evt.target).val();
    excludeHotels = jQuery.extend(true, {}, window.hotels_restaurants);
    $(hotels).each(function(){
    	delete excludeHotels[this];
    });

    $("[id^=field_id_alias_chzn_o_]").each(function(){
    	$(this).removeClass("hidden");
    });

    $.each(excludeHotels, function(){
    	$(this).each(function(){
    		$("#field_id_alias_chzn_o_"+window.restaurantsAvailable[this]).addClass("hidden").removeClass("result-selected");
    		$("#field_id_alias_chzn_c_"+window.restaurantsAvailable[this]).remove();
    	})
    	
    });
 });

$(document).ready(function(){
	window.restaurantsAvailable = [];
	i = 0;
    $("#field-id_alias option").each(function(){
    	restaurantsAvailable[$(this).val()] = i++;
    });

    $.ajax({
		url: "/data/hotels_restaurants",
		success: function(data) {
			window.hotels_restaurants = data;
			$('#field-hotel_relation_id').trigger('change');
		}
	});
});