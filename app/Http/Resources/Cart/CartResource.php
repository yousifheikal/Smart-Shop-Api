<?php

namespace App\Http\Resources\Cart;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => $this->user->name,
            'product' => $this->product->name,
            'quantity' => $this->quantity,
            'totalPrice' => round((1- ($this->product->discount / 100)) * ($this->product->price), 2),
            'link' => [
                'productDetails' => route('product.show', $this->product->id)
            ],
        ];
    }
}
