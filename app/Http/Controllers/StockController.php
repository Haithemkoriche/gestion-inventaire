<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Office;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index()
{
    $user = Auth::user();

    $userSiegeId = $user->siege_id;

    $userOffices = Office::whereHas('sieges', function($q) use ($userSiegeId){
        $q->where('sieges.id', $userSiegeId);
    })->pluck('offices.id');

    $articles = Article::whereHas('offices', function($q) use ($userOffices) {
        $q->whereIn('offices.id', $userOffices);
    })->get();

    // Count the total articles
    $totalArticles = $articles->count();

    // Fetch stock status for each article
    $stockStatus = [];
    foreach ($articles as $article) {
        $stock = $article->stock;
        $stockStatus[$article->id] = $stock ? $stock->status : null;
    }

    // Pass the total articles count to the view as well
    return view('stockes.index', compact('articles', 'stockStatus', 'totalArticles'));
}


    public function changeStatus($id, Request $request)
    {
        $article = Article::findOrFail($id);

        // Attempt to retrieve the associated stock record, or create a new one if not found
        $stock = $article->stock ?? new Stock(['id_article' => $id]);

        $status = $request->input('status');

        // Update the status in the Stock table
        $stock->status = $status;
        $stock->save();

        return redirect()->back()->with('success', 'Status changed successfully');
    }
}