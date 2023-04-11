<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'product_id',
    ];

    public $timestamps = false;

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
