@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 ">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! $calendar->calendar() !!}
                    
                    <h3 style="margin-top: 30px; margin-bottom:20px">Recent Activity</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Slot</th>
                                <th>Customer</th>
                                <th>Reminder</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($appointments)
                                @foreach ($appointments as $appointment)
                                <tr id='{{ $appointment->id }}' >
                                    <td>
                                        {{ $appointment->date }}<br>
                                        {{ $appointment->slot->startTime }}
                                    </td>
                                    <td>
                                        {{ $appointment->name }}<br>
                                        {{ $appointment->mobile }}<br>
                                        {{ $appointment->email }}
                                        @if ($appointment->remark)
                                            <br><span class='text-danger'><b>Remark:</b> {{ $appointment->remark }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $appointment->needReminder }}
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

{!! $calendar->script() !!}

@endsection

