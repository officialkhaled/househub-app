<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view building', ['only' => ['index']]);
        $this->middleware('permission:create building', ['only' => ['create', 'store']]);
        $this->middleware('permission:update building', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete building', ['only' => ['destroy']]);
    }

    public function index()
    {
        $buildings = Building::latest()->get();

        return view('buildings.index', [
            'buildings' => $buildings,
        ]);
    }

    public function create()
    {
        return view('buildings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'house_number' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Building Name is Required',
            'house_number.required' => 'House Number is Required',
            'address.required' => 'Address is Required',
        ]);

        try {
            DB::beginTransaction();

            Building::create([
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'house_number' => $request->house_number,
                'address' => $request->address,
                'total_floors' => $request->total_floors,
                'description' => $request->description,
            ]);

            notyf()->addSuccess('Building Created Successfully.');

            DB::commit();

            return redirect()->route('buildings.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function edit(Building $building)
    {
        return view('buildings.edit', [
            'building' => $building,
        ]);
    }

    public function update(Request $request, Building $building)
    {
        $request->validate([
            'name' => 'required',
            'house_number' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Building Name is Required',
            'house_number.required' => 'House Number is Required',
            'address.required' => 'Address is Required',
        ]);

        try {
            DB::beginTransaction();

            $building->update([
                'name' => $request->name,
                'house_number' => $request->house_number,
                'address' => $request->address,
                'total_floors' => $request->total_floors,
                'description' => $request->description,
            ]);

            notyf()->addSuccess('Building Updated Successfully.');

            DB::commit();

            return redirect()->route('buildings.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Building $building)
    {
        try {
            DB::beginTransaction();

            $building->delete();

            notyf()->addSuccess('Building Deleted Successfully.');

            DB::commit();

            return redirect()->route('buildings.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back();
        }
    }
}
