<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;

    protected $fillable = [
        'claim_code',
        'user_id',
        'shop_id',
        'weight',
        'with_pickup',
        'with_delivery',
        'prickup_address',
        'delivery_address',
        'total',
        'description',
        'status',
    ];

    // RELASI TABEL

    // Laundry ini punya user yang mana
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Laundry ini dicuci ditoko mana
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
