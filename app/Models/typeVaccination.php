<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeVaccination extends Model
{
   	 protected $table = 'typeVaccination'; 
   	 public $timestamps = false;
     protected $fillable =['idTypeVaccination','type','duree','flagTransmis'];
}
