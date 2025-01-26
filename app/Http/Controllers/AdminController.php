<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Office;
use App\Models\Siege;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.dashboard');
    }
    public function login()
    {
        return view('admin.login');
    }

    public function check(Request $request)
    {
        // Validate the form data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt($credentials)) {

            // Authentication passed
            return redirect()->route('admin.dashboard');
        }

        return redirect("admin/login")->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function sieges()
    {
        $sieges = Siege::all();
        return view('admin.sieges.index', compact('sieges'));
    }
    public function bureaux()
    {
        // $user = Auth::user();
        // $userSiegeId = $user->siege_id;
        // Get the bureaux with matching siege  
        $bureaux = Office::all();
        // $bureaux = Office::with('sieges')->get();
        // $sieges = Siege::all();
        return view('admin.bureaux', compact('bureaux'));
    }
    public function articles()
    {
        $articles = Article::all();

        return view('admin.article', compact('articles'));
    }
    public function users()
    {
        $siegeUsers = Siege::join('users', 'sieges.id', '=', 'users.siege_id')
            ->select('sieges.*', 'users.*')
            ->get();
        return view('admin.users', compact('siegeUsers'));
    }

    public function store_user(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'siege_id' => ['required', 'integer', 'unique:users'],
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // Hash the password using Hash facade
        $user->siege_id = $request->input('siege_id');
        $user->save();

        // Redirect to the list of users with a success message
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur ajouté avec succès');
    }
    public function destroy_user($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès');

    }
public function showstock(){
  
 $articles=Article::all();  
 $stockStatus = [];
 foreach ($articles as $article) {
     $stock = $article->stock;
     $stockStatus[$article->id] = $stock ? $stock->status : null;
 }
 $totalArticles = $articles->count();

    return view('admin.stock', compact('articles', 'stockStatus', 'totalArticles'));
}
}