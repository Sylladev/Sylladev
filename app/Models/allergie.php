<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class allergie extends Model
{
	protected $table = 'allergie';
	public $timestamps = false;
     protected $fillable = ['idAllergie','type','description','flagTransmis'];
}
