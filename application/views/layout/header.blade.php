
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('judul',$judul)</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Menyisipkan Bootstrap -->
	<link rel="stylesheet" href="{{base_url('assets/plugins/bootstrap/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{base_url('assets/plugins/datatables/dataTables.bootstrap4.css')}}" />
	<link rel="stylesheet" href="{{base_url('assets/plugins/fontawesome-free/css/all.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/plugins/sweetalert2/sweetalert2.min.css')}}">
	<link rel="stylesheet" href="{{base_url('assets/css_custom/style.css')}}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Hepta+Slab&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Domine&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Volkhov&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{base_url('assets/plugins/crop/css/jquery.Jcrop.css')}}" type="text/css" />
	@yield('bantu')
	<link href="{{base_url('assets/plugins/kalender/core/main.css')}}" rel='stylesheet' />
	<link href="{{base_url('assets/plugins/kalender/daygrid/main.css')}}" rel='stylesheet' />
	<link href="{{base_url('assets/plugins/kalender/timegrid/main.css')}}" rel='stylesheet' />
	<link href="{{base_url('assets/plugins/kalender/list/main.css')}}" rel='stylesheet' />
	<link href="{{base_url('assets/plugins/kalender/')}}" rel='stylesheet' />
	<link href="{{base_url('assets/plugins/kalender/')}}" rel='stylesheet' />



	
	<script>
		const base_url = '{{base_url()}}';
		@yield('kalau_perlu')
	</script>

