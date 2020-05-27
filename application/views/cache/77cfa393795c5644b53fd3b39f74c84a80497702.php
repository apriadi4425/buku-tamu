<html>
<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" />
	<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
</head>
<body>
<br><br>
<div class="container">
	<div class="col-md-12">
		<div class="row justify-content-center">
			<h2 style="margin-left: 0;">Menunggu Selesai Tanda Tangan</h2>
		</div>
		<div class="row justify-content-center">
			<img src="<?php echo e(base_url('assets/ttd/loading.gif')); ?>" width="50%">
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
	    load_terus();
        function load_terus(){
            $.ajax({
                url: '<?php echo e(base_url('ttd/cek_proses_ttd')); ?>',
                dataType: 'JSON',
                success: function (data) {
                    var html='';
                    if(data.status == '1'){
                        window.location.replace("<?php echo e(base_url('tambah_data/cek')); ?>");
                    }
                },
                complete: function () {
                    setTimeout(load_terus, 1000);
                }
            });
        }
	})
</script>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\e-guein\application\views/content/ttd/loading.blade.php ENDPATH**/ ?>