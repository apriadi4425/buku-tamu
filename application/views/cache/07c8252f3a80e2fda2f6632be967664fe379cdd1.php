<?php $__env->startSection('content'); ?>
<div class="card">
	<div class="card-header">
		<div class="float-left">
			<p class="text1">Sesuaikan Ukuran Tanda Tangan</p>
		</div>

	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div id="outer">
			<div class="jcExample">
				<div class="article">
					<div class="row">
						<div class="col-md-10">
							<form action="<?php echo e(base_url('ttd/do_crop')); ?>" method="post" onsubmit="return checkCoords();">
								<input type="hidden" id="x" name="x" />
								<input type="hidden" id="y" name="y" />
								<input type="hidden" id="w" name="w" />
								<input type="hidden" id="h" name="h" />
								<input type="submit" class="btn btn-info" value="Simpan Gambar" />
							</form>
						</div>
						<div class="col-md-2">
							<a href="<?php echo e(base_url('ttd/ulangi')); ?>" class="btn btn-danger btn-block">Ulangi Tanda Tangan</a>
						</div>
					</div><br><br>
					<img src="<?php echo e(base_url('assets/ttd/'.$file.'.jpg')); ?>" id="cropbox" />

				</div>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\e-guein\application\views/content/ttd/cek.blade.php ENDPATH**/ ?>