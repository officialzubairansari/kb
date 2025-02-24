<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function changePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $passwordChanged = $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        if ($passwordChanged){
            return redirect()->route('dashboard.index')->with(
                'success',
                'Password has been changed'
            );

        }
        else
            return redirect()->route('dashboard.index')->with(
                'warning',
                'Old Password wrong.'
            );


    }
}
