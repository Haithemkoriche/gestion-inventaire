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
    private $wilayas = [
        'Adrar',
        'Chlef',
        'Laghouat',
        'Oum El Bouaghi',
        'Batna',
        'Béjaïa',
        'Biskra',
        'Béchar',
        'Blida',
        'Bouira',
        'Tamanrasset',
        'Tébessa',
        'Tlemcen',
        'Tiaret',
        'Tizi Ouzou',
        'Alger',
        'Djelfa',
        'Jijel',
        'Sétif',
        'Saïda',
        'Skikda',
        'Sidi Bel Abbès',
        'Annaba',
        'Guelma',
        'Constantine',
        'Médéa',
        'Mostaganem',
        'M\'Sila',
        'Mascara',
        'Ouargla',
        'Oran',
        'El Bayadh',
        'Illizi',
        'Bordj Bou Arréridj',
        'Boumerdès',
        'El Tarf',
        'Tindouf',
        'Tissemsilt',
        'El Oued',
        'Khenchela',
        'Souk Ahras',
        'Tipaza',
        'Mila',
        'Aïn Defla',
        'Naâma',
        'Aïn Témouchent',
        'Ghardaïa',
        'Relizane',
        'Timimoun',
        'Bordj Badji Mokhtar',
        'Ouled Djellal',
        'Béni Abbès',
        'In Salah',
        'In Guezzam',
        'Touggourt',
        'Djanet',
        'El M\'Ghair',
        'El Meniaa'
    ];
    public function showstock()
    {
        // Get current wilaya filter and search term
        $selectedWilaya = request('wilaya');
        $searchTerm = request('search');

        // Start with a base query
        $query = Article::with([
            'offices' => function ($query) {
                $query->with('sieges:id,designation,wilaya_sieges');
            },
            'stock'
        ]);

        // Apply search filter if search term exists
        if ($searchTerm) {
            $query->where('designation', 'LIKE', '%' . $searchTerm . '%');
        }

        // Apply wilaya filter at the query level if selected
        if ($selectedWilaya) {
            $query->whereHas('offices.sieges', function ($query) use ($selectedWilaya) {
                $query->where('wilaya_sieges', $selectedWilaya);
            });
        }

        // Execute the query
        $articles = $query->get();

        // Process stock status
        $stockStatus = $articles->mapWithKeys(function ($article) {
            return [$article->id => $article->stock ? $article->stock->status : null];
        })->all();

        $totalArticles = $articles->count();

        // Pass both the search term and selected wilaya back to the view
        return view('admin.stock', compact('articles', 'stockStatus', 'totalArticles'))
            ->with('wilayas', $this->wilayas)
            ->with('search', $searchTerm)
            ->with('selectedWilaya', $selectedWilaya);
    }
}