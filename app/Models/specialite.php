<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialite extends Model
{
   protected $table = 'specialite'; 
   public $timestamps = false;
   protected $fillable =['idSpecialite','description','flagTransmis'];
}
