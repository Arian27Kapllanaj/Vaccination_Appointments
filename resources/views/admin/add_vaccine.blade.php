@extends('layouts.design')
@section('content')

<h1>Add Vaccinne</h1>

<form method="POST" action="/add/vaccine">
    @csrf
    <br>
    <label for="name">Name: </label>
    <input id="name" name="name" type="text" required>
    <br><br>
    <label for="shots">Number of shots: </label>
    <input id="shots" name="shots" type="number" required>
    <br><br>
    <label for="age">Minimum age: </label>
    <input id="age" name="age" type="number" required>
    <br><br>
    <label for="interval">Interval in days: </label>
    <input id="interval" name="interval" type="number" required>
    <br><br>
    <button type="submit">Submit</button>
</form>

@endsection