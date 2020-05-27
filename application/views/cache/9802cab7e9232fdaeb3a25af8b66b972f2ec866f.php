<?php $__env->startSection('content'); ?>

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<p class="text1">Form Tambah Buku Tamu Hari ini</p>
			</div>
			<div class="float-right">
				<?php if($data->jenis == '3'): ?> <a class="btn btn-success btn-sm"
					<?php if($informasi == 0): ?>
						href="<?php echo e(base_url('register_informasi/tambah/'.$data->id)); ?>"><i class="fas fa-edit"></i>  Tambah Register Informasi
					<?php else: ?>
						href="<?php echo e(base_url('register_informasi/edit/'.$data->id)); ?>"><i class="fas fa-edit"></i> Lihat Register Informasi
					<?php endif; ?>
				</a>
				<?php endif; ?>

				<a class="btn btn-success btn-sm" href="<?php echo e(base_url('tambah_data/lihat/'.$data->id)); ?>"><i class="fas fa-edit"></i> Edit</a>
				<a class="btn btn-warning btn-sm" href="<?php echo e(base_url()); ?>"><i class="fas fa-undo-alt"></i> Kembali</a>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table class="table">
				<tr>
					<td width="20%">Tanggal Kedatangan</td>
					<td width="5%">:</td>
					<td width="50%"><?php echo e($data->tanggal); ?></td>
				</tr>
				<tr>
					<td width="20%">Asal/Instansi</td>
					<td width="5%">:</td>
					<td width="50%">
						<?php echo e($data->asal); ?>

					</td>
				</tr>
				<tr>
					<td width="20%">Surat Tugas</td>
					<td width="5%">:</td>
					<td width="50%">
						<?php echo e($data->surat_tugas); ?>

					</td>
				</tr>
				<tr>
					<td width="20%">Keperluan Tamu</td>
					<td width="5%">:</td>
					<td width="50%">
						<?php echo e($data->nama); ?>

					</td>
				</tr>
				<tr>
					<td width="20%">Perihal</td>
					<td width="5%">:</td>
					<td width="50%">
						<?php echo e($data->keperluan); ?>

					</td>
				</tr>
			</table>

		</div>
	</div>
	<br>
	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<p class="text1">Daftar Nama Tamu</p>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
				<tr>
					<th width="5%"><p class="text_header_table">No</p></th>
					<th><p class="text_header_table">Nama</p></th>
					<th><p class="text_header_table">Alamat</p></th>
					<th><p class="text_header_table">Pekerjaan</p></th>
					<th><p class="text_header_table">No. Telp</p></th>
					<th width="100px"><p class="text_header_table">Ttd</p></th>
				</tr>
				</thead>
				<tbody id="show_data">
				<?php ($no = 1); ?>
				<?php $__currentLoopData = $tamu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td align="center"><?php echo e($no++); ?></td>
						<td><?php echo e($dt->nama); ?></td>
						<td><?php echo e($dt->alamat); ?></td>
						<td><?php echo e($dt->pekerjaan); ?></td>
						<td align="center"><?php echo e($dt->no_telp); ?></td>
						<td align="center">
							<?php if($dt->ttd == null): ?>
								<a class="btn btn-info btn-sm" href="<?php echo e(base_url('ttd/loading/'.$dt->id)); ?>">TTD</a>
							<?php else: ?>
								<img src="<?php echo e(base_url('assets/ttd/'.$dt->ttd)); ?>" style="width: 100px;">
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</tbody>
			</table>
		</div>
	</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\e-guein\application\views/content/detil/tamu.blade.php ENDPATH**/ ?>