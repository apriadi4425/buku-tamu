<?php $__env->startSection('content'); ?>

	<div class="card">
		<div class="card-header">
			<div class="float-left">
				<p class="text1">Kalender Tamu</p>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div id='calendar'></div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('secript'); ?>
	<script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                defaultDate: '<?php echo e($tgl); ?>',
                navLinks: true, // can click day/week names to navigate views

                weekNumbers: true,
                weekNumbersWithinDays: true,
                weekNumberCalculation: 'ISO',

                editable: false,
                eventLimit: false, // allow "more" link when too many events
                events: [
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {
                        title: '<?php echo e($dt->asal); ?>',
                        url: '<?php echo e(base_url('detil/lihat/'.$dt->id)); ?>',
                        start: '<?php echo e($dt->tanggal); ?>'
                    },
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            });

            calendar.render();
        });

	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.root', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\FullStack\pindah\buku-elektronik\application\views/content/laporan/kalender.blade.php ENDPATH**/ ?>