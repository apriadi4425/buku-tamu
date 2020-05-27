$(document).ready(function(){

	$("#datepicker").datepicker( {
		format: "yyyy-mm",
		startView: "months",
		minViewMode: "months"
	});

	$( "#date_ac_sudah").change(function() {
		var data = $("#date_ac_sudah").val();
		window.location = base_url+"akta/"+data;
	});

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

	tabel_spec('#m_data_ac_belum','monitoring/datanya/'+pihak+'/'+tahun ,[0,6]);

	tabel_spec('#m_data_salinan','monitoring_salinan/datanya/'+tahun ,[0,2,4,6]);
	tabel_spec('#perkara_belum_pbt','monitoring_pbt/datanya/'+tahun ,[0,1,4,5]);
	tabel_spec('#perkara_belum_bht','monitoring_bht/datanya/'+tahun ,[0,1]);
	tabel_spec('#ac_sudah_dibuat','monitoring_ac_dibuat/datanya/'+tahun ,[0,1,2,3,4,5,6,7,8,9]);
	tabel_spec('#m_panjar_sisa','monitoring_sisa_panjar/datanya/'+tahun ,[0,3,4,5]);


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
