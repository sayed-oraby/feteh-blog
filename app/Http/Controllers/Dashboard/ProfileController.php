<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::user()->Profile;

        return view('dashboard.profiles.index', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = Auth::user()->Profile->id;

        return view('dashboard.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        $profile = Auth::user()->Profile;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            Storage::disk('uploads')->delete($profile->getRawOriginal('photo'));

            $photo_path = $file->store('avatare', 'uploads');

            $request->merge([
                'photo' => $photo_path,
            ]);
        }

        $profile->update($request->all());

        $profile->user->update($request->all());

        return redirect()->route('profile.index')->with('success', 'the profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
