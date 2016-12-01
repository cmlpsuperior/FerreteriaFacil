<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table='TipoDocumento';

    protected $primaryKey = 'idTipoDocumento';

    public $timestamps=false;

    protected $fillable = [
    	'nombre',
    	'descripcion'
    ];

    //relaciones con otros modelos:
    public function clientes()
    {
        return $this->hasMany('App\Cliente', 'idTipoDocumento', 'idTipoDocumento');
    }

    //relaciones con otros modelos:
    public function empleados()
    {
        return $this->hasMany('App\Empleado', 'idTipoDocumento', 'idTipoDocumento');
    }
}
