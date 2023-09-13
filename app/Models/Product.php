<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Review;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'price',
        'stock',
        'discount'
    ];

    public function categories(){

        return $this->belongsTo(Category::class);
    }

    public function reviews(){

        return $this->hasMany(Review::class);
    }

    public function cart()
    {
         return $this->hasMany(Cart::class);
    }

    public function wishlist()
    {
         return $this->hasMany(Wishlist::class);
    }
}
