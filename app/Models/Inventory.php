<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = "inventory";
    protected $fillable = ['product_id', 'quantity', 'lot_number', 'expiration_date','price'];
    protected $guarded = ['id'];

    public function product()
    {
       
    return $this->belongsTo(Product::class);
    }
    public function deliveryDetail(){

            return $this->hasMany(DeliveryDetail::class);
    }
    public function provider(){

        return $this->belongsToMany(Provider::class);
    }
    public function invoice(){

        return $this->belongsToMany(Invoice::class);
    }
    public function sale(){

        return $this->hasMany(Sale::class);
    }
}
