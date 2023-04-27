<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class medecin extends Model
{
	protected $table = 'medecin';
	public $timestamps = false;
    protected $fillable = ['idMedecin','idSpecialite','idDepartement','nomMedecin','prenomMedecin','genreMedecin','dateDeNaissance','uidMedecin','flagTransmis','photo','idAddresse','statusMatrimonialMedecin'];
}
