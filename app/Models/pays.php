<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pays extends Model
{
	protected $table = 'pays';
	public $timestamps = false;
     protected $fillable = ['idPays','nomPays','flagTransmis'];
}
