<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeExamens extends Model
{
     protected $table = 'typeExamens'; 
     public $timestamps = false;
     protected $fillable =['idTypeExamens','typeExamens','description','flagTransmis'];
}
