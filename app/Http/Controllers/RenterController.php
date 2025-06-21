<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Renter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RenterController extends Controller
{
    public function index()
    {
        $renters = Renter::query()->get();

        return view('renters.index', [
            'renters' => $renters,
        ]);
    }

    public function create()
    {
        return view('renters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:renters',
            'phone' => 'required',
        ], [
            'name.required' => 'Name is Required',
            'name.unique' => 'Name is Already Taken',
            'phone.required' => 'Phone is Required',
        ]);

        try {
            DB::beginTransaction();

            $nidPath = null;

            if ($request->hasFile('nid')) {
                $nidPath = $request->file('nid')->store('uploads/NIDs', 'public');
            }

            Renter::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'nid' => $nidPath,
            ]);

            notyf()->addSuccess('Renter Added Successfully.');

            DB::commit();

            return redirect()->route('renters.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function edit(Renter $renter)
    {
        return view('renters.edit', [
            'renter' => $renter,
        ]);
    }

    public function update(Request $request, Renter $renter)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('renters')->ignore($renter->id),
            ],
            'phone' => 'required',
        ], [
            'name.required' => 'Name is Required',
            'name.unique' => 'Name is Already Taken',
            'phone.required' => 'Phone is Required',
        ]);

        try {
            DB::beginTransaction();

            $nidPath = $renter->nid;

            if ($request->hasFile('nid')) {
                deleteFileIfExists($renter->nid);

                $nidPath = $request->file('nid')->store('uploads/NIDs', 'public');
            }

            $renter->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'nid' => $nidPath,
            ]);

            notyf()->addSuccess('Renter Updated Successfully.');

            DB::commit();

            return redirect()->route('renters.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Renter $renter)
    {
        try {
            DB::beginTransaction();

            $renter->delete();

            notyf()->addSuccess('Renter Deleted Successfully.');

            DB::commit();

            return redirect()->route('renters.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back();
        }
    }
}
