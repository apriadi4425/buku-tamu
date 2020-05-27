$(document).ready(function () {

	$("#data_salinan2").change(function() {
		var salinan = this.value;
		if(salinan == 1){
			$("#salinan_form_no_sipp").html('');
		}
		if(salinan == 2){
			var html = '';
			html += '<div class="form-group row">'+
				'<label for="jumlah_lembar" class="col-sm-3 col-form-label"><p class="text4">Lbr Salput</p></label>'+
				'<div class="col-sm-9">'+
				'<input type="number" class="form-control" id="jumlah_lembar" name="jumlah_lembar" placeholder="Jumlah Lembar Salinan Putusan">'+
				'</div>'+
				'</div>';
			$("#salinan_form_no_sipp").html(html);
		}
		if(salinan == 3){
			var html = '';
			html += '<div class="form-group row">'+
				'<label for="jumlah_lembar" class="col-sm-3 col-form-label"><p class="text4">Lbr Ikrar</p></label>'+
				'<div class="col-sm-9">'+
				'<input type="number" class="form-control" id="jumlah_lembar" name="jumlah_lembar" placeholder="Jumlah Lembar Salinan Penetapan Ikrar">'+
				'</div>'+
				'</div>';
			$("#salinan_form_no_sipp").html(html);
		}
		if(salinan == 4){

			var html = '';
			html += '<div class="form-group row">'+
				'<label for="jumlah_lembar1" class="col-sm-3 col-form-label"><p class="text4">Lbr Salput</p></label>'+
				'<div class="col-sm-9">'+
				'<input type="number" class="form-control" id="jumlah_lembar1" name="jumlah_lembar1" placeholder="Jumlah Lembar Salinan Putusan">'+
				'</div>'+
				'</div>';
			html += '<div class="form-group row">'+
				'<label for="jumlah_lembar2" class="col-sm-3 col-form-label"><p class="text4">Lbr Ikrar</p></label>'+
				'<div class="col-sm-9">'+
				'<input type="number" class="form-control" id="jumlah_lembar2" name="jumlah_lembar2" placeholder="Jumlah Lembar Salinan Penetapan Ikrar">'+
				'</div>'+
				'</div>';
			$("#salinan_form_no_sipp").html(html);
		}
	});

	var table =  $('#cari_data_table').DataTable({
		"lengthChange": false,
		"searching": true,
		"ordering": false,
		"columnDefs": [
			{"className": "dt-center", "targets": [0,1,4,5]}
		],
	});
	$('#search-input').on('keyup', function(){
		table
			.column(1)
			.search(this.value)
			.draw();
	});

	$("#datepicker1").datepicker({
		format: "yyyy",
		startView: "years",
		minViewMode: "years"
	});
	$( "#home_date").change(function() {
		var data = $("#home_date").val();
		window.location = base_url+'cari_data/'+urlnya+"/"+data;
	});

	$('#show_data').on('click','.form_buka',function() {
		var id = $(this).attr('data');
		$.ajax({
			type : "GET",
			url  : base_url+"cari_data/get_perkara",
			dataType : "JSON",
			data : {id:id},
			success: function(data){
				$('#modal_akta').modal('show');
				$("#pengambilan_akta_title_modal").html('<p class="text4">Pengambilan Akta Cerai No : <strong>'+data.nomor_akta_cerai +' ('+data.no_seri_akta_cerai+')</strong></p>');
				$('#perkara_id').val(data.perkara_id);
				$('#tanggal_permintaan').val('');
				$('#status_pihak').val('0');
				$('#nomor_perkara').val(data.nomor_perkara);
				$('#tanggal_putusan').val(data.tanggal_putusan);
				$('#tanggal_bht').val(data.tanggal_bht);
				$('#nomor_akta').val(data.nomor_akta_cerai);
				$('#nomor_seri').val(data.no_seri_akta_cerai);
				$('#jenis_perkara').val(data.jenis_perkara_text);
				$('#tgl_akta_cerai').val(data.tgl_akta_cerai);
				$("#nama_pihak_form").html('');
				$("#data_salinan").val('1');
				$("#salinan_form").html('');

				var pihak1 = data.pihak1_text;
				var pihak2 = data.pihak2_text;
				var jenis =  data.jenis_perkara_text;

				if(jenis == 'Cerai Gugat'){
					var html2 = '';
					html2 += '<div class="form-group row">'+
						'<label for="nama_pemohon" class="col-sm-2 col-form-label"><p class="text4">Status Pihak</p></label>'+
						'<div class="col-sm-10">'+
						'<select class="form-control" id="status_pihak" name="status_pihak" required>'+
						'<option value="0">Pilih Pihak Pengambil</option>'+
						'<option value="2">Penggugat</option>'+
						'<option value="4">Tergugat</option>'+
						'<option value="6">Kuasa Penggugat</option>'+
						'<option value="8">Kuasa Tergugat</option>'+
						'</select>'+
						'</div>'+
						'</div>';
					$("#form_pihak_pilih").html(html2);
				}
				if(jenis == 'Cerai Talak'){
					var html2 = '';
					html2 += '<div class="form-group row">'+
						'<label for="nama_pemohon" class="col-sm-2 col-form-label"><p class="text4">Status Pihak</p></label>'+
						'<div class="col-sm-10">'+
						'<select class="form-control" id="status_pihak" name="status_pihak" required>'+
						'<option value="0">Pilih Pihak Pengambil</option>'+
						'<option value="1">Pemohon</option>'+
						'<option value="3">Termohon</option>'+
						'<option value="5">Kuasa Pemohon</option>'+
						'<option value="7">Kuasa Termohon</option>'+
						'</select>'+
						'</div>'+
						'</div>';
					$("#form_pihak_pilih").html(html2);
				}

				$("#status_pihak").change(function() {
					var pihak = this.value;
					if(pihak == 0){
						$("#nama_pihak_form").html('');
					}
					if(pihak == 1 || pihak == 2){

						if(jenis == 'Cerai Gugat'){
							var status = 'Penggugat';
						}else{
							var status = 'Pemohon';
						}
						var html = '';
						html += '<div class="form-group row">'+
							'<label for="nama_pemohon" class="col-sm-2 col-form-label"><p class="text4">'+status+'</p></label>'+
							'<div class="col-sm-10">'+
							'<input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" value="'+pihak1+'" readonly>'+
							'</div>'+
							'</div>';
						$("#nama_pihak_form").html(html);
					}
					if(pihak == 3 || pihak == 4){
						if(jenis == 'Cerai Gugat'){
							var status = 'Tergugat';
						}else{
							var status = 'Termohon';
						}
						var html = '';
						html += '<div class="form-group row">'+
							'<label for="nama_pemohon" class="col-sm-2 col-form-label"><p class="text4">'+status+'</p></label>'+
							'<div class="col-sm-10">'+
							'<input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" value="'+pihak2+'" readonly>'+
							'</div>'+
							'</div>';
						$("#nama_pihak_form").html(html);
					}
					if(pihak == 5 || pihak == 6){
						if(jenis == 'Cerai Gugat'){
							var status = 'Kuasa Penggugat';
						}else{
							var status = 'Kuasa Pemohon';
						}
						var html = '';
						html += '<div class="form-group row">'+
							'<label for="nama_pemohon" class="col-sm-2 col-form-label"><p class="text4">'+status+'</p></label>'+
							'<div class="col-sm-10">'+
							'<input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" placeholder="Isikan Nama '+status+'">'+
							'</div>'+
							'</div>';
						$("#nama_pihak_form").html(html);
					}
					if(pihak == 7 || pihak == 8){
						if(jenis == 'Cerai Gugat'){
							var status = 'Kuasa Tergugat';
						}else{
							var status = 'Kuasa Termohon';
						}
						var html = '';
						html += '<div class="form-group row">'+
							'<label for="nama_pemohon" class="col-sm-2 col-form-label"><p class="text4">'+status+'</p></label>'+
							'<div class="col-sm-10">'+
							'<input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" placeholder="Isikan Nama '+status+'">'+
							'</div>'+
							'</div>';
						$("#nama_pihak_form").html(html);
					}


				});

				$("#data_salinan").change(function() {
					var salinan = this.value;
					if(salinan == 1){
						$("#salinan_form").html('');
					}
					if(salinan == 2){
						var html = '';
						html += '<div class="form-group row">'+
							'<label for="jumlah_lembar" class="col-sm-2 col-form-label"><p class="text4">Lbr Salput</p></label>'+
							'<div class="col-sm-10">'+
							'<input type="number" class="form-control" id="jumlah_lembar" name="jumlah_lembar" placeholder="Jumlah Lembar Salinan Putusan">'+
							'</div>'+
							'</div>';
						$("#salinan_form").html(html);
					}
					if(salinan == 3){
						var html = '';
						html += '<div class="form-group row">'+
							'<label for="jumlah_lembar" class="col-sm-2 col-form-label"><p class="text4">Lbr Ikrar</p></label>'+
							'<div class="col-sm-10">'+
							'<input type="number" class="form-control" id="jumlah_lembar" name="jumlah_lembar" placeholder="Jumlah Lembar Salinan Penetapan Ikrar">'+
							'</div>'+
							'</div>';
						$("#salinan_form").html(html);
					}
					if(salinan == 4){

						var html = '';
						html += '<div class="form-group row">'+
							'<label for="jumlah_lembar1" class="col-sm-2 col-form-label"><p class="text4">Lbr Salput</p></label>'+
							'<div class="col-sm-10">'+
							'<input type="number" class="form-control" id="jumlah_lembar1" name="jumlah_lembar1" placeholder="Jumlah Lembar Salinan Putusan">'+
							'</div>'+
							'</div>';
						html += '<div class="form-group row">'+
							'<label for="jumlah_lembar2" class="col-sm-2 col-form-label"><p class="text4">Lbr Ikrar</p></label>'+
							'<div class="col-sm-10">'+
							'<input type="number" class="form-control" id="jumlah_lembar2" name="jumlah_lembar2" placeholder="Jumlah Lembar Salinan Penetapan Ikrar">'+
							'</div>'+
							'</div>';
						$("#salinan_form").html(html);
					}
				});
			}
		});
		return false;
	});

});
