<?php $__env->startSection('content'); ?>

<div class="card">
	<div class="card-header">
		<div class="float-left">
			<p class="text1">Form Tambah Buku Tamu Hari ini</p>
		</div>
		<div class="float-right">
			<a class="btn btn-warning btn-sm" href="<?php echo e(base_url('detil/lihat/'.$data->id)); ?>"><i class="fas fa-undo-alt"></i> Selesai</a>
			<a class="btn btn-danger btn-sm" href="<?php echo e(base_url('proses/hapus/data/'.$data->id.'/1')); ?>"><i class="fas fa-trash-alt"></i> Hapus Data</a>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<form>
			<input type="hidden" id="id" name="id" value="<?php echo e($data->id); ?>">
			<div class="row">
				<div class="col-md-6">
					<?php echo e(form_kanan_edit('tanggal','Tgl. Tamu','date',$data->tanggal,null,'required')); ?>

					<?php echo e(form_kanan_edit('keperluan','Keperluan Tamu','text',$data->keperluan,null,'required')); ?>

					<div class="form-group row">
						<label for="jenis" class="col-sm-3 col-form-label"><p class="text4">Jenis Tamu</p></label>
						<div class="col-sm-9">
							<select class="form-control" id="jenis" name="jenis" required>
								
								<?php if($data->jenis == null): ?>
									<option value="0">Pilih Status Pihak</option>
								<?php else: ?>
									<option value="<?php echo e($data->jenis); ?>"><?php echo e($data->nama); ?></option>
								<?php endif; ?>
								<?php if($data->jenis != 2): ?><option value="2">Janji Bertemu</option><?php endif; ?>
								<?php if($data->jenis != 3): ?><option value="3">Permintaan Informasi</option><?php endif; ?>
								<?php if($data->jenis != 4): ?><option value="4">Lainnya</option><?php endif; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<?php echo e(form_kiri_edit('asal','Asal Tamu','text',$data->asal, null,'required')); ?>

					<?php echo e(form_kiri_edit('surat_tugas','Surat Tugas','text',$data->surat_tugas,null,null)); ?>

				</div>
			</div>
		</form>
		<div class="row">
			<div class="col-md-6">
				<button class="btn btn-info btn-block" id="simpan_form_tambah_tamu">Simpan</button>
			</div>
			<div class="col-md-6">
				<div id="tombol_tambah_tamu_nama"></div>
			</div>
		</div>

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
					<th width="200px"><p class="text_header_table">Detil</p></th>
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
						<td align="center">
							<a href='javascript:;' class="btn btn-success btn-sm edit_nama_tamu" data="<?php echo e($dt->id); ?>"><i class="fas fa-edit"></i>Edit</a>
							<a href="<?php echo e(base_url('proses/hapus/data_tamu/'.$dt->id.'/'.$data->id)); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>Hapus</a>
						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade bd-example-modal-lg"  id="modal_tambah_nama" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Nama Pngunjung</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form>
							<input type="hidden" name="data_id" id="data_id" value="<?php echo e($data->id); ?>">
							<?php echo e(form_kanan('nama','Nama Tamu','text',null,'required')); ?>

							<?php echo e(form_kanan('alamat','Alamat Tamu','text',null,'required')); ?>

							<?php echo e(form_kanan('pekerjaan','Pekerjaan','text',null,'required')); ?>

							<?php echo e(form_kanan('no_telp','Nomor Telpon','text',null,'required')); ?>

						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="tambahkan_nama_pengunjung">Tambahkan</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-lg" id="edit_nama_tamu_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Nama Pngunjung</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form>
							<input type="hidden" name="id_edit" id="id_edit">
							<?php echo e(form_kanan('nama_edit','Nama Tamu','text',null,'required')); ?>

							<?php echo e(form_kanan('alamat_edit','Alamat Tamu','text',null,'required')); ?>

							<?php echo e(form_kanan('pekerjaan_edit','Pekerjaan','text',null,'required')); ?>

							<?php echo e(form_kanan('no_telp_edit','Nomor Telpon','text',null,'required')); ?>

						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="edit_nama_pengunjung">Ubah</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('kalau_perlu'); ?>
	const id_form_get_tombol = '<?php echo e($data->id); ?>';
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\e-guein\application\views/content/tambah/data.blade.php ENDPATH**/ ?>