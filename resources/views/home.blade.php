@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    
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
                                <tr>
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
