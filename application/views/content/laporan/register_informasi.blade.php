@extends('layout.root')

@section('content')

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<p class="text1">Register Informasi</p>
			</div>
			<div class="float-right">
				<a class="btn btn-warning btn-sm" href="{{base_url('detil/lihat/'.$data->data_id)}}"><i class="fas fa-undo-alt"></i> Kembali</a>

			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<form method="post" action="{{base_url('register_informasi/proses_edit')}}">
				<div class="row">
					<div class="col-md-6">
						<input type="hidden" name="data_id" id="data_id" value="{{$data->data_id}}">
						{{form_kanan_edit3('nomor_pendaftaran','No. Register','text',$data->nomor_pendaftaran)}}

							<div class="form-group row">
								<label for="jenis_permohonan" class="col-sm-4 col-form-label"><p class="text4">Jns. Informasi</p></label>
								<div class="col-sm-8">
									<select class="form-control" id="jenis_permohonan" name="jenis_permohonan">

										@if($data->jenis_permohonan == null)
											<option value="0">Pilih Jenis Permohonan</option>
										@else
											<option value="{{$data->jenis_permohonan}}">{{$data->jenis_permohonan}}</option>
										@endif
										@if($data->jenis_permohonan != 'B')<option value="B">B</option>@endif
										@if($data->jenis_permohonan != 'K')<option value="K">K</option>@endif
									</select>
								</div>
							</div>

						<div class="form-group row">
							<label for="instansi" class="col-sm-4 col-form-label"><p class="text4">Instansi</p></label>
							<div class="col-sm-8">
								<select class="form-control" id="instansi" name="instansi">

									@if($data->instansi == null)
										<option value="0">Pilih Status Tamu</option>
									@else
										<option value="{{$data->instansi}}">{{$data->instansi}}</option>
									@endif
									@if($data->instansi != 'ya')<option value="ya">Ya Instansi</option>@endif
									@if($data->instansi != 'tidak')<option value="tidak">Tidak, Hanya Personal</option>@endif
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="keputusan_ppid" class="col-sm-4 col-form-label"><p class="text4">Keputusan PPID</p></label>
							<div class="col-sm-8">
								<select class="form-control" id="keputusan_ppid" name="keputusan_ppid">

									@if($data->keputusan_ppid == null)
										<option value="0">Pilih Status Tamu</option>
									@else
										<option value="{{$data->keputusan_ppid}}">{{$data->keputusan_ppid}}</option>
									@endif
									@if($data->keputusan_ppid != 'diterima')<option value="diterima">Diterima</option>@endif
									@if($data->keputusan_ppid != 'ditolak')<option value="ditolak">Ditolak</option>@endif
								</select>
							</div>
						</div>


						{{form_kanan_edit3('tgl_pemberian_jawaban','Tgl. Jwaban','date',$data->tgl_pemberian_jawaban,null,'required')}}
					</div>
					<div class="col-md-6">

						<div class="form-group row">
							<div class="col-sm-8">
								<select class="form-control" id="bentuk_informasi" name="bentuk_informasi">

									@if($data->bentuk_informasi == null)
										<option value="0">Pilih Bentuk Informasi</option>
									@else
										<option value="{{$data->bentuk_informasi}}">{{$data->bentuk_informasi}}</option>
									@endif
									@if($data->bentuk_informasi != 'cetak')<option value="cetak">Cetak</option>@endif
									@if($data->bentuk_informasi != 'elektronik')<option value="elektronik">Elektronik</option>@endif
								</select>
							</div>
							<label for="bentuk_informasi" class="col-sm-4 col-form-label"><p class="text4">Bntk Informasi</p></label>
						</div>

						<div class="form-group row">
							<div class="col-sm-8">
								<select class="form-control" id="dokumentasi" name="dokumentasi">

									@if($data->dokumentasi == null)
										<option value="0">Apakah sudah di Dokumentasikan</option>
									@else
										<option value="{{$data->dokumentasi}}">{{$data->dokumentasi}}</option>
									@endif
									@if($data->dokumentasi != 'sudah')<option value="sudah">Sudah</option>@endif
									@if($data->dokumentasi != 'belum')<option value="belum">Belum</option>@endif
								</select>
							</div>
							<label for="dokumentasi" class="col-sm-4 col-form-label"><p class="text4">Dokementasi</p></label>
						</div>

						{{form_kiri_edit3('biaya','Biaya Informasi ','number',$data->biaya)}}
						{{form_kiri_edit3('alasan_ppid','Alasan','text',$data->alasan_ppid)}}
						{{form_kiri_edit3('tgl_pemberian_informasi','Tgl. Memberi Info','date',$data->tgl_pemberian_informasi,null,'required')}}
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-info btn-block">Simpan</button>
					</div>

				</div>
			</form>
		</div>
	</div>

@endsection
