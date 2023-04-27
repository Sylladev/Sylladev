<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class reset extends Model
{
     protected $table = 'reset';	
     protected $fillable = ['id','email','code'];
}
