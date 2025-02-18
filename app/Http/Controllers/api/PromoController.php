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

    function readLimit()
    {
        $promos = Promo::orderBy('created_at', 'desc')
            ->limit(5)
            ->with('shop')
            ->get();

        if (count($promos) > 0) {
            return response()->json([
                'data' => $promos,
            ], 200);
        } else {
            return response()->json([
                'message' => 'not found',
                'data' => $promos,
            ], 404);
        }
    }
}
