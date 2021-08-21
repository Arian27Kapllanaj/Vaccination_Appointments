@extends('layouts.design')
@section('content')

<h1>Certificate</h1>

@if($info->isEmpty())
<h1>You have not make all the appointment yet</h1>
@else

<p>Certificate ID: {{ $info[0]->id }}</p>
<p>Name: {{ $info[0]->name }}</p>
<p>Surname: {{ $info[0]->surname }}</p>
<p>Date of Birth: {{ $info[0]->birthday }}</p>
<p>Vaccine: {{ $info[0]->vac_name }}</p>
<p>Last shot date: {{ $info[0]->date }}</p>

@endif
@endsection