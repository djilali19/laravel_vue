<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function list(){
        $users=User::All();
        //$users =  User::first();
        //dd($users->ToArray());
        return Inertia::render('User/UserList',[
            'users' => $users
        ]);
    }

    public function create(){
        return Inertia::render('User/UserAdd');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(RouteServiceProvider::USER);

    }
}
