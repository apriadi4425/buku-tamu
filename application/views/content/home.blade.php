@extends('layout.root')

@section('content')

<div class="card">
				<div class="card-header">
					<div class="float-left">
						<p class="text1">Daftar Tamu <span id="pilih_tanggal" style="color:dodgerblue;cursor:pointer;"> @if($tgl == date('Y-m-d')) Hari Ini @else Tanggal {{tanggal_indonesia($tgl)}} @endif </span></p>
					</div>
					<div class="float-right">
						<button class="btn btn-outline-primary btn-sm" id="tambah_tamu"><i class="fas fa-plus-square"></i> Tambah Tamu</button>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
						<tr>
							<th width="5%"><p class="text_header_table">No</p></th>
							<th><p class="text_header_table">Nama</p></th>
							<th><p class="text_header_table">Keperluan</p></th>
							<th><p class="text_header_table">Instansi</p></th>
							<th width="10%"><p class="text_header_table">Detil</p></th>
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

