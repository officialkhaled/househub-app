<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Flat;
use App\Models\Renter;
use Illuminate\Http\Request;
use App\Models\RenterFlatAssign;

class RenterFlatAssignController extends Controller
{
    public function index()
    {
        $renterFlatAssigns = RenterFlatAssign::query()->get();

        return view('renter-flat-assign.index', [
            'renterFlatAssigns' => $renterFlatAssigns,
        ]);
    }

    public function create()
    {
        $renters = Renter::query()
            ->whereDoesntHave('renterFlatAssign', function ($query) {
                $query->whereNull('end_month');
            })
            ->latest()
            ->get();

        $flats = Flat::with(['building', 'floor'])->latest()->get();

        return view('renter-flat-assign.create', [
            'renters' => $renters,
            'flats' => $flats,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'renter_id' => 'required',
            'flat_id' => 'required',
            'start_month' => 'required',
        ], [
            'renter_id.required' => 'Renter is Required',
            'flat_id.required' => 'Flat is Required',
            'start_month.required' => 'Start Month is Required',
        ]);

        try {
            DB::beginTransaction();

            RenterFlatAssign::create([
                'renter_id' => $request->renter_id,
                'flat_id' => $request->flat_id,
                'start_month' => $request->start_month,
            ]);

            notyf()->addSuccess('Renter-Flat Assigned Successfully.');

            DB::commit();

            return redirect()->route('renter-flat-assign.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function edit(RenterFlatAssign $renterFlatAssign)
    {
        return view('renter-flat-assign.edit', [
            'renterFlatAssign' => $renterFlatAssign,
        ]);
    }

    public function update(Request $request, RenterFlatAssign $renterFlatAssign)
    {
        $request->validate([
            'end_month' => 'required',
        ], [
            'end_month.required' => 'End Month is Required',
        ]);

        try {
            DB::beginTransaction();

            $renterFlatAssign->update([
                'end_month' => $request->end_month,
                'status' => 'available',
            ]);

            notyf()->addSuccess('Renter-Flat Updated Successfully.');

            DB::commit();

            return redirect()->route('renter-flat-assign.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function destroy(RenterFlatAssign $renterFlatAssign)
    {
        try {
            DB::beginTransaction();

            $renterFlatAssign->delete();

            notyf()->addSuccess('Renter-Flat Assign Deleted Successfully.');

            DB::commit();

            return redirect()->route('renter-flat-assign.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back();
        }
    }
}
