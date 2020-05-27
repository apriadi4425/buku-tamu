<?php
if (!function_exists('base_url')) {
	function base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
		if (isset($_SERVER['HTTP_HOST'])) {
			$http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
			$hostname = $_SERVER['HTTP_HOST'];
			$dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
			$core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
			$core = $core[0];
			$tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
			$end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
			$base_url = sprintf( $tmplt, $http, $hostname, $end );
		}
		else $base_url = 'http://localhost/';
		if ($parse) {
			$base_url = parse_url($base_url);
			if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
		}
		return $base_url;
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	echo base_url();
}
?>

<html>
<head>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<style>
		body#LoginForm{ background-image:url("https://hdwallsource.com/img/2014/9/blur-26347-27038-hd-wallpapers.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px;}

		.form-heading { color:#fff; font-size:23px;}
		.panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
		.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
		.login-form .form-control {
			background: #f7f7f7 none repeat scroll 0 0;
			border: 1px solid #d4d4d4;
			border-radius: 4px;
			font-size: 14px;
			height: 50px;
			line-height: 50px;
		}
		.main-div {
			background: #ffffff none repeat scroll 0 0;
			border-radius: 2px;
			margin: 10px auto 30px;
			max-width: 38%;
			padding: 50px 70px 70px 71px;
		}

		.login-form .form-group {
			margin-bottom:10px;
		}
		.login-form{ text-align:center;}
		.forgot a {
			color: #777777;
			font-size: 14px;
			text-decoration: underline;
		}
		.login-form  .btn.btn-primary {
			background: #f0ad4e none repeat scroll 0 0;
			border-color: #f0ad4e;
			color: #ffffff;
			font-size: 14px;
			width: 100%;
			height: 50px;
			line-height: 50px;
			padding: 0;
		}
		.forgot {
			text-align: left; margin-bottom:30px;
		}
		.botto-text {
			color: #ffffff;
			font-size: 14px;
			margin: auto;
		}
		.login-form .btn.btn-primary.reset {
			background: #ff9900 none repeat scroll 0 0;
		}
		.back { text-align: left; margin-top:10px;}
		.back a {color: #444444; font-size: 13px;text-decoration: none;}

	</style>
</head>
<body id="LoginForm">
<div class="container">
	<h1 class="form-heading">Kendali Produk Pengadilan Agama</h1><br><br>
	<div class="login-form">
		<div class="main-div">
			<div class="panel">
				<h2>Konfigurasi Database</h2>
				<p></p>
			</div>
			<form id="Login">
				<div class="form-group">
					<label>Host</label><input type="text" class="form-control" name="host" placeholder="Host ... localhost">
				</div>
				<div class="form-group">
					<label>User</label>
					<input type="password" class="form-control" id="inputPassword" placeholder="Password">
				</div>
				<div class="forgot">
					<a href="reset.html">Forgot password?</a>
				</div>
				<button type="submit" class="btn btn-primary">Login</button>

			</form>
		</div>
	</div></div></div>


</body>
</html>
