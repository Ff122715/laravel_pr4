<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery_point extends Model
{
    use HasFactory;

    protected $fillable = [
        'address'
    ];

    public $timestamps = false;
}
