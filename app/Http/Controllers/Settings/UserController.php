<?php

namespace App\Http\Controllers\Settings;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view user', ['only' => ['index']]);
        $this->middleware('permission:create user', ['only' => ['create', 'store']]);
        $this->middleware('permission:update user', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete user', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users = User::latest()->get();
        return view('role-permission.user.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('role-permission.user.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->syncRoles($request->roles);

            DB::commit();

            notyf()->addSuccess('User Created Successfully.');

            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if (!empty($request->password)) {
                $data += [
                    'password' => Hash::make($request->password),
                ];
            }

            $user->update($data);
            $user->syncRoles($request->roles);

            DB::commit();

            notyf()->addSuccess('User Updated Successfully.');

            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back()->withInput();
        }
    }

    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();

            $user->delete();

            notyf()->addSuccess('User Deleted Successfully.');

            DB::commit();

            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError('Something Went Wrong.');

            return redirect()->back();
        }
    }
}
