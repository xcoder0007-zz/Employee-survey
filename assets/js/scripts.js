$(document).on('change', '#restaurant', function(){
	var hotel_id = $('option:selected', this).attr('data-hotel');
	$('#hotel').val(hotel_id);
});

$(document).on("change", "#hotel", function(){
	hotelID = $(this).val();
	if (isNaN(hotelID)) {
		$("#restaurant").val("").children().show();
	} else {
		$("#restaurant").val("").children().show().filter(function(){
		return ($(this).attr("data-hotel") == hotelID || isNaN($(this).attr("data-hotel"))) ? false : true;
	}).hide();
	}
});

function monthView() {
	$(".month-picker").toggle();
	$(".day-picker").toggle();
}

$(document).on("change", "#monthly", function(){
	mode = $(this).val();
		monthView();
});

$("#from").on("dp.change",function (e) {
   $('#to').data("DateTimePicker").setMinDate(e.date);
});

$("#to").on("dp.change",function (e) {
   $('#from').data("DateTimePicker").setMaxDate(e.date);
});

$(document).ready(function(){
	if ($("#monthly").is(":checked")) {
		monthView();
	};

	if (hotel = $("#hotel")) {
		hotelID = hotel.val();
		if (isNaN(hotelID)) {
			$("#restaurant").children().show();
		} else {
			$("#restaurant").children().show().filter(function(){
			return ($(this).attr("data-hotel") == hotelID || isNaN($(this).attr("data-hotel"))) ? false : true;
		}).hide();
		}
	};

	$('.datetime').datetimepicker({
		autoclose: true,
		pickTime: false,

	});

	$('.datemonth').datepicker({
		format: "yyyy-mm",
		viewMode: "months", 
		minViewMode: "months"
	});

	$('.dateyear').datepicker({
		format: "yyyy",
		viewMode: "years", 
		minViewMode: "years"
	});

	$('table.report-view.rowlial').filterTable({filterClass: 'searchable', label: "", placeholder: "search room number"});
});