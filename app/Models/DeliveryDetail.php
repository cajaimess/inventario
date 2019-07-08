<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryDetail extends Model
{
    public function inventory()
    {
    	return $this->belongsTo(Inventory::class);
    }
    public function provider()
    {
    	return $this->hasMany(Provider::class);
    }

}
