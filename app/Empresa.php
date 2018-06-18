<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
	protected $fillable=[
		'id',
		'nombre',
		'rubro',
		'correo'
	];
    public function agencia(){
    	return $this->hasMany('App\Agencia');
    }
}


