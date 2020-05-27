<?php $__env->startSection('content'); ?>
	<div class="row justify-content-center">
		<div class="col-md-12 text-center">
			<span class="display-1 d-block">404</span>
			<div class="mb-4 lead">Oops! Halaman Yang anda cari tidak ada. Silahkan Kembali ke Halaman Sebelumnya!!!</div>
			<a href="<?php echo e(base_url('')); ?>" class="btn btn-link">Kembali</a>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\e-guein\application\views/404.blade.php ENDPATH**/ ?>