<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    public function relCompany(){
        return $this->belongsTo('App\Company','company_id','id');
    }
    public function relCategory(){
        return $this->belongsTo('App\Category','category_id','id');
    }
    public function relItem(){
        return $this->belongsTo('App\Item','item_id','id');
    }
}
