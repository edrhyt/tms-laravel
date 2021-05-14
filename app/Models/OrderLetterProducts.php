<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLetterProducts extends Model
{
    use HasFactory;

    protected $table = 'order_letter_products';

    protected $fillable = [
        'order_letter_id',
        'product_id',
        'quantity',
        'subtotal_price'
    ];

    public static function getProductList($orderLetterId) {
        return self::where('order_letter_id', $orderLetterId)
                    ->orderBy('product_id')
                    ->get();
    }
}
