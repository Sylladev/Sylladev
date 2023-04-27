<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hopital extends Model
{
    protected $table = 'hopital';
     protected $fillable = ['nomHopital','idAddresse','flagtransmis'];
}
