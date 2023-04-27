<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class addresse extends Model
{
	protected $table = 'addresse';
	public $timestamps = false;
    protected $fillable = ['idAddresse','premiereAddresse','idCommune','flagTransmis'];
}
