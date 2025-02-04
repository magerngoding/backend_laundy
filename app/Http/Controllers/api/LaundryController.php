<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    // Real all semua data table
    function readAll()
    {
        $laundries = Laundry::with('user', 'shop')->get();

        return response()->json([
            'data' => $laundries,

        ], 200);
    }
}
