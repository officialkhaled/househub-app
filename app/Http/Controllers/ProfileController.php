<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        try {
            $validated = $request->validated();

            DB::beginTransaction();

            if ($request->hasFile('avatar')) {
                uploadImage($request->file('avatar'), $user, 'images/avatar/');
            }

            $user->fill($validated);

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            $user->phone = $request->phone;

            $user->save();

            DB::commit();

            notyf()->addSuccess('Profile Updated Successfully!');

            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong!');

            return Redirect::route('profile.edit')->with('status', 'profile-not-updated');
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        try {
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current_password'],
            ]);

            $user = $request->user();

            Auth::logout();

            deleteFileIfExists($user->avatar);
            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/');
        } catch (\Throwable $th) {
            return Redirect::back()->withErrors(['password' => '<PASSWORD>']);
        }
    }
}
