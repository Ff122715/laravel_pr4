<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
{
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'user' => $this->user_id,
            'name' => $this->product->name,
            'price' => $this->product->cost,
            'count' => $this->count,
            'summary' => $this->summary,
            'product_id' => $this->product_id
        ];
    }
}
