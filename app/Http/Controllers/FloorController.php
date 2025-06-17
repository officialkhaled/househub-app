<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Floor;
use App\Models\Building;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view floor', ['only' => ['index']]);
        $this->middleware('permission:create floor', ['only' => ['create', 'store']]);
        $this->middleware('permission:update floor', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete floor', ['only' => ['destroy']]);
    }

    public function index()
    {
        $floors = Floor::with('building')->latest()->get();

        return view('floors.index', [
            'floors' => $floors,
        ]);
    }

    public function create()
    {
        $buildings = Building::where('status', '=', 'active')->latest()->get();

        return view('floors.create', [
            'buildings' => $buildings,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'building_id' => 'required',
            'floor_number' => 'required',
        ], [
            'building_id.required' => 'Building is Required',
            'floor_number.required' => 'Floor Number is Required',
        ]);

        try {
            DB::beginTransaction();

            Floor::create([
                'building_id' => $request->building_id,
                'floor_number' => $request->floor_number,
            ]);

            notyf()->addSuccess('Floor Created Successfully.');

            DB::commit();

            return redirect()->route('floors.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function edit(Floor $floor)
    {
        $buildings = Building::where('status', '=', 'active')->latest()->get();

        return view('floors.edit', [
            'floor' => $floor,
            'buildings' => $buildings,
        ]);
    }

    public function update(Request $request, Floor $floor)
    {
        $request->validate([
            'building_id' => 'required',
            'floor_number' => 'required',
        ], [
            'building_id.required' => 'Building is Required',
            'floor_number.required' => 'Floor Number is Required',
        ]);

        try {
            DB::beginTransaction();

            $floor->update([
                'building_id' => $request->building_id,
                'floor_number' => $request->floor_number,
            ]);

            notyf()->addSuccess('Floor Updated Successfully.');

            DB::commit();

            return redirect()->route('floors.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Floor $floor)
    {
        try {
            DB::beginTransaction();

            $floor->delete();

            notyf()->addSuccess('Floor Deleted Successfully.');

            DB::commit();

            return redirect()->route('floors.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back();
        }
    }
}
