<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='Articulo';

    protected $primaryKey = 'idArticulo';

    public $timestamps=false;

    protected $fillable = [
    	'nombre',
    	'precioBase',
    	'activo',

        'idUnidadMedida'
    ];

    //relaciones con otros modelos:
    public function unidadMedida()
    {
        return $this->belongsTo('App\UnidadMedida', 'idUnidadMedida', 'idUnidadMedida');
    }

    
}
