<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('profile', compact('profile'));
    }

    public function edit()
    {
        $profile = Profile::first();
        return view('admin.edit', compact('profile'));
    }

    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'bio' => 'required|string',
        'skills' => 'nullable|string',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $profile = Profile::first();

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('profiles', 'public');
        $profile->photo = $photoPath;
    }

    $profile->update([
        'name' => $request->name,
        'bio' => $request->bio,
        'skills' => $request->skills,
    ]);

    return redirect('/admin')->with('success', 'Profil berhasil diperbarui');
}

}
