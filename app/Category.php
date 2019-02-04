<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function relItem(){
        return $this->hasMany('App\Item','category_id','id');
    }
    public function relStockOut(){
        return $this->hasMany('App\StockOut','category_id','id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
