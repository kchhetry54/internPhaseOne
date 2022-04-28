<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
 
    public function index(): View
    {
        $users  =   User::all();

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }


    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, User $user): RedirectResponse
    {
        $data   =   $request->validate([
            'name'      =>  ['required', 'max:20'],
            'email'     =>  ['required', 'email', 'unique:users,email,' . $user->id],
            'password'  =>  ['nullable',Password::min(8)],
        ]);

        if(!empty($password)){
            $data['password']   =   bcrypt($data['password']);
        }else{
            unset($data['password']);
        }
        $user->update($data);

        return redirect()->route('users.index')
        ->with('success','User Updated Successfuly');
    }


    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index')
         ->with('success', 'User deleted successfully');
    }
}
