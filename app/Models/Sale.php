<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sale";
    protected $fillable = ['inventory_id', 'invoice_id', 'date_sale','product_id','user_id','quantity'];
    protected $guarded = ['id'];

    public function inventory(){

        return $this->belongsTo(Inventory::class);
    }
    public function invoice(){

        return $this->belongsTo(Invoice::class);
    }
    public function product(){

        return $this->hasMany(Product::class);
    }
    public function user(){

        return $this->hasMany(User::class);
    }
    
}
