<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable=[
        'baslik',
        'category_id',
        'slug',
        'description',
        'stok',
        'price',
        'status',
        'image'
    ];

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }
    public function sluggable(): array
    {
    return [
        'slug' => [
            'source' => 'baslik'
        ]
    ];
    }
}
