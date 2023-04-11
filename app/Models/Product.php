<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'count',
        'height',
        'price',
        'description',
        'manufacturer_id'
    ];

    public $timestamps = false;

    // производитель
    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class);
    }

    // изображения товара
    public function images() {
        return $this->hasMany(Image::class);
    }
}
