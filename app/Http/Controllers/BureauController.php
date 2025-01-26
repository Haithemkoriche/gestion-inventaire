<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Bureau;
use App\Models\Office;
use App\Models\Siege;
use Illuminate\Support\Facades\Auth;

class BureauController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userSiegeId = $user->siege_id;
        // Get the bureaux with matching siege  
        $bureaux = Office::whereHas('sieges', function ($q) use ($userSiegeId) {
            $q->where('sieges.id', $userSiegeId);
        })
            ->get();
        // $bureaux = Office::with('sieges')->get();
        // $sieges = Siege::all();
        return view('bureaux.index', compact('bureaux'));
    }


    public function create()
    {
        // $sieges = Siege::all();

        return view('bureaux.create');
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $userSiegeId = $user->siege_id;
        // Validate the request data
        $validatedData = $request->validate([
            'num_bureau' => 'required',
            'etage' => 'required',
            // 'siege_id' => $userSiegeId, // Validate the siege_id input
        ]);

        // Create a new bureau
        $bureau = new Office();
        $bureau->num_bureau = $validatedData['num_bureau'];
        $bureau->etage = $validatedData['etage'];
        $bureau->save();

        // Attach the selected siege to the bureau
        $bureau->sieges()->attach($userSiegeId);

        // Redirect to a specific route with a success message
        return redirect()->route('bureaux.index')->with('success', 'Bureau ajouté avec succès');
    }




    public function edit($id)
    {
        $bureau = Office::with('sieges')->findOrFail($id);
        // $sieges = Siege::with('offices');
        return view('bureaux.edit', compact('bureau'));
    }


    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $userSiegeId = $user->siege_id;
        // Validate the request data
        $validatedData = $request->validate([
            'num_bureau' => 'required',
            'etage' => 'required',
            // 'siege_id' => 'required' // Validate the siege_id input
        ]);

        // Find the bureau by id and update it
        $bureau = Office::findOrFail($id);
        $bureau->num_bureau = $validatedData['num_bureau'];
        $bureau->etage = $validatedData['etage'];
        $bureau->save();

        // Update the associated siege
        // First, detach any existing associations and then attach the new one
        $bureau->sieges()->sync($userSiegeId);

        // Redirect to a specific route with a success message
        return redirect()->route('bureaux.index')->with('success', 'Bureau mis à jour avec succès');
    }


    // Supprimer un agent de la base de données
    public function destroy($id)
    {
        $bureaux = Office::findOrFail($id);
        $bureaux->delete();

        // Rediriger vers la liste des agents avec un message de succès
        return redirect()->route('bureaux.index')->with('success', 'Bureau supprimé avec succès');
    }
}
