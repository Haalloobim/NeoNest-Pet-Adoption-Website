<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'category',
        'species',
        'image_path',
        'seller_id',
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
