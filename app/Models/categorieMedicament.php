<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorieMedicament extends Model
{
	protected $table = 'categorieMedicament';
	public $timestamps = false;
     protected $fillable = ['idCategorieMedicament','description','flagtransmis'];
}
