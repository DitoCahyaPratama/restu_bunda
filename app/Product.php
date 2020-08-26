<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable=['category_id','name','code','description','price','quantity','image'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
