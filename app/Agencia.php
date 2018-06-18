<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
	protected $fillable=[
    	'id',
    	'nombre',
    	'direccion',
    	'telefono'
    	"empresa_id"];

    public function empresa(){    	
    	return $this->belongsTo('App\Empresa');
    }
}
