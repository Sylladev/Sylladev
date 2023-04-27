<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
	protected $table = 'utilisateur';
	public $timestamps = false;
    protected $fillable = ['idUser','idMedecin','username','password','email','flagtransmis','statut'];
}
