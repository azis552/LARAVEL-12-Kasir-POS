<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'sku', 'price', 'stock'];

    public function categori()
    {
        return $this->belongsTo(Categori::class);
    }
}
