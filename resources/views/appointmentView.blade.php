@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">

                @if (Session::has('new_appointment'))

                <p>{{session('new_appointment')}}</p>

                @endif

                <h1>Thank you and see you soon, {{ $appointment->name }}</h1>
                <p>We will remind you 1 day ahead before your inspection.</p>
                <br>
                <h3>Your inspection detail:</h3>
                <table>
                    <tbody>
                        <tr>
                            <td width='100px'>Date</td>
                            <td>: &nbsp;{{ $appointment->date }}</td>
                        </tr>
                        <tr>
                            <td>Slot</td>
                            <td>: &nbsp;{{ $appointment->slot->startTime }}</td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>: &nbsp;{{ $appointment->mobile }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: &nbsp;{{ $appointment->email }}</td>
                        </tr>
                        <tr>
                            <td>Remark</td>
                            <td>: &nbsp;{{ $appointment->remark }}</td>
                        </tr>
                    </tbody>
                </table>

                <br>
                
            </div>
        </div>
    </div>

@endsection