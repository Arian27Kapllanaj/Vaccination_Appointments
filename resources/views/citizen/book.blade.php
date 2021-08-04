@extends('layouts/design')
<head>
    <title>Make an appointment | Vaccination Appointments</title>
</head>
<h1>Book</h1>

<form action="/citizen/add/appointment" method="POST">
    @csrf
    <label for="vaccination_center">Vaccination Center</label>
    <!-- Later I should make select input, getting vac_center from db-->
    <input id="vaccination_center"  name="vaccination_center" type="text" required>
    <br>
    <label for="vaccination_id">Vaccination</label>
    <!-- Later I should make select input, getting vac from db-->
    <input id="vaccination_id" name="vaccination_id" type="text" required>
    <br>
    <label for="date_of_shot">Date</label>
    <!-- Later I should make select input, getting vac_center from db-->
    <input id="date_of_shot" name="date_of_shot" type="date" required>
    <br>
    <label for="shot_number">Shot number</label>
    <!-- Later I should make select input, getting vac_center from db-->
    <input id="shot_number" name="shot_number" type="number" required>
    <br>
    <button type="submit">Submit</button>
</form>
