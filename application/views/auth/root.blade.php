<!DOCTYPE html>
<html>
<head>
	@include('layout/header')
</head>
<body class="hold-transition login-page">
<div class="login-box">
	@yield('content')
	@include('auth/footer')
</div>
	@yield('script')
</body>
</html>
