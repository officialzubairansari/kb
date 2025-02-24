<?php

namespace App\Http\Controllers\Backend;

use App\Models\Author;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Faq;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list users', ['only' => ['list']]);
    }

    public function list()
    {
        $title = 'List Users';
        $users = User::paginate();
        $roles = Role::all();

        return view('backend/users/list', compact('title', 'users', 'roles'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'user_name'     => 'required|string|max:255|unique:users,user_name',
            'contact_no'    => 'required|string|max:255',
            'email'         => 'required|string|max:255',
            'password'      => 'required|string|max:255',
            'role'          => 'required',
        ]);

        $user = user::create([
            'name' => $validatedData['name'],
            'user_name' => $validatedData['user_name'],
            'contact_no' => $validatedData['contact_no'],
            'user_type' => 'general',
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'profile' => '1',

        ]);

        if ($user) {
            $user->assignRole([$validatedData['role']]);

            return redirect()->route('users.list')->with(
                'success',
                'New user has been added.'
            );
        } else {
            return redirect()->route('users.list')->with(
                'warning',
                'Failed to add a new user.'
            );
        }
    }

    public function delete(Request $request)
    {
        User::where('id', $request->user_id)
            ->update(['is_deleted' => 1]);

        return redirect()->route('users.list')->with(
            'success',
            'User has been deleted.'
        );
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'contact_no' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'nullable|string|max:255',
        ]);

        $user = User::find($request->user_id);
        $user->name = $validatedData['name'];
        $user->contact_no = $validatedData['contact_no'];
        $user->email = $validatedData['email'];
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
        if ($user->save()) {
            return redirect()->route('users.list')->with(
                'success',
                'User has been updated.'
            );
        } else {
            return redirect()->route('users.list')->with(
                'warning',
                'Failed to update user.'
            );
        }
    }


    public function checkUserName(Request $request)
    {
        $user = User::where('user_name', $request->user_name)->get();

        if (count($user) > 0) {
            return false;
        } else {
            return true;
        }
    }
}
