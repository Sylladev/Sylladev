<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class medicament extends Model
{
	protected $table = 'medicament';
	public $timestamps = false;
     protected $fillable = ['idMedicament','idCategorieMedicament','description','flagtransmis'];
}
