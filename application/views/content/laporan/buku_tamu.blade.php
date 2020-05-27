@extends('layout.root')

@section('content')

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<p class="text1">Buku Tamu Tahun <span id="pilih_tahun" style="color:dodgerblue;cursor:pointer;">{{$tgl}}</span></p>
			</div>
			<div class="float-right">
				<a href="{{base_url('cetak_buku_tamu/cetak/'.$tgl)}}" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Cetak</a>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table id="buku_tamu_table" class="table table-striped table-bordered" style="width:100%">
				<thead>
				<tr>
					<th width="5%"><p class="text_header_table">No</p></th>
					<th><p class="text_header_table">Tanggal</p></th>
					<th><p class="text_header_table">Nama</p></th>
					<th><p class="text_header_table">Alamat</p></th>
					<th><p class="text_header_table">Surat Tugas</p></th>
					<th><p class="text_header_table">Keperluan</p></th>
					<th><p class="text_header_table">Tanda Tangan</p></th>
				</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>

@endsection

@section('kalau_perlu')
	const id_form_get_tombol = '';
	const tgl = '{{$tgl}}';
@endsection
