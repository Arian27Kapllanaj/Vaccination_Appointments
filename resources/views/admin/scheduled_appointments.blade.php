@extends('layouts.design')
@section('content')

<head>
    <title>All scheduled appointments</title>

    <style>
        .design {
            border: 1px solid black;
        }

        .design p {
            font-size: 26px;
        }
    </style>
</head>
<h1>Scheduled Appointments</h1>

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
@endsection