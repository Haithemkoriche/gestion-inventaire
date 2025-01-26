<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Siege;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'siege_id' => ['required', 'integer', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'siege_id' => $data['siege_id'],
        ]);
    }
    public function showRegistrationForm()
    {
        $sieges = Siege::all();
        return view('auth.register', compact('sieges')); // Pass the $sieges variable to the view
    }
    // public function edit_user($id)
    // {
    //     $user = User::findOrFail($id);
    //     $sieges = Siege::all();

    //     return view('admin.user-edit', compact('user','sieges'));
    // }
    
    // public function update_user(Request $request, $id)
    // {
    //  // Validate the form data
    //  $validatedData = $request->validate([
    //     'name' => ['required', 'string', 'max:255'],
    //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //     'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     'siege_id' => ['required', 'integer', 'unique:users'],
    // ]);

    // // Create a new user
    // $user = User::findOrFail($id);
    // $user->name = $request->input('name');
    // $user->email = $request->input('email');
    // $user->password = Hash::make($request->input('password')); // Hash the password using Hash facade
    // $user->siege_id = $request->input('siege_id');
    // $user->save();

    // // Redirect to the list of users with a success message
    // return redirect()->route('admin.users.index')->with('success', 'Utilisateur mise a jour avec succès');
    // }
}
