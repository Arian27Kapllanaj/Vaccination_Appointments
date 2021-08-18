@extends('layouts.design')
@section('content')

<h1>Add Vaccination Center</h1>

<form method="POST" action="/add/vac_center">
    @csrf
    <br>
    <label for="name">Name: </label>
    <input id="name" name="name" type="text" required>
    <br><br>
    <label for="address">Address: </label>
    <input id="address" name="address" type="text" required>
    <br><br>
    <label for="rooms">Number of Rooms: </label>
    <input id="rooms" name="rooms" type="number" required>
    <br><br>
    <button type="submit">Submit</button>
</form>

@endsection