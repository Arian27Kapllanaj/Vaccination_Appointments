@extends('layouts.design')
@section('content')

<style>
    .design {
        border: 1px solid black;
    }

    .design p {
        font-size: 26px;
    }
</style>

<h1>All Citizens without any appointments</h1>

@foreach($all as $citizens)
<div class="design">
    <p>Name: {{ $citizens->name }}</p>
    <p>Surname: {{ $citizens->surname }}</p>
    <p>Date of Birth: {{ $citizens->birthday }}</p>
</div>
@endforeach

@endsection