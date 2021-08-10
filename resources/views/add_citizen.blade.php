@extends('layouts.design')
@section('content')

<head>
    <title>Add Citizen</title>
</head>

<h1>Add Citizen</h1>

<form method="POST" action="/add/citizen">
    @csrf
    <br>
    <label for="name">Name: </label>
    <input id="name" name="name" type="text" required>
    <br><br>
    <label for="surname">Surname: </label>
    <input id="surname" name="surname" type="text" required>
    <br><br>
    <label for="gender">Gender: </label>
    <input id="gender" name="gender" type="text" required>
    <br><br>
    <label for="birthday">Birth of Date: </label>
    <input id="birthday" name="birthday" type="date" required>
    <br><br>
    <label for="profession">Profession: </label>
    <input id="profession" name="profession" type="text" required>
    <br><br>
    <label for="email">Email: </label>
    <input id="email" name="email" type="email" required>
    <br><br>
    <label for="password">Password: </label>
    <input id="password" name="password" type="text" required>
    <br><br>
    <button type="submit">Submit</button>
</form>

@endsection