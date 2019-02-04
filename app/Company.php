<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function relItem(){
        return $this->hasMany('App\Item','company_id','id');
    }
    public function relStockOut(){
        return $this->hasMany('App\StockOut','company_id','id');
    }
}
