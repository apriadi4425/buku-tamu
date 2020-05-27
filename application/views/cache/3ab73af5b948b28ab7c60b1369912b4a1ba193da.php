<?php $__env->startSection('content'); ?>

<div class="card">
				<div class="card-header">
					<div class="float-left">
						<p class="text1">Daftar Tamu <span id="pilih_tanggal" style="color:dodgerblue;cursor:pointer;"> <?php if($tgl == date('Y-m-d')): ?> Hari Ini <?php else: ?> Tanggal <?php echo e(tanggal_indonesia($tgl)); ?> <?php endif; ?> </span></p>
					</div>
					<div class="float-right">
						<button class="btn btn-outline-primary btn-sm" id="tambah_tamu"><i class="fas fa-plus-square"></i> Tambah Tamu</button>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
						<tr>
							<th width="5%"><p class="text_header_table">No</p></th>
							<th><p class="text_header_table">Nama</p></th>
							<th><p class="text_header_table">Keperluan</p></th>
							<th><p class="text_header_table">Instansi</p></th>
							<th width="10%"><p class="text_header_table">Detil</p></th>
						</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('kalau_perlu'); ?>

	const id_form_get_tombol = '';
	const tgl = '<?php echo e($tgl); ?>';

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\FullStack\pindah\buku-elektronik\application\views/content/home.blade.php ENDPATH**/ ?>