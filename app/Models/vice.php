<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vice extends Model
{
    protected $table = 'vice'; 
    public $timestamps = false;
    protected $fillable =['idVice','description','flagTransmis'];
}
