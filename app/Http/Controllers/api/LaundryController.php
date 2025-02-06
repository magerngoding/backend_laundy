<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Laundry;
use Illuminate\Http\Request as HttpRequest;

class LaundryController extends Controller
{
    // Real all semua data table & mix include table user & shop
    function readAll()
    {
        // with tabel user & tabel shop
        $laundries = Laundry::with('user', 'shop')->get();

        return response()->json([
            'data' => $laundries,

        ], 200);
    }

    function whereUserId($id)
    {
        $laundries = Laundry::where('user_id', '=', $id)
            ->with('shop', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        if (count($laundries) > 0) {
            return response()->json([
                'data' => $laundries,
            ], 200);
        } else {
            return response()->json([
                'message' => 'not found',
                'data' => $laundries,
            ], 404);
        }
    }

    function claim(HttpRequest $request)
    {
        $laundry = Laundry::where([
            ['id', '=', $request->id],
            ['claim_code', '=', $request->claim_code],
        ])->first();

        if (!$laundry) {
            return response()->json([
                'message' => 'not found',
            ], 404);
        }

        if ($laundry->user_id != 0) {
            return response()->json([
                'message' => 'laundry has been claimed',
            ], 404);
        }

        $laundry->user_id = $request->user_id;

        $updated = $laundry->save();

        if ($updated) {
            return response()->json([
                'data' => $updated,
            ], 200);
        } else {
            return response()->json([
                'message' => 'can not be updated',
            ], 500);
        }
    }
}
