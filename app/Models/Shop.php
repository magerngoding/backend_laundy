<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'location',
        'city',
        'delivery',
        'pickup',
        'whatsapp',
        'description',
        'price',
        'rate',
    ];

    // RELASI ke Table laundry dari shop

    // Punya cucian banyak, 1 toko bisa punya banuak cucian (1 to many/HasMany)
    public function laundries()
    {
        return $this->hasMany(Laundry::class);
    }
}
