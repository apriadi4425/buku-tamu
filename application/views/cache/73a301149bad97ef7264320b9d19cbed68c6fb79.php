<?php $__env->startSection('bantu'); ?>
	<link rel="stylesheet" href="<?php echo e(base_url('assets/dist/css/adminlte.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(base_url('assets/dist/css/custom.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="login-logo">
		<a href="../../index2.html"><b><?php echo e($app); ?></b> <?php echo e($instansi_pendek); ?></a>
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg"><?php echo e($user); ?></p>

			<form id="login_form" class="form"  method="post" enctype="multipart/form-data">
				<div class="input-group mb-3">
					<input type="text" name="username" id="username" class="form-control" placeholder="Username">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" name="password" id="password" class="form-control" placeholder="Password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- /.col -->
					<div class="col-12">
						<button class="btn btn-primary btn-block btn-flat">Log-In</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
		</div>
		<!-- /.login-card-body -->
	</div>
	</div>
	<!-- /.login-box -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script type="text/javascript">
        $(document).ready(function(){
            $("form#login_form").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "<?php echo e(base_url('login/validation_credential')); ?>",
                    type: 'POST',
                    dataType: 'JSON',
                    data: formData,
                    success: function (data) {
                        if(data == 'error1'){
                            alert('Username atau Password Salah')
                        }if(data == 'sukses'){
                            $(location).attr('href', '<?php echo e(base_url('beranda')); ?>');
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        });
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth/root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\e-guein-pps\application\views/auth/login.blade.php ENDPATH**/ ?>