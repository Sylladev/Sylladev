<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contactUrgence extends Model
{
	protected $table = 'contactUrgence';
	public $timestamps = false;
     protected $fillable = ['idEmergencyContact','idPersonne','relation','nomRelation','telephoneRelation','flagTransmis'];
}
