<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    protected $table='UnidadMedida';

    protected $primaryKey = 'idUnidadMedida';

    public $timestamps=false;

    protected $fillable = [
    	'nombre',
    	'precioBase',
    	'activo'
    ];

    //relaciones con otros modelos:
    public function articulos()
    {
        return $this->hasMany('App\Articulo', 'idUnidadMedida', 'idUnidadMedida');
    }

    
}
