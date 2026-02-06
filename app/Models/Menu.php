<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = [
        'name',
        'price',
        'image',
        'available',
        'category'
    ];

    protected $casts = [
        'available' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
