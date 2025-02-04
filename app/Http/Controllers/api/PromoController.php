<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    // Real all semua data table
    function readAll()
    {
        $promos = Promo::with('shop')->get();

        return response()->json([
            'data' => $promos,

        ], 200);
    }
}
