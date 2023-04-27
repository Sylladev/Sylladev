<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class symptome extends Model
{
     protected $table = 'symptome'; 
     public $timestamps = false;
     protected $fillable =['idSymptome','idDepartement','description','flagTransmis'];
} 
