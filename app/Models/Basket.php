<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        'count',
        'product_id',
        'user_id'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function getBasket()
    {
        return auth()->user()->baskets();
    }

    public static function getProductById($id)
    {
        return self::getBasket()->where('product_id', $id)->first();
    }

    public function getSummaryAttribute()
    {
        return $this->product->price * $this->count;
    }

    public static function totalPrice()
    {
        return self::getBasket()->get()->pluck('summary')->sum();
    }

    public static function totalCount()
    {
        return self::getBasket()->get()->pluck('count')->sum();
    }
}
