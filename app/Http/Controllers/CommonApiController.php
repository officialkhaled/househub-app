<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Floor;
use Illuminate\Http\Request;

class CommonApiController extends Controller
{
    public function getFloors(Request $request)
    {
        $floors = Floor::query()
            ->where('building_id', $request->building_id)
            ->latest()
            ->get();

        return response()->json([
            'data' => $floors,
            'message' => 'success'
        ]);
    }

    public function getFlats(Request $request)
    {
        $flats = Flat::query()
            ->where('building_id', $request->building_id)
            ->where('floor_id', $request->floor_id)
            ->latest()
            ->get();

        return response()->json([
            'data' => $flats,
            'message' => 'success'
        ]);
    }
}
