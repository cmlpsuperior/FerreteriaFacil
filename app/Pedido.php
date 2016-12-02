<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table='Pedido';

    protected $primaryKey = 'idPedido';

    public $timestamps=false;

    protected $fillable = [
    	'fechaRegistro',
    	'montoTotal',
    	'montoPagado',
        'estado',
        'direccion',

        'idCliente',
        'idEmpleado',        
    	'idZona'
    ];

    //relaciones con otros modelos:
    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'idEmpleado', 'idEmpleado');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'idCliente', 'idCliente');
    }

    public function zona() //puede ser null
    {
        return $this->belongsTo('App\Zona', 'idZona', 'idZona');
    }

    
    //relaciond e muchos a muchos con articulo:
    public function articulos (){
        return $this->belongsToMany('App\Articulo', 'DetallePedido', 'idPedido', 'idArticulo')
        			->withPivot('cantidad', 'precioUnitario', 'monto');
    }
}
