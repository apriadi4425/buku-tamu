$(document).ready(function() {
	$( "#tanggal_pengambilan").change(function() {
		var data = $("#tanggal_pengambilan").val();
		window.location = base_url+urlnya+"/"+data;
	});

});
