<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $adoptions = Adoption::latest()->unadopted()->paginate();
        return view('adoptions.list', ['adoptions' => $adoptions, 'header' => 'Available for adoption']);
    }

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        /*
        |-----------------------------------------------------------------------
        | Task 4 Guest, step 5. You should implement this method as instructed
        |-----------------------------------------------------------------------
        */
    }

    public function register()
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
        /*
        |-----------------------------------------------------------------------
        | Task 3 Guest, step 5. You should implement this method as instructed
        |-----------------------------------------------------------------------
        */
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);

        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        Auth::login($user);

        return redirect('/');
    }


    public function logout()
    {
        /*
        |-----------------------------------------------------------------------
        | Task 2 User, step 3. You should implement this method as instructed
        |-----------------------------------------------------------------------
        */
    }
}
