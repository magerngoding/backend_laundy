<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Real all semua data table
    function readAll()
    {
        $shops = Shop::all();

        return response()->json([
            'data' => $shops,

        ], 200);
    }
}
