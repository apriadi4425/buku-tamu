@extends('layout.root')

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-12 text-center">
			<span class="display-1 d-block">404</span>
			<div class="mb-4 lead">Oops! Halaman Yang anda cari tidak ada. Silahkan Kembali ke Halaman Sebelumnya!!!</div>
			<a href="{{base_url('')}}" class="btn btn-link">Kembali</a>
		</div>
	</div>
@endsection
