<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Vaccination Appointments</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" type="image/png" href="images/favicon.png" />
</head>

<body>

    <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
        @if($role == 'Citizen' || $role == 'Nurse' || $role == 'Admin')
        <a href="/citizen/book" class="w3-bar-item w3-button">Make an appointment</a>
        <a href="citizen/view/vaccination/date" class="w3-bar-item w3-button">Check vaccination date</a>
        <a href="citizen/certificate" class="w3-bar-item w3-button">View certificate</a>
        @endif
        @if($role == 'Nurse' || $role == 'Admin')
        <a href="/nurse/add/citizen" class="w3-bar-item w3-button">Add Citizen</a>
        <a href="nurse/all/citizens/appointments" class="w3-bar-item w3-button">View all appointments</a>
        @endif
        @if($role == 'Admin')
        <a href="admin/all/scheduled_appointments" class="w3-bar-item w3-button">All Scheduled Appointments</a>
        <a href="admin/all/cancelled" class="w3-bar-item w3-button">View all cancelled appointments</a>
        <a href="admin/all/missed" class="w3-bar-item w3-button">View all missed appointments</a>
        <a href="admin/all/citizens/without/appointments" class="w3-bar-item w3-button">View all citizens without appointments</a>
        <a href="#" class="w3-bar-item w3-button">Manage users</a>
        <a href="#" class="w3-bar-item w3-button">Add a post</a>
        <a href="/admin/add/vaccination/center" class="w3-bar-item w3-button">Add a Vaccination Center</a>
        <a href="/admin/add/vaccine" class="w3-bar-item w3-button">Add a Vaccine</a>
        @endif
        <a href="{{ url('/logout') }}" class="w3-bar-item w3-button">Log out</a>
    </div>

    <div class="w3-main" style="margin-left:200px">
        <div class="w3-teal">
            <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
            <div class="w3-container">
                <h1>Vaccination Appointments</h1>
            </div>
        </div>

        <div class="w3-container">
            
        </div>

    </div>

    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>
</body>

</html>