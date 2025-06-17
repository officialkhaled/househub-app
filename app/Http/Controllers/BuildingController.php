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

    }

    public function edit(Building $building)
    {
        return view('buildings.edit', [
            'building' => $building,
        ]);
    }

    public function update(Request $request, Building $building)
    {

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
