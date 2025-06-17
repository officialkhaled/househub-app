<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Flat;
use App\Models\Utility;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view utility', ['only' => ['index']]);
        $this->middleware('permission:create utility', ['only' => ['create', 'store']]);
        $this->middleware('permission:update utility', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete utility', ['only' => ['destroy']]);
    }

    public function index()
    {
        $utilities = Utility::with('flat')->latest()->get();

        return view('utilities.index', [
            'utilities' => $utilities,
        ]);
    }

    public function create()
    {
        $flats = Flat::where('status', '=', 'active')->latest()->get();

        return view('utilities.create', [
            'flats' => $flats,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
        ], [
            'name.required' => 'Name is Required',
            'amount.required' => 'Amount is Required',
        ]);

        try {
            DB::beginTransaction();

            Utility::create([
                'flat_id' => $request->flat_id,
                'name' => $request->name,
                'amount' => $request->amount
            ]);

            notyf()->addSuccess('Utility Created Successfully.');

            DB::commit();

            return redirect()->route('utilities.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function edit(Utility $utility)
    {
        $flats = Flat::where('status', '=', 'active')->latest()->get();

        return view('utilities.edit', [
            'utility' => $utility,
            'flats' => $flats,
        ]);
    }

    public function update(Request $request, Utility $utility)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
        ], [
            'name.required' => 'Name is Required',
            'amount.required' => 'Amount is Required',
        ]);

        try {
            DB::beginTransaction();

            $utility->update([
                'flat_id' => $request->flat_id,
                'name' => $request->name,
                'amount' => $request->amount
            ]);

            notyf()->addSuccess('Utility Updated Successfully.');

            DB::commit();

            return redirect()->route('utilities.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Utility $utility)
    {
        try {
            DB::beginTransaction();

            $utility->delete();

            notyf()->addSuccess('Utility Deleted Successfully.');

            DB::commit();

            return redirect()->route('utilities.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back();
        }
    }
}
