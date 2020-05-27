$(document).ready(function(){
	
	tabel_spec('#example','home/datanya',[0,4],['stripe1','stripe2']);
	tabel_spec('#buku_tamu_table','buku_tamu/datanya',[0,1,6]);
	$("#pilih_tanggal").click(function() {
		Swal.fire({
			title: 'Pilih Tanggal Kedatangan',
			html: '<input type="date" name="tanggal" id="tanggal" class="swal2-input">'
		}).then((result) => {
			if (result.value) {
				var tanggal = $("#tanggal").val();
				window.location.href = base_url + 'beranda/' + tanggal;
			} else if (
				/* Read more about handling dismissals below */
				result.dismiss === Swal.DismissReason.cancel
			) {
				swalWithBootstrapButtons.fire(
					'Dibatalkan',
					'Data Tidak Berubah',
					'error'
				)
			}

		});
	});

	$("#pilih_tahun").click(function() {
		Swal.fire({
			title: 'Pilih Tahun',
			input: 'select',
			inputOptions: {
				'2017': '2017',
				'2018': '2018',
				'2019': '2019',
				'2020': '2020',
				'2021': '2021',
				'2022': '2022',
				'2023': '2023',
				'2024': '2024',
			},
		}).then((result) => {
			if (result.value) {
				var tahun = result.value;
				window.location.href = base_url + 'buku_tamu/lihat/' + tahun;
			}
			else if (
				/* Read more about handling dismissals below */
				result.dismiss === Swal.DismissReason.cancel
			) {
				swalWithBootstrapButtons.fire(
					'Dibatalkan',
					'Data Tidak Berubah',
					'error'
				)
			}

		})
	});
	function tabel_spec(id,url,center,strip = null){
		$(id).DataTable({
			"ajax": {
				url : base_url+url+'/'+tgl,
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
			'stripeClasses': strip
		});
	}
	
});
