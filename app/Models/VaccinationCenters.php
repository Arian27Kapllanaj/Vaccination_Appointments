<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationCenters extends Model
{
    use HasFactory;

    protected $table = 'vaccination_center';
    public $timestamps = false;
}
