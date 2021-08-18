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

        #btn {
            width: 100px;
        }

    </style>
</head>
<h1>All Appointments</h1>

@if($all->isEmpty())
<h1>There are not any appointments</h1>
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
    <span>
        <div class="btn">
            <button type="button" class="btn btn-success" id="btn"><a href="/confirm/{{$booking->id}}" class="buttons">Confirmed</a></button>
            <button type="button" class="btn btn-warning" id="btn"><a href="/missed/{{$booking->id}}" class="buttons">Missed</a></button>
            <button type="button" class="btn btn-danger" id="btn"><a href="/cancelled/{{$booking->id}}" class="buttons">Cancelled</a></button>
        </div>
    </span>
</div>
<br>
@endforeach
@endif
@endsection