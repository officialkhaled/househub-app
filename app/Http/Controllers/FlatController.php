<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Flat;
use App\Models\Floor;
use App\Models\Building;
use Illuminate\Http\Request;

class FlatController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view flat', ['only' => ['index']]);
        $this->middleware('permission:create flat', ['only' => ['create', 'store']]);
        $this->middleware('permission:update flat', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete flat', ['only' => ['destroy']]);
    }

    public function index()
    {
        $flats = Flat::with('floor')->latest()->get();

        return view('flats.index', [
            'flats' => $flats,
        ]);
    }

    public function create()
    {
        $buildings = Building::latest()->get();

        return view('flats.create', [
            'buildings' => $buildings,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'building_id' => 'required',
            'floor_id' => 'required',
            'name' => 'required',
            'number_of_rooms' => 'required',
            'sqft_size' => 'required',
            'rent_fee' => 'required',
        ], [
            'building_id.required' => 'Building is Required',
            'floor_id.required' => 'Floor is Required',
            'name.required' => 'Name is Required',
            'number_of_rooms.required' => 'Number of Rooms is Required',
            'sqft_size.required' => 'SQFT Size is Required',
            'rent_fee.required' => 'Rent Fee is Required',
        ]);

        try {
            DB::beginTransaction();

            Flat::create([
                'building_id' => $request->building_id,
                'floor_id' => $request->floor_id,
                'name' => $request->name,
                'number_of_rooms' => $request->number_of_rooms,
                'sqft_size' => $request->sqft_size,
                'rent_fee' => $request->rent_fee,
                'description' => $request->description,
            ]);

            notyf()->addSuccess('Flat Created Successfully.');

            DB::commit();

            return redirect()->route('flats.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function edit(Flat $flat)
    {
        $buildings = Building::latest()->get();

        return view('flats.edit', [
            'flat' => $flat,
            'buildings' => $buildings,
        ]);
    }

    public function update(Request $request, Flat $flat)
    {
        $request->validate([
            'name' => 'required',
            'number_of_rooms' => 'required',
            'sqft_size' => 'required',
            'rent_fee' => 'required',
        ], [
            'name.required' => 'Name is Required',
            'number_of_rooms.required' => 'Number of Rooms is Required',
            'sqft_size.required' => 'SQFT Size is Required',
            'rent_fee.required' => 'Rent Fee is Required',
        ]);

        try {
            DB::beginTransaction();

            $flat->update([
                'name' => $request->name,
                'number_of_rooms' => $request->number_of_rooms,
                'sqft_size' => $request->sqft_size,
                'rent_fee' => $request->rent_fee,
                'description' => $request->description,
            ]);

            notyf()->addSuccess('Flat Updated Successfully.');

            DB::commit();

            return redirect()->route('flats.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Flat $flat)
    {
        try {
            DB::beginTransaction();

            $flat->delete();

            notyf()->addSuccess('Flat Deleted Successfully.');

            DB::commit();

            return redirect()->route('flats.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back();
        }
    }
}
