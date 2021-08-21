@extends('layouts.design')
@section('content')

<head>
    <title>Make an appointment | Vaccination Appointments</title>
</head>
<h1>Make an appointment</h1>

<form action="/citizen/add/appointment" method="POST">
    @csrf
    <label for="vaccination_center">Vaccination Center</label>
    <select class="form-control" id="vaccination_center" name="vaccination_center" required focus>
        <option value="" disabled selected>Select Vaccination Center</option>
        @foreach($centers as $name)
        <option value={{ $name->id }}>{{ $name->name }}</option>
        @endforeach
    </select>
    <br>
    <p>NOTE: Every Vaccination center has different vaccine type</p>
    <label for="vaccination_id">Vaccination</label>
    <!-- Later on I should show vaccine that are in the specific vac_center-->
    <select class="form-control" id="vaccination_id" name="vaccination_id" required focus>
        <option value="" disabled selected>Select Vaccine type</option>
        @foreach($vaccination as $vac)
        <option value={{ $vac->id }}>{{ $vac->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="date_of_shot">Date</label>
    <input id="date_of_shot" name="date_of_shot" type="date" required>
    <br><br>

    <select class="form-control" id="time" name="time" required focus>
        <option value="" disabled selected>Select Time</option>

        <option value="00:00" selected>00:00</option>
        <option value="00:15" selected>00:15</option>
        <option value="00:30" selected>00:30</option>
        <option value="00:45" selected>00:45</option>
        <option value="01:00" selected>01:00</option>
        <option value="01:15" selected>01:15</option>
        <option value="01:30" selected>01:30</option>
        <option value="01:45" selected>01:45</option>
        <option value="02:00" selected>02:00</option>
        <option value="02:15" selected>02:15</option>
        <option value="02:30" selected>02:30</option>
        <option value="02:45" selected>02:45</option>
        <option value="03:00" selected>03:00</option>
        <option value="03:15" selected>03:15</option>
        <option value="03:30" selected>03:30</option>
        <option value="03:45" selected>03:45</option>
        <option value="04:00" selected>04:00</option>
        <option value="04:15" selected>04:15</option>
        <option value="04:30" selected>04:30</option>
        <option value="04:45" selected>04:45</option>
        <option value="05:00" selected>05:00</option>
        <option value="05:15" selected>05:15</option>
        <option value="05:30" selected>05:30</option>
        <option value="05:45" selected>05:45</option>
        <option value="06:00" selected>06:00</option>
        <option value="06:15" selected>06:15</option>
        <option value="06:30" selected>06:30</option>
        <option value="06:45" selected>06:45</option>
        <option value="07:00" selected>07:00</option>
        <option value="07:15" selected>07:15</option>
        <option value="07:30" selected>07:30</option>
        <option value="07:45" selected>07:45</option>
        <option value="08:00" selected>08:00</option>
        <option value="08:15" selected>08:15</option>
        <option value="08:30" selected>08:30</option>
        <option value="08:45" selected>08:45</option>
        <option value="09:00" selected>09:00</option>
        <option value="09:15" selected>09:15</option>
        <option value="09:30" selected>09:30</option>
        <option value="09:45" selected>09:45</option>
        <option value="10:00" selected>10:00</option>
        <option value="10:15" selected>10:15</option>
        <option value="10:30" selected>10:30</option>
        <option value="10:45" selected>10:45</option>
        <option value="11:00" selected>11:00</option>
        <option value="11:15" selected>11:15</option>
        <option value="11:30" selected>11:30</option>
        <option value="11:45" selected>11:45</option>
        <option value="12:00" selected>12:00</option>
        <option value="12:15" selected>12:15</option>
        <option value="12:30" selected>12:30</option>
        <option value="12:45" selected>12:45</option>
        <option value="13:00" selected>13:00</option>
        <option value="13:15" selected>13:15</option>
        <option value="13:30" selected>13:30</option>
        <option value="13:45" selected>13:45</option>
        <option value="14:00" selected>14:00</option>
        <option value="14:15" selected>14:15</option>
        <option value="14:30" selected>14:30</option>
        <option value="14:45" selected>14:45</option>
        <option value="15:00" selected>15:00</option>
        <option value="15:15" selected>15:15</option>
        <option value="15:30" selected>15:30</option>
        <option value="15:45" selected>15:45</option>
        <option value="16:00" selected>16:00</option>
        <option value="16:15" selected>16:15</option>
        <option value="16:30" selected>16:30</option>
        <option value="16:45" selected>16:45</option>
        <option value="17:00" selected>17:00</option>
        <option value="17:15" selected>17:15</option>
        <option value="17:30" selected>17:30</option>
        <option value="17:45" selected>17:45</option>
        <option value="18:00" selected>18:00</option>
        <option value="18:15" selected>18:15</option>
        <option value="18:30" selected>18:30</option>
        <option value="18:45" selected>18:45</option>
        <option value="19:00" selected>19:00</option>
        <option value="19:15" selected>19:15</option>
        <option value="19:30" selected>19:30</option>
        <option value="19:45" selected>19:45</option>
        <option value="20:00" selected>20:00</option>
        <option value="20:15" selected>20:15</option>
        <option value="20:30" selected>20:30</option>
        <option value="20:45" selected>20:45</option>
        <option value="21:00" selected>21:00</option>
        <option value="21:15" selected>21:15</option>
        <option value="21:30" selected>21:30</option>
        <option value="21:45" selected>21:45</option>
        <option value="22:00" selected>22:00</option>
        <option value="22:15" selected>22:15</option>
        <option value="22:30" selected>22:30</option>
        <option value="22:45" selected>22:45</option>
        <option value="23:00" selected>23:00</option>
        <option value="23:15" selected>23:15</option>
        <option value="23:30" selected>23:30</option>
        <option value="23:45" selected>23:45</option>
    </select>

    <label for="shot_number">Shot number</label>
    <!-- Later I should make select input, getting vac_center from db-->
    <select class="form-control" id="shot_number" name="shot_number" required focus>
        <option value="" disabled selected>Shot number</option>
        <option value="1" selected>1</option>
        <option value="2" selected>2</option>
    </select>
    <br>
    <button type="submit">Submit</button>
</form>

@endsection