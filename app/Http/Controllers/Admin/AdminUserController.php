<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.pages.profile.profile');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo_path' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_photo_path')) {
            $image = $request->file('profile_photo_path');

            if ($image->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()->withErrors(['foto_size' => 'Foto yang diupload berukuran lebih dari 2MB.']);
            }

            if ($request->profile_photo_path) {
                Storage::delete('public/profile/' . $user->profile_photo_path);
            }

            $image->storeAs('public/profile', $image->hashName());

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'profile_photo_path' => $image->hashName(),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('profile')->with('status', 'Profil berhasil diupdate');
    }
}
