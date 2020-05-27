<?php $__env->startSection('content'); ?>

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<p class="text1">Register Informasi</p>
			</div>
			<div class="float-right">
				<a class="btn btn-warning btn-sm" href="<?php echo e(base_url('detil/lihat/'.$data->data_id)); ?>"><i class="fas fa-undo-alt"></i> Kembali</a>

			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<form method="post" action="<?php echo e(base_url('register_informasi/proses_edit')); ?>">
				<div class="row">
					<div class="col-md-6">
						<input type="hidden" name="data_id" id="data_id" value="<?php echo e($data->data_id); ?>">
						<?php echo e(form_kanan_edit3('nomor_pendaftaran','No. Register','text',$data->nomor_pendaftaran)); ?>


							<div class="form-group row">
								<label for="jenis_permohonan" class="col-sm-4 col-form-label"><p class="text4">Jns. Informasi</p></label>
								<div class="col-sm-8">
									<select class="form-control" id="jenis_permohonan" name="jenis_permohonan">

										<?php if($data->jenis_permohonan == null): ?>
											<option value="0">Pilih Jenis Permohonan</option>
										<?php else: ?>
											<option value="<?php echo e($data->jenis_permohonan); ?>"><?php echo e($data->jenis_permohonan); ?></option>
										<?php endif; ?>
										<?php if($data->jenis_permohonan != 'B'): ?><option value="B">B</option><?php endif; ?>
										<?php if($data->jenis_permohonan != 'K'): ?><option value="K">K</option><?php endif; ?>
									</select>
								</div>
							</div>

						<div class="form-group row">
							<label for="instansi" class="col-sm-4 col-form-label"><p class="text4">Instansi</p></label>
							<div class="col-sm-8">
								<select class="form-control" id="instansi" name="instansi">

									<?php if($data->instansi == null): ?>
										<option value="0">Pilih Status Tamu</option>
									<?php else: ?>
										<option value="<?php echo e($data->instansi); ?>"><?php echo e($data->instansi); ?></option>
									<?php endif; ?>
									<?php if($data->instansi != 'ya'): ?><option value="ya">Ya Instansi</option><?php endif; ?>
									<?php if($data->instansi != 'tidak'): ?><option value="tidak">Tidak, Hanya Personal</option><?php endif; ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="keputusan_ppid" class="col-sm-4 col-form-label"><p class="text4">Keputusan PPID</p></label>
							<div class="col-sm-8">
								<select class="form-control" id="keputusan_ppid" name="keputusan_ppid">

									<?php if($data->keputusan_ppid == null): ?>
										<option value="0">Pilih Status Tamu</option>
									<?php else: ?>
										<option value="<?php echo e($data->keputusan_ppid); ?>"><?php echo e($data->keputusan_ppid); ?></option>
									<?php endif; ?>
									<?php if($data->keputusan_ppid != 'diterima'): ?><option value="diterima">Diterima</option><?php endif; ?>
									<?php if($data->keputusan_ppid != 'ditolak'): ?><option value="ditolak">Ditolak</option><?php endif; ?>
								</select>
							</div>
						</div>


						<?php echo e(form_kanan_edit3('tgl_pemberian_jawaban','Tgl. Jwaban','date',$data->tgl_pemberian_jawaban,null,'required')); ?>

					</div>
					<div class="col-md-6">

						<div class="form-group row">
							<div class="col-sm-8">
								<select class="form-control" id="bentuk_informasi" name="bentuk_informasi">

									<?php if($data->bentuk_informasi == null): ?>
										<option value="0">Pilih Bentuk Informasi</option>
									<?php else: ?>
										<option value="<?php echo e($data->bentuk_informasi); ?>"><?php echo e($data->bentuk_informasi); ?></option>
									<?php endif; ?>
									<?php if($data->bentuk_informasi != 'cetak'): ?><option value="cetak">Cetak</option><?php endif; ?>
									<?php if($data->bentuk_informasi != 'elektronik'): ?><option value="elektronik">Elektronik</option><?php endif; ?>
								</select>
							</div>
							<label for="bentuk_informasi" class="col-sm-4 col-form-label"><p class="text4">Bntk Informasi</p></label>
						</div>

						<div class="form-group row">
							<div class="col-sm-8">
								<select class="form-control" id="dokumentasi" name="dokumentasi">

									<?php if($data->dokumentasi == null): ?>
										<option value="0">Apakah sudah di Dokumentasikan</option>
									<?php else: ?>
										<option value="<?php echo e($data->dokumentasi); ?>"><?php echo e($data->dokumentasi); ?></option>
									<?php endif; ?>
									<?php if($data->dokumentasi != 'sudah'): ?><option value="sudah">Sudah</option><?php endif; ?>
									<?php if($data->dokumentasi != 'belum'): ?><option value="belum">Belum</option><?php endif; ?>
								</select>
							</div>
							<label for="dokumentasi" class="col-sm-4 col-form-label"><p class="text4">Dokementasi</p></label>
						</div>

						<?php echo e(form_kiri_edit3('biaya','Biaya Informasi ','number',$data->biaya)); ?>

						<?php echo e(form_kiri_edit3('alasan_ppid','Alasan','text',$data->alasan_ppid)); ?>

						<?php echo e(form_kiri_edit3('tgl_pemberian_informasi','Tgl. Memberi Info','date',$data->tgl_pemberian_informasi,null,'required')); ?>

					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-info btn-block">Simpan</button>
					</div>

				</div>
			</form>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\e-guein\application\views/content/laporan/register_informasi.blade.php ENDPATH**/ ?>