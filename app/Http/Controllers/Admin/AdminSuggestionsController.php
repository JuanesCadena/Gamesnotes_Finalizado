<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;


class AdminSuggestionsController extends Controller
{
    public function index(Request $request)
    {
        // Verificar si el usuario está autenticado y tiene el rol de administrador
        if (auth()->check() && auth()->user()->role == 1) {
            // Obtener el término de búsqueda
            $search = $request->query('search');

            // Consulta de sugerencias con filtrado por término de búsqueda si está presente
            $query = Suggestion::query()->select('id', 'name', 'video_game_id', 'created_at', 'updated_at');
            if ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            }

            // Obtener todas las sugerencias sin paginación
            $suggestions = $query->get();

            // Devolver la vista del panel de administrador con las sugerencias
            return view('admin.suggestions.index', ['suggestions' => $suggestions, 'search' => $search]);
        }

        // Si el usuario no está autenticado o no tiene el rol de administrador, redirigir a otra página o mostrar un mensaje de error
        return redirect()->route('home')->with('error', 'No tiene permisos para acceder a esta página');
    }



    public function deleteSuggestion(Request $request, $id)
    {
        // Buscar la sugerencia por su ID
        $suggestion = Suggestion::findOrFail($id);

        // Verificar si la sugerencia existe
        if ($suggestion) {
            // Eliminar la sugerencia
            $suggestion->delete();

            // Redireccionar de vuelta a la página de la lista de sugerencias con un mensaje de éxito
            return redirect()->route('admin.suggestions.index')->with('success', 'La sugerencia ha sido eliminada correctamente.');
        } else {
            // Si la sugerencia no se encuentra, redireccionar de vuelta a la página de la lista de sugerencias con un mensaje de error
            return redirect()->route('admin.suggestions.index')->with('error', 'No se pudo encontrar la sugerencia.');
        }
    }
}
