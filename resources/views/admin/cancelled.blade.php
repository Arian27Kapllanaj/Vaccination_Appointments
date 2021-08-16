@extends('layouts.design')
@section('content')

<head>
    <title>All Cancelled Appointments | Admin</title>
    <style>
        .design {
            border: 1px solid black;
        }

        .design p {
            font-size: 26px;
        }
    </style>
</head>

<h1>All cancelled appointments</h1>

@if($all->isEmpty())
<h1>There are not any cancelled appointments</h1>
@else

@foreach($all as $booking)
<div class="design">
    <p>Name: {{ $booking->name }}</p>
    <p>Surname: {{ $booking->surname }}</p>
    <p>Date: {{ $booking->date_of_shot }}</p>
    <p>Time: {{ $booking->time }}</p>
    <p>Vaccination Center: {{ $booking->vac_center_name }}</p>
    <p>Vaccine type: {{ $booking->vac_name }}</p>
    <p>Shot number: {{ $booking->shot_number }}</p>
</div>
<br>
@endforeach

@endif

@endsection