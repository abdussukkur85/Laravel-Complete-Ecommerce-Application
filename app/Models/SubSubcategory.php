<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubcategory extends Model {
    use HasFactory;
    protected $fillable = ['category_id', 'subcategory_id', 'name', 'slug'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subCategory() {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
