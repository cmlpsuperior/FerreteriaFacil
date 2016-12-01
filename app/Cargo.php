<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table='Cargo';

    protected $primaryKey = 'idCargo';

    public $timestamps=false;

    protected $fillable = [
    	'nombre',
    	'descripcion'

    ];

    public function empleados()
    {
        return $this->hasMany('App\Empleados', 'idEmpleado', 'idEmpleado');
    }
}
