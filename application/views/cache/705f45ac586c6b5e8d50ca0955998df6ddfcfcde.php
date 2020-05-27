<!DOCTYPE html>
<html>
<head>
	<?php echo $__env->make('layout/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
	<?php echo $__env->make('layout/nav_top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="container-fluid">
		<?php echo $__env->make('layout/banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
		<div class="row">
		<?php echo $__env->make('layout/nav_side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="col-md-10">
				<hr class="style-three" width="100%"><br>
					<?php echo $__env->yieldContent('content'); ?>
			</div>
		</div>
		<br>
		<br>
		<?php echo $__env->make('layout/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>

</body>
</html>
<?php /**PATH D:\xampp\htdocs\e-guein\application\views/layout/root.blade.php ENDPATH**/ ?>