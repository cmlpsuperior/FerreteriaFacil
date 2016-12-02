<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='Users';

    protected $primaryKey = 'id';

    public $timestamps=false;

    protected $fillable = [
    	'name',
    	'usuario',
    	'password'
    ];

    public function empleado()
    {
        return $this->hasOne('App\Empleado', 'idUser', 'idUser');
    }
}
