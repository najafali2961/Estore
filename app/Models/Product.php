<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'category', 'sub_category', 'brand', 'unit', 'sku', 'quantity_description', 'tax', 'discount_type', 'price', 'status', 'product_image',];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category'); // Assuming 'category' is the column name in the 'products' table
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
