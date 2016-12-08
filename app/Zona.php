<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table='Zona';

    protected $primaryKey = 'idZona';

    public $timestamps=false;

    protected $fillable = [
    	'nombre',
    	'montoFlete'
    ];

    //relaciones con otros modelos:
    public function clientes()    {
        return $this->hasMany('App\Cliente', 'idZona', 'idZona');
    }

    public function pedidos()    {
        return $this->hasMany('App\Pedido', 'idZona', 'idZona');
    }

    //muhcos a muchos
    public function articulos (){
        return $this->belongsToMany('App\Articulo', 'ArticuloXZona', 'idZona', 'idArticulo')
                    ->withPivot('precio');
    }
}
