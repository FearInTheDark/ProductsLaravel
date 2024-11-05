<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model {
    use HasFactory;

    protected $fillable = ['productName', 'price', 'quantity', 'category_id', 'image'];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
}
