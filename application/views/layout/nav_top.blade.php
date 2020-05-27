
<nav class="navbar navbar-expand-md navbar-light warna_atas">
	<div class="d-flex w-50 order-0">
		<a class="navbar-brand mr-1" href="{{base_url()}}"><strong style=" font-weight: bold;">e-</strong><strong style="color: white; font-weight: 1000;">GueIn</strong></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
	</div>
	<div class="navbar-collapse collapse justify-content-center order-2" id="collapsingNavbar">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="navbar-brand" href="#">
					<img src="{{base_url('assets/images/logo.png')}}" width="30" height="30" alt="">
				</a>
			</li>
		</ul>
	</div>
	<span class="navbar-text small text-truncate mt-1 w-50 text-right order-1 order-md-last">{{date('h:i')}}</span>
</nav>
<br>
<br>

