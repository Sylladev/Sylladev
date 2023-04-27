<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
	protected $table = 'contact';
	public $timestamps = false;
     protected $fillable = ['idContact','idPersonne','telephoneContact','telephoneUrgence','email','flagtransmis'];
}
