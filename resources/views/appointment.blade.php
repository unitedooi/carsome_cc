@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Inspection Booking</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AppointmentController@store']) !!}

        <div class="row mx-auto">
            <div class="col-md-8 col-lg-8"><img src="https://image.freepik.com/free-vector/auto-service-illustration_1284-20618.jpg" width="100%"/></div>
            <div class="col-sm-12 col-md-4 col-lg-4">

                @if (session('error_appointment'))
                <div class="alert alert-danger">
                    {{ session('error_appointment') }}
                </div>
                @endif

                @include('layouts.error')

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'John Doe']) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'eg name@email.com']) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label('mobile', 'Mobile') !!}
                    {!! Form::text('mobile', null, ['class'=>'form-control', 'placeholder'=>'+60123456789']) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label('date', 'Date') !!}
                    {!! Form::text('date', null, ['class'=>'form-control datepicker dynamic', 'data-dependent'=>'slot_id', 'readonly'=>'readonly', 'placeholder'=>'Pick a date']) !!}
                </div>

                <div class="form-group">
                    <label for="slot_id">Slot:</label>
                    <select id="slot_id" name="slot_id" class="form-control">
                    <option value="">Pick a date first</option>
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('remark', 'Remark') !!}
                    {!! Form::textarea('remark', null, ['class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Something you want us to take note ?']) !!}
                </div>

                <div class="form-group form-inline">
                    <input id="needReminder" value='1' name="needReminder" checked type='checkbox' /> <span>I need call reminder</span>
                </div>
            
                <div class="form-group">
                    {!! Form::submit('Submit', ['class'=>'btn btn-dark', 'style'=>'color:white; background-color: black']) !!}
            
                </div>

            </div>
        </div>
    
        
    
    {!! Form::close() !!}

    
</div>

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
$('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        daysOfWeekDisabled: [0],
        autoclose: true,
        startDate: new Date(),
        endDate: new Date(new Date().setDate(new Date().getDate() + 21)),
    }
);
</script>
<script>
    $(document).ready(function(){
        $('.dynamic').on('change',function(){
            //if($(this).val() != ''){
                var date = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('appointment.fetch') }}",
                    method: "POST",
                    data: {date:date, _token:_token,          },
                }).done(function(result){
                    $('#slot_id').html(result);
                });
        });
    });
</script>

@endsection


