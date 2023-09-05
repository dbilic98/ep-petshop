<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'kolicina',
        'cijena',
        'order_id',
        'product_id',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
