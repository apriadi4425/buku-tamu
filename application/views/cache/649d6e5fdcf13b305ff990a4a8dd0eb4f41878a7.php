
	
		<div class="col-md-2">
			<hr class="style-three"><br>
			<p class="text1">Administrator</p><br>
			<hr style="margin-bottom: -10px;" class="style-three"><br>
			<?php echo $__env->yieldContent('form_date_pilih'); ?>
			<p class="text2"><i class="fas fa-home"></i> <a href="<?php echo e(base_url()); ?>">Home</a> </p>
			<hr class="style-three"><br>
			<p class="text2"><i class="fas fa-chart-line"></i> Statistik Tamu</p>
			<hr class="style-three"><br>
			<p class="text2"><i class="fas fa-chart-line"></i> <a href="<?php echo e(base_url('kalender/lihat')); ?>">Kalender</a> </p>
			<hr class="style-three"><br>
			<p class="text2"><i class="fas fa-book"></i> <a href="<?php echo e(base_url('buku_tamu/lihat')); ?>">Buku Tamu</a> </p>
			<hr class="style-three"><br>
			<p class="text2"><i class="fas fa-print"></i><a href="<?php echo e(base_url('cetak_register_informasi/cetak/'.$tgl)); ?>">Register Informasi</a> </p>
			<hr class="style-three"><br>
			<p class="text2"><i class="fas fa-print"></i> <a href="<?php echo e(base_url('ttd')); ?>">TTD HP</a></p>
		</div>
		
<?php /**PATH D:\xampp\htdocs\e-guein\application\views/layout/nav_side.blade.php ENDPATH**/ ?>