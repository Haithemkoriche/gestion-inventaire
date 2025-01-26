<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siege;

class SiegeController extends Controller
{
    public function index()
    {
        $sieges = Siege::all();
        return view('admin.sieges.index', compact('sieges'));
    }

    public function create()
    {
        return view('admin.sieges.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'designation' => 'required',
            'address_siege' => 'required',
            'wilaya_sieges' => 'required',
            // Add other validation rules as needed
        ]);

        // Create a new siege
        $siege = new Siege;
        $siege->designation = $request->input('designation');
        $siege->address_siege = $request->input('address_siege');
        $siege->wilaya_sieges = $request->input('wilaya_sieges');
        // Add other siege attributes as needed

        // Save the siege to the database
        $siege->save();

        // Redirect to the list of sieges with a success message
        return redirect()->route('admin.sieges.index')->with('success', 'Siège ajouté avec succès');
    }

    public function edit($id)
    {
        $siege = Siege::findOrFail($id);
        return view('admin.sieges.edit', compact('siege'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'designation' => 'required',
            'address_siege' => 'required',
            'wilaya_sieges' => 'required',
            // Add other validation rules as needed
        ]);

        // Find the siege to update
        $siege = Siege::findOrFail($id);

        // Update siege attributes
        $siege->designation = $request->input('designation');
        $siege->address_siege = $request->input('address_siege');
        $siege->wilaya_sieges = $request->input('wilaya_sieges');
        // Update other siege attributes as needed

        // Save the changes to the database
        $siege->save();

        // Redirect to the list of sieges with a success message
        return redirect()->route('admin.sieges.index')->with('success', 'Siège mis à jour avec succès');
    }

    public function destroy($id)
    {
        $siege = Siege::findOrFail($id);
        $siege->delete();

        // Redirect to the list of sieges with a success message
        return redirect()->route('admin.sieges.index')->with('success', 'Siège supprimé avec succès');
    }
}