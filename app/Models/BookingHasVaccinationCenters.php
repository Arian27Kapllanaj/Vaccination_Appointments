<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingHasVaccinationCenters extends Model
{
    use HasFactory;

    protected $table = 'booking_has_vaccination_center';

    public $timestamps = false;
}
