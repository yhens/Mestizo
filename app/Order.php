<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product(){
        return $this->belongsTo('App\Product');
    

    }
    protected $fillable=[
    	'nombre',
    	'cionit',
    	'direccion',
    	'fecha',
    	'produc_id',
    	'tipopedido_id',
    	'cantidad'

    ];

}
