<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index(Profile $profile)
    {
        $profiles = Profile::latest()->get();
        return view('backend.profile.index', compact('profiles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'image|file|required',
            'logo' => 'image|file|required',
            'name' => 'required',
            'company' => 'required',
            'job' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'url' => 'required',
        ]);

        $validated['slug'] = Str::slug($request->name);

        $image = $request->file('image')->store('hero/' . $validated['slug'] . '/');
        $validated['image'] = $image;

        $logo = $request->file('logo')->store('hero/' . $validated['slug'] . '/');
        $validated['logo'] = $logo;

        Profile::create($validated);

        alert()->success('Create Success');
        return redirect()->route('profile.index');
    }

    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('backend.profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'image' => 'image|file',
            'logo' => 'image|file',
            'name' => 'required',
            'company' => 'required',
            'job' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'url' => 'required',
        ];

        $validated = $request->validate($rules);

        $validated['slug'] = Str::slug($request->name);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('hero/' . $validated['slug'] . '/');
        };
        if ($request->file('logo')) {
            if ($request->oldLogo) {
                Storage::delete($request->oldLogo);
            }
            $validated['logo'] = $request->file('logo')->store('hero/' . $validated['slug'] . '/');
        };

        $profile = Profile::find($id);
        $profile->update($validated);

        alert()->success('Update Success');
        return redirect()->route('profile.index');
    }

    public function destroy(Profile $profile)
    {
        if ($profile->image) {
            Storage::delete($profile->image);
        }
        if ($profile->logo) {
            Storage::delete($profile->logo);
        }

        $profile->delete($profile->id);

        alert()->success('Delete Success');
        return redirect()->route('profile.index');
    }
}
