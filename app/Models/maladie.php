<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class maladie extends Model
{
	protected $table = 'maladie';
	public $timestamps = false;
     protected $fillable = ['idMaladie','description','flagtransmis'];
}
