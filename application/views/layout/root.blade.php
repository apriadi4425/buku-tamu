<!DOCTYPE html>
<html>
<head>
	@include('layout/header')
</head>
<body>
	@include('layout/nav_top')
	<div class="container-fluid">
		@include('layout/banner')
		
		<div class="row">
		@include('layout/nav_side')
			<div class="col-md-10">
				<hr class="style-three" width="100%"><br>
					@yield('content')
			</div>
		</div>
		<br>
		<br>
		@include('layout/footer')
	</div>

</body>
</html>
