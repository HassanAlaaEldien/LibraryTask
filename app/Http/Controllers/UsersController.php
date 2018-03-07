<?php

namespace App\Http\Controllers;

use App\Http\Requests\addUserRequest;
use App\Http\Requests\updateUserRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Handle the request for listing all users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::All();

        return view('Users.index', compact('users'));
    }

    /**
     * Handle the request for viewing specific user.
     *
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($user)
    {
        $user = User::find($user);
        return view('Users.showUser', compact('user'));
    }


    /**
     * Handle the request for viewing user form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Users.createUser');
    }


    /**
     * Handle the request for storing user.
     *
     * @param addUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(addUserRequest $request)
    {
//        User::create($request->only(['name', 'email', 'password', 'address', 'phone']));

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return redirect()->route('listUsers')->with(['success' => 'User successfully created!']);
    }

    /**
     * Handle the request for view user update form.
     *
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($user)
    {
        $user = User::find($user);

        return view('Users.updateUser', compact('user'));
    }


    /**
     * Handle the request for updating user.
     *
     * @param $user
     * @param updateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($user, updateUserRequest $request)
    {
        $user = User::find($user);

        $user->update($request->only(['name', 'email', 'address', 'phone']));

        return redirect()->route('listUsers')->with(['success' => 'User Successfully Updated.']);
    }

    /**
     * Handle the request for deleting specific user.
     *
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($user)
    {
        User::find($user)->delete();

        return redirect()->route('listUsers')->with(['success' => 'User Successfully deleted.']);
    }
}
