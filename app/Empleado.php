<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='Empleado';

    protected $primaryKey = 'idEmpleado';

    public $timestamps=false;

    protected $fillable = [
    	'nombres',
    	'apellidoPaterno',
    	'apellidoMaterno',
    	'fechaNacimiento',
    	'numeroDocumento',
        'correo',
        'estado',
        
        'licencia',
        'fechaIngreso',
        'fechaSalida',
        
    	'idCargo',
    	'idTipoDocumento',
    	'idUser'
    ];

    protected $guarded = [
    ];

    //relaciones con otros modelos:
    public function cargo()
    {
        return $this->belongsTo('App\Cargo', 'idCargo', 'idCargo');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo('App\TipoDocumento', 'idTipoDocumento', 'idTipoDocumento');
    }
    
    public function user (){
    	return $this->belongsTo('App\User', 'idUser', 'idUser');
    }

    //many to many
    public function pedidos (){
        return $this->hasMany ('PlanificaMYPE\Pedido', 'idPedido', 'idPedido');
    }

}
