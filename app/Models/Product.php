<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model {
    use HasFactory;
    protected $guarded = [];

    public function galleryImages() {
        return $this->hasMany(MultiImage::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->hasMany(Tag::class);
    }

    public function sizes() {
        return $this->hasMany(Size::class);
    }

    public function colors() {
        return $this->hasMany(Color::class);
    }
}
