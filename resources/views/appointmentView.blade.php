@extends('layouts.app')

@section('content')

    @if (Session::has('new_appointment'))

    <p>{{session('new_appointment')}}</p>

    @endif

    <h1>View</h1>

@endsection