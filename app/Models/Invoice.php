<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = "invoice";
    protected $fillable = ['user_id', 'invoice_number', 'total_price'];
    protected $guarded = ['id'];

    public function inventory(){

        return $this->belongsToMany(Inventory::class);
    }
    public function sale(){

        return $this->hasMany(Sale::class);
    }
    public function user(){

        return $this->belongsTo(User::class);
    }
}
