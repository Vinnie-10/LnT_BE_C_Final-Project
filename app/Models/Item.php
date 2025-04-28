<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'invoice_id', 'category', 'name', 'price', 'quantity', 'subtotal'
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
