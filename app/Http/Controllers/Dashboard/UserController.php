<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Notifications\UserRegisterionNotification;
use App\Notifications\WelcomeMessageNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('users.view-any');

        $users = User::orderBy('id', 'desc')->paginate(5);

        return view('dashboard.users.index', compact('users'));
    }

    public function AproveBlogger($id)
    {
        $user = User::find($id);
        $current_user = Auth::user();

        if ($user and $current_user->type == 'admin') {
            $status = $user->update(['type' => 'blogger' ]);

            if ($status) {
                Notification::send($user, new UserRegisterionNotification($user));
                return redirect()->route('users.index')->with('success', 'You Aproved the user successfuly');
            } else {
                return back()->with('error', 'Something Went Wrong');
            }
        } else {
            return back()->with('error', 'Something Went Wrong the user not found');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('users.create');

        $roles = Role::orderBy('name')->get();

        return view('dashboard.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        Gate::authorize('users.create');

        $user = User::create([
            "name" => $request->post('name'),
            "email" => $request->post('email'),
            "password" => Hash::make("password"),
            "type" => $request->post('type'),
        ]);

        if ($user) {
            $user->Profile()->create();

            $user->roles()->sync($request->post('roles'));

            $user->notify(new WelcomeMessageNotifications($user));

            return redirect()->route('users.index')->with('success', 'the user created successfuly');
        } else {
            return redirect()->route('users.index')->with('error', 'something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('users.view');

        $user = User::find($id);

        if ($user) {
            return view('dashboard.users.show', compact('user'));
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('users.update');

        $user = User::find($id);
        $roles = Role::orderBy('name')->get();

        if ($user) {
            return view('dashboard.users.edit', compact('user', 'roles'));
        }

        return back()->with('error', 'Something Went Wrong');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        Gate::authorize('users.update');

        $user = User::find($id);

        if ($user) {
            $status = $user->update([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'type' => $request->post('type'),
            ]);

            if ($status) {
                $user->roles()->sync($request->post('roles'));

                return redirect()->route('users.index')->with('success', 'The use update successfuly');
            }
        } else {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('users.delete');

        $user = User::find($id);

        Storage::disk('uploads')->delete($user->profile->getRawOriginal('photo'));

        $user->delete();

        return redirect()->route('users.index')->with('success', 'ths user deleted successfuly');
    }

    public function createResetPassword()
    {
        $user = Auth::user();

        return view('dashboard.users.reset-password', compact('user'));
    }

    public function resetPassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'curent_password' => ['required', function($attribute, $value, $fail) use($user) {
                if (! Hash::check($value, $user->password)) {
                    return $fail('the current user invalid');
                }
            }],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $status = $user->update([
            'password' => Hash::make($request->password),
        ]);

        if ($status) {
            return redirect()->route('profile.index')->with('success', 'password reseting successfuly');
        }
    }
}
