<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller {
    public function show() {
        $admin = Admin::find(1);
        return view('backend.profile.show-profile', compact('admin'));
    }

    public function edit() {
        $admin = Admin::find(1);
        return view('backend.profile.edit-profile', compact('admin'));
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_image' => 'image',
        ], [
            'name.required' => 'Admin user name field is require'
        ]);

        $admin = Admin::find(1);
        $admin->name = $request->name;
        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/backend/profile'), $filename);

            $admin->avatar = $filename;
        }
        $admin->update();
        return redirect()->route('admin.show_profile')->with(['message' => 'Profile Updated Successfully', 'alert-type' => 'success']);
    }

    public function changePassword() {

        return view('backend.profile.edit-password');
    }

    public function changePasswordUpdate(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ], [
            'password.required' => 'The new password field is required.'
        ]);

        $hashed_password = Admin::find(1)->password;
        if (Hash::check($request->current_password, $hashed_password)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->update();
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->with('message', 'Password changed Successfully! Log in again.');
        } else {
            return redirect()->back()->with(['message' => 'Password doesn\'t match with our records.', 'alert-type' => 'error']);
        }
    }
}
