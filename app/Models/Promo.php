<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;


    protected $fillable = [
        'image',
        'shop_id',
        'old_price',
        'new_price',
        'description',
    ];

    // RELASI TABEL

    // Laundry ini dicuci ditoko mana apakah ada promo?
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
