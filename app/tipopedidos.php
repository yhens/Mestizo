<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipopedidos extends Model
{
    public function tipopedidos(){
        return $this->belongsTo('App\Product');
    

    }
    protected $fillable=[

    	'mesanine',
        'parallevar'    	
    	
    ];

}
