<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $fillable = ['provider_id', 'name', 'description'];
    protected $guarded = ['id'];
    
    public function inventory()
    {
    	return $this->hasMany(Inventory::class);
    }
    public function provider(){

        return $this->belongsTo(Provider::class);
    }
    public function sale(){

        return $this->belongsTo(Sale::class);
    }
}
