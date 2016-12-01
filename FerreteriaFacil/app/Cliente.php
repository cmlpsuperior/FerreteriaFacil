<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='Cliente';

    protected $primaryKey = 'idCliente';

    public $timestamps=false;

    protected $fillable = [
    	'nombres',
    	'apellidoPaterno',
    	'apellidoMaterno',
        'numeroDocumento',
        'fechaNacimiento',
        'genero',

    	'telefono',
    	'correo',
    	'direccion',
        'referencia',
        
    	'idTipoDocumento',
    	'idZona'
    ];

    protected $guarded = [
    ];


    //relaciones con otros modelos:
    public function zona()
    {
        return $this->belongsTo('App\Zona', 'idZona', 'idZona');
    }

    /*
    public function pedidos()
    {
        return $this->hasMany ('App\Pedido', 'idCliente', 'idCliente');
    }
    */
}
