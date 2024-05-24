<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use App\Models\VideoGame;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{


    public function sendSuggestion(Request $request)
    {
        $name = strtolower($request->input('name'));

        // Verificar si ya existe una sugerencia con el mismo nombre
        $existingSuggestion = Suggestion::where('name', $name)->first();
        if ($existingSuggestion) {
            return redirect()->back()->with('message', 'Ya se ha enviado una sugerencia para este videojuego.');
        }

        // Buscar si el nombre ya existe en la tabla video_games sin distinguir mayúsculas y minúsculas
        $videoGame = VideoGame::whereRaw('LOWER(name) = ?', $name)->first();

        if ($videoGame) {
            return redirect()->back()->with('message', 'El videojuego ya está en la página.');
        }

        // Si el nombre no existe y no se ha enviado previamente, crear la sugerencia
        $sugerencia = Suggestion::create([
            'name' => $name,
            'video_game_id' => null, // o asigna aquí el ID del videojuego si lo tienes disponible
        ]);

        return redirect()->back()->with('message', 'Sugerencia creada con éxito.');
    }


    public function suggest()
    {
        return view('pages.suggestions.suggest');
    }
}
