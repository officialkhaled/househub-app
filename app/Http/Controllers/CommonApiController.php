<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Floor;
use App\Models\Renter;
use Illuminate\Http\Request;
use App\Models\RenterFlatAssign;

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

    public function getRenterFlat(Request $request)
    {
        $flat = RenterFlatAssign::query()
            ->with(['flat'])
            ->when($request->renter_id, function ($query) use ($request) {
                $query->where('id', $request->renter_id);
            })
            ->first();

        return response()->json([
            'data' => $flat,
            'message' => 'success'
        ]);
    }

    public function getAmountToBePaid(Request $request)
    {
        $data = [];

        return response()->json([
            'data' => $data,
            'message' => 'success'
        ]);
    }
}
