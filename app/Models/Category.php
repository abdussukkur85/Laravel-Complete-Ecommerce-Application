<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;

    protected $fillable = ['name', 'slug', 'icon'];

    public function subCategory() {
        return $this->hasMany(Subcategory::class);
    }

    public function products() {
        return $this->hasMany(Product::class)->where('status', 1)->take(6);
    }

    public function categoryWiseSpecialOfferProducts() {
        return $this->hasMany(Product::class)->where('special_offer', 1)->take(3);
    }

    public function categoryWiseSpecialDeals() {
        return $this->hasMany(Product::class)->where('special_deal', 1)->take(3);
    }
}
