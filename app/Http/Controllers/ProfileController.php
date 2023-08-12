<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\SystemSettings;
=======
>>>>>>> origin/master
use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
<<<<<<< HEAD
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $setting = SystemSettings::first();

        return view('profile.edit', [
            'user' => $request->user(),
            'setting' => $setting,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
=======
>>>>>>> origin/master
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function index1()
=======
    public function index()
>>>>>>> origin/master
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function create1()
=======
    public function create()
>>>>>>> origin/master
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function store1(StoreProfileRequest $request)
=======
    public function store(StoreProfileRequest $request)
>>>>>>> origin/master
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function show1(Profile $profile)
=======
    public function show(Profile $profile)
>>>>>>> origin/master
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function edit1(Profile $profile)
=======
    public function edit(Profile $profile)
>>>>>>> origin/master
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update1(UpdateProfileRequest $request, Profile $profile)
=======
    public function update(UpdateProfileRequest $request, Profile $profile)
>>>>>>> origin/master
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function destroy1(Profile $profile)
=======
    public function destroy(Profile $profile)
>>>>>>> origin/master
    {
        //
    }
}
