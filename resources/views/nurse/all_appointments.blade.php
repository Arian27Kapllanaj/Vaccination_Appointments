@extends('layouts.design')
@section('content')

<head>
    <title>Nurse | All Appointments</title>
    <style>
        .design {
            border: 1px solid black;
        }

        .design p {
            font-size: 26px;
        }

        .buttons {
            text-decoration: none;
            color: white;
        }

        .buttons:hover {
            text-decoration: none;
            color: black;
        }

    </style>
</head>
<h1>All Appointments</h1>

@foreach($all as $booking)
<div class="design">
    <p>Name: {{ $booking->name }}</p>
    <p>Surname: {{ $booking->surname }}</p>
    <p>Date: {{ $booking->date_of_shot }}</p>
    <p>Time: {{ $booking->time }}</p>
    <p>Vaccination Center: {{ $booking->vac_center_name }}</p>
    <p>Vaccine type: {{ $booking->vac_name }}</p>
    <p>Shot number: {{ $booking->shot_number }}</p>
    <span>
        <div class="btn">
            <button type="button" class="btn btn-success"><a href="" class="buttons">Confirmed</a></button>
            <button type="button" class="btn btn-warning"><a href="" class="buttons">Missed</a></button>
            <button type="button" class="btn btn-danger"><a href="" class="buttons">Cancelled</a></button>
        </div>
    </span>
</div>
<br>
@endforeach

@endsection