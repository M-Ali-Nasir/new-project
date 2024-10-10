<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variations extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'size',
        'product_id',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function cart()
    {
        return $this->hasOne((Cart::class));
    }


    public function orderDetail()
    {
        return $this->belongsTo((OrderDetail::class));
    }
}
