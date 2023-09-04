<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'regular_price',
        'sale_price',
        'color',
        'size',
        'image',
        'stock_status'
    ];

    public function Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
