<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>{{ $role }}</h1>
    @if($role == 'Citizen' || $role == 'Nurse' || $role == 'Admin')
    <h1>Citizen</h1>
    @elseif($role == 'Nurse' || $role == 'Admin')
    <h1>Nurse</h1>
    @else($role == 'Admin')
    <h1>Admin</h1>
    @endif

</body>

</html>