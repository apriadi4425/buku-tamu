$(document).ready(function(){
	$('#show_data1').on('click','.item_hapus',function() {
		var id=$(this).attr('data');
		$.ajax({
			url: base_url+'monitoring/save_ket',
			type: 'post',
			dataType: 'JSON',
			data: {id:id},
			success: function (data) {
				tabel_spec('#m_data_ac_belum','monitoring/datanya/'+pihak+'/'+tahun ,[0,6]);
			}
		});
	});
	get_data();
	tabel_spec('#m_data_ac_belum','monitoring/datanya/'+pihak+'/'+tahun ,[0,6]);
	function get_data(){
		setTimeout(get_data,1000);
		$.getJSON(base_url+'home/get_data/'+tahun,function (data) {
			$('#istri_belum').html('<span class="info-box-number">'+data.istri_belum+'<small> Lembar</small></span>');
			$('#suami_belum').html('<span class="info-box-number">'+data.suami_belum+'<small> Lembar</small></span>');
			$('#salinan').html('<span class="info-box-number">'+data.salinan+'<small> Eksemplar</small></span>');
			$('#jumlah_ac').html('<span class="info-box-number">'+data.jumlah_ac+'<small> Lembar</small></span>');
			$('#belum_pbt').html('<span class="info-box-number">'+data.belum_pbt+'<small> Perkara</small></span>');
			$('#belum_bht').html('<span class="info-box-number">'+data.belum_bht+'<small> Perkara</small></span>');
			$('#sudah_bht').html('<span class="info-box-number">'+data.sudah_bht+'<small> Perkara</small></span>');
			$('#sisa_panjar').html('<span class="info-box-number">'+data.sisa_panjar+'<small> Perkara belum diambil</small></span>');
			$('#pnbp_bulan_ini').html('<span class="info-box-number">'+data.pnbp+'</span>');
			$('#pnbp_hari_ini').html('<span class="info-box-number">'+data.pnbp_hari_ini+'</span>');
			$('#pnbp_tahun_ini').html('<span class="info-box-number">'+data.pnbp_tahun_ini+'</span>');
		});

		$.getJSON(base_url+'data_home/data_request_baru',function (data) {
			var html = '';
			var j;
			html += '<table class="table table-striped table-bordered"><thead><tr><th width="30px">No</th><th>Tgl. Pengambilan</th><th>Nama Pihak</th><th>Jenis Produk</th><th>Ttd</th></tr></thead><tbody>';
			$.each(data,function(i,data){
				var no = i+1;
				html += '<tr><td>'+no+'</td><td>'+data.tanggal_pengambilan+'</td><td>'+data.data_buku.nama_pihak+ ' ('+data.status+')</td><td>';
							var panjang = data.produk.length;
							for(j = 0; j < panjang; j++){
								html += data.produk[j].nama;
								if(data.produk[j].nama != 'Akta Cerai'){
									html += '('+data.produk[j].jumlah_lembar+' Lbr)';
								}
								if(j != panjang - 1){
									html += ' + ';
								}
							}
				html += ' '+data.pnbp+'</td><td width="10%"><img src="'+base_url+'/assets/ttd/'+data.data_buku.ttd+'" width="100%"></td></tr>';
			});
			html += '</tbody></table>';
			$("#tabel_buku_agenda_home").html(html);
		});
	}

	function tabel_spec(id,url,center){
		$(id).DataTable({
			"ajax": {
				url : base_url+url,
				type : 'GET'
			},
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": false,
			"info": true,
			"autoWidth": false,
			"columnDefs": [
				{"className": "dt-center", "targets": center}
			],
			"bDestroy": true,
			'stripeClasses':['stripe1','stripe2']
		});
	}
});
