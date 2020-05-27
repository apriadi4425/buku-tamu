$(document).ready(function(){
       get_tombol_tambah();
        function get_tombol_tambah(){
            var id = id_form_get_tombol;
            $.ajax({
                url: base_url+'proses/cek_tombol',
                type: 'POST',
                dataType: 'JSON',
                data : {id:id},
                success: function (data) {
					if(data == '2'){
                        var html = '';
                        html += '<button class="btn btn-success btn-block" data-toggle="modal" data-target="#modal_tambah_nama"><i class="fas fa-user-plus"></i> Tambah Nama Pengunjung</button>';
                        $("#tombol_tambah_tamu_nama").html(html);
					}
                }
            });
		}

        $("#simpan_form_tambah_tamu").click(function() {

            var id = $("#id").val();
            var tanggal = $("#tanggal").val();
            var keperluan = $("#keperluan").val();
            var jenis = $("#jenis").val();
            var asal = $("#asal").val();
            var surat_tugas = $("#surat_tugas").val();

            $.ajax({
                url: base_url+'proses/edit_data',
                type: 'POST',
                dataType: 'JSON',
                data : {id:id,tanggal:tanggal,keperluan:keperluan,jenis:jenis,asal:asal,surat_tugas:surat_tugas},
                success: function (data) {
					if(data == 'sukses'){
                        Swal.fire({
                            type: 'success',
                            title: 'Success',
                            text: 'Data Berhasil Ditambahkan'
                        });
                        get_tombol_tambah();
					}
                    if(data == 'error2'){
                        Swal.fire({
                            type: 'error',
                            title: 'Error!!!',
                            text: 'Isi Form Kosong Terlebih Dahulu'
                        });
                    }
                }
            });
        });

        $("#tambahkan_nama_pengunjung").click(function() {

            var data_id = $("#data_id").val();
            var nama = $("#nama").val();
            var alamat = $("#alamat").val();
            var pekerjaan = $("#pekerjaan").val();
            var no_telp = $("#no_telp").val();

            $.ajax({
                url: base_url+'proses/tambah_nama_pengunjung',
                type: 'POST',
                dataType: 'JSON',
                data : {data_id:data_id,nama:nama,alamat:alamat,pekerjaan:pekerjaan,no_telp:no_telp},
                success: function (data) {
                    if(data == 'sukses'){
                        location.reload();
                    }else{
                        Swal.fire({
                            type: 'error',
                            title: 'Error!!!',
                            text: 'Isi Nama Terlebih Dahulu'
                        });
					}
                }
            });
        });

        $("#tambah_tamu").click(function() {
            $.ajax({
                url: base_url+'proses/tekan_tambah',
                type: 'ajax',
                dataType: 'JSON',
                success: function (data) {
                   var id_terakhir = data.last_id;
                   window.location.href = base_url+'tambah_data/lihat/'+id_terakhir;
                }
            });
        });
		
		$('#show_data').on('click','.edit_nama_tamu',function() {
		var id = $(this).attr('data');
		$.ajax({
			type : "GET",
			url  : base_url+"proses/get_tamu",
			dataType : "JSON",
			data : {id:id},
			success: function(data){
				$('#edit_nama_tamu_modal').modal('show');
				$('#id_edit').val(data.id);
				$('#nama_edit').val(data.nama);
				$('#alamat_edit').val(data.alamat);
				$('#pekerjaan_edit').val(data.pekerjaan);
				$('#no_telp_edit').val(data.no_telp);
					
			}
		});
		return false;
		});
		
		$("#edit_nama_pengunjung").click(function() {

            var id = $("#id_edit").val();
            var nama = $("#nama_edit").val();
            var alamat = $("#alamat_edit").val();
            var pekerjaan = $("#pekerjaan_edit").val();
            var no_telp = $("#no_telp_edit").val();

            $.ajax({
                url: base_url+'proses/edit_nama_pengunjung',
                type: 'POST',
                dataType: 'JSON',
                data : {id:id,nama:nama,alamat:alamat,pekerjaan:pekerjaan,no_telp:no_telp},
                success: function (data) {
                    if(data == 'sukses'){
                        location.reload();
                    }else{
                        Swal.fire({
                            type: 'error',
                            title: 'Error!!!',
                            text: 'Isi Nama Terlebih Dahulu'
                        });
					}
                }
            });
        });

});
