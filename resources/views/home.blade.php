@extends('layouts.design')
@section('content')
<head>

    <title>Document</title>
</head>

<body>

    <h1>{{ $role }}</h1>
    @if($role == 'Citizen' || $role == 'Nurse' || $role == 'Admin')
    <h1>Citizen</h1>
    <button><a href="/citizen/book">Make an appointment</a></button>
    @endif
    @if($role == 'Nurse' || $role == 'Admin')
    <h1>Nurse</h1>
    @endif
    @if($role == 'Admin')
    <h1>Admin</h1>
    <button><a href="admin/all/scheduled_appointments">All scheduled appointments</a></button>
    @endif

@endsection