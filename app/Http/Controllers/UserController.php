<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $data = User::where('id', '!=', Auth::user()->id)->get();
        return view('user.index', compact('data'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);



        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->role = 1;
        $user->status = 1;

        if ($request->hasFile('avatar')) {

            $avatar = $request->file('avatar');
            $extension = $avatar->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $avatar->move('uploads/users/', $filename);
            $user->avatar = $filename;
        }else {
            $user->avatar = '';
        }

        $user->save();

        return redirect()->route('user.index')->withSuccess('User created successfully');
    }

    public function edit(User $user)
    {
        $data = $user;
        return view('user.edit', compact('data'));
    }

    public function update(Request $request, User $user)
    {
        $existingUser = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != $existingUser->password) {
            $user->password = Hash::make($request->password);
        }
        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->role = 1;
        $user->status = 1;

        if ($request->hasFile('avatar')) {
            if($user->avatar != null){
                $oldImagePath = public_path("/uploads/users/$user->avatar");
                unlink($oldImagePath);
            }
            $avatar = $request->file('avatar');
            $extension = $avatar->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $avatar->move('uploads/users/', $filename);
            $user->avatar = $filename;
        }
        $user->update();

        return redirect()->route('user.index')->withStatus(__('User was updated'));
    }
}
