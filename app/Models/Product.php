<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'categories_id', 'name','description','price','slug'
    ];
    

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id','id');
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'categories_id');
    }
}
