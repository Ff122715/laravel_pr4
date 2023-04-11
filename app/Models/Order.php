<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'delivery_point_id',
        'user_id',
        'status_id'
    ];

    protected function dateClassic(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->created_at->format('d.m.Y')
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function info_orders()
    {
        return $this->hasMany(Info_order::class);
    }
}
