<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class commune extends Model
{
	protected $table = 'commune';
	public $timestamps = false;
     protected $fillable = ['idCommune','nomCommune','idRegion','flagtransmis'];
}
