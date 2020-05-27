<!DOCTYPE html>
<html>
<head>
	<?php echo $__env->make('layout/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<?php echo $__env->yieldContent('content'); ?>
	<?php echo $__env->make('auth/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
	<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\FullStack\pindah\buku-elektronik\application\views/auth/root.blade.php ENDPATH**/ ?>