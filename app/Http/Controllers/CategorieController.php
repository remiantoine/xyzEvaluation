<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        // Récupérer toutes les catégories
        $categories = Categorie::all();
        
        // Passer les catégories à la vue
        return view('app.categories.index', compact('categories'));
    }
    public function show(Categorie $category)
    {
        $category->load('tracks');
        $tracks = $category->tracks()
        ->withCount('likes') // Compte le nombre de likes pour chaque track
        ->orderBy('likes_count', 'desc') // Trie par le nombre de likes en ordre décroissant
        ->paginate(10);
        // Passer la catégorie et ses tracks à la vue
        return view('app.categories.show', [
            'category' => $category,
            'tracks' => $tracks,
        ]);
    }
}
