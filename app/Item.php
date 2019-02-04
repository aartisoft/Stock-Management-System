<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function relCompany(){
        return $this->belongsTo('App\Company','company_id','id');
    }
    public function relCategory(){
        return $this->belongsTo('App\Category','category_id','id');
    }
    public function relStockOut(){
        return $this->hasMany('App\StockOut','item_id','id');
    }
}
