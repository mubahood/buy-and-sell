<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }   
    public function category()
    {
        return $this->belongsTo(category::class,"category_id");
    }     

    protected $fillable = [
        'name',
        'user_id',
        'category_id',
        'price',
        'description',
        'slug',
    ];

}
