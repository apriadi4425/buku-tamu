@extends('layout.root')

@section('content')

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<p class="text1">Form Tambah Buku Tamu Hari ini</p>
			</div>
			<div class="float-right">
				@if($data->jenis == '3') <a class="btn btn-success btn-sm"
					@if($informasi == 0)
						href="{{base_url('register_informasi/tambah/'.$data->id)}}"><i class="fas fa-edit"></i>  Tambah Register Informasi
					@else
						href="{{base_url('register_informasi/edit/'.$data->id)}}"><i class="fas fa-edit"></i> Lihat Register Informasi
					@endif
				</a>
				@endif

				<a class="btn btn-success btn-sm" href="{{base_url('tambah_data/lihat/'.$data->id)}}"><i class="fas fa-edit"></i> Edit</a>
				<a class="btn btn-warning btn-sm" href="{{base_url()}}"><i class="fas fa-undo-alt"></i> Kembali</a>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table class="table">
				<tr>
					<td width="20%">Tanggal Kedatangan</td>
					<td width="5%">:</td>
					<td width="50%">{{$data->tanggal}}</td>
				</tr>
				<tr>
					<td width="20%">Asal/Instansi</td>
					<td width="5%">:</td>
					<td width="50%">
						{{$data->asal}}
					</td>
				</tr>
				<tr>
					<td width="20%">Surat Tugas</td>
					<td width="5%">:</td>
					<td width="50%">
						{{$data->surat_tugas}}
					</td>
				</tr>
				<tr>
					<td width="20%">Keperluan Tamu</td>
					<td width="5%">:</td>
					<td width="50%">
						{{$data->nama}}
					</td>
				</tr>
				<tr>
					<td width="20%">Perihal</td>
					<td width="5%">:</td>
					<td width="50%">
						{{$data->keperluan}}
					</td>
				</tr>
			</table>

		</div>
	</div>
	<br>
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<p class="text1">Daftar Nama Tamu</p>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
				<tr>
					<th width="5%"><p class="text_header_table">No</p></th>
					<th><p class="text_header_table">Nama</p></th>
					<th><p class="text_header_table">Alamat</p></th>
					<th><p class="text_header_table">Pekerjaan</p></th>
					<th><p class="text_header_table">No. Telp</p></th>
					<th width="100px"><p class="text_header_table">Ttd</p></th>
				</tr>
				</thead>
				<tbody id="show_data">
				@php($no = 1)
				@foreach($tamu as $dt)
					<tr>
						<td align="center">{{$no++}}</td>
						<td>{{$dt->nama}}</td>
						<td>{{$dt->alamat}}</td>
						<td>{{$dt->pekerjaan}}</td>
						<td align="center">{{$dt->no_telp}}</td>
						<td align="center">
							@if($dt->ttd == null)
								<a class="btn btn-info btn-sm" href="{{base_url('ttd/loading/'.$dt->id)}}">TTD</a>
							@else
								<img src="{{base_url('assets/ttd/'.$dt->ttd)}}" style="width: 100px;">
							@endif
						</td>
					</tr>
				@endforeach

				</tbody>
			</table>
		</div>
	</div>

@endsection

