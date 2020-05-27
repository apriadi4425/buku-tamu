@extends('layout.root')

@section('content')

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

@endsection

@section('secript')
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
                defaultDate: '{{$tgl}}',
                navLinks: true, // can click day/week names to navigate views

                weekNumbers: true,
                weekNumbersWithinDays: true,
                weekNumberCalculation: 'ISO',

                editable: false,
                eventLimit: false, // allow "more" link when too many events
                events: [
                    @foreach($data as $dt)
                    {
                        title: '{{$dt->asal}}',
                        url: '{{base_url('detil/lihat/'.$dt->id)}}',
                        start: '{{$dt->tanggal}}'
                    },
					@endforeach
                ]
            });

            calendar.render();
        });

	</script>
@endsection
