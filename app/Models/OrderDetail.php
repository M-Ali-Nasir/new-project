<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'billing_first_name',
        'billing_last_name',
        'billing_email',
        'billing_mobile_no',
        'billing_address',
        'billing_country',
        'billing_state',
        'billing_city',
        'billing_zip_code',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_mobile_no',
        'shipping_address',
        'shipping_country',
        'shipping_state',
        'shipping_city',
        'shipping_zip_code',
        'product_id',
        'price',
        'quantity',
        'return_date',
        'variation_id',
    ];

    /**
     * Get the order associated with the order details.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function variation()
    {
        return $this->hasOne(Variations::class);
    }
}
