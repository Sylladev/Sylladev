<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departement extends Model
{
	protected $table = 'departement';
	public $timestamps = false;
     protected $fillable = ['idDepartement','description','idHopital','flagTransmis'];
}
