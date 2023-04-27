<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorieSigneVitaux extends Model
{
	protected $table = 'categorieSigneVitaux';
	public $timestamps = false;
     protected $fillable = ['idCatSV','description','flagTransmis'];
}
