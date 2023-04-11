<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id'
    ];

    public $timestamps = false;

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
