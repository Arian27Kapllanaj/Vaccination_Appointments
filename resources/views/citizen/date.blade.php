@extends('layouts.design')
@section('content')

<h1>View vaccination date</h1>

@if($date == 0)
<h1>You have not make an appointment yet</h1>
@else
<h1>{{ $date }}</h1>
@endif

@endsection