<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = "provider";
    protected $fillable = ['name', 'phone_number', 'city'];
    protected $guarded = ['id'];
  
    public function deliveryDetail(){

        return $this->hasMany(DeliveryDetail::class);
    }
    public function inventory(){

        return $this->belongsToMany(Inventory::class);
    }
    public function product(){

        return $this->hasMany(Product::class);
    }
}
