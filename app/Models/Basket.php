<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $table = 'basket';

    protected $fillable = [
        'category', 'name', 'price', 'quantity', 'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
