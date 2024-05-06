<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\AnimeModel;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $anime = AnimeModel::select(
            'id',
            'nombre',
            'numero_capitulos',
            'visto',
            'comentarios'
        )
            ->get();
        return response()->json($anime);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // El campo visto solo acepta 0 para false o 1 para true.
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'numero_capitulos' => ['required', 'integer', 'min:1'],
            'visto' => ['required', 'boolean'],
            'comentarios' => ['nullable', 'string']
        ]);

        try {
            $nuevoAnime = AnimeModel::create([
                'nombre' => trim($request['nombre']),
                'numero_capitulos' => trim($request['numero_capitulos']),
                'visto' => $request['visto'],
                'comentarios' => trim($request['comentarios'])
            ]);

            return response()->json(['success' => true, 'message' => 'Se creo correctamente el nuevo Anime.', 'nuevoAnime' => $nuevoAnime], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $animeBuscar = AnimeModel::findOrFail($id);

            return response()->json($animeBuscar);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Anime no encontrado.'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:255'],
            'numero_capitulos' => ['sometimes', 'required', 'integer', 'min:1'],
            'visto' => ['sometimes', 'required', 'boolean'],
            'comentarios' => ['nullable', 'string']
        ]);

        try {
            $editarAnime = AnimeModel::findOrFail($id);
            // Verifica si el campo esta presente en la solicitud.
            $editarAnime->fill($validatedData);
            $editarAnime->save();

            return response()->json(['success' => true, 'message' => 'Se edito correctamente el Anime.', 'editarAnime' => $editarAnime], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $borrarAnime = AnimeModel::findOrFail($id);
            $borrarAnime->delete();

            return response()->json(['success' => true, 'message' => 'Anime eliminado correctamente.'], 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Anime no encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el Anime.'], 500);
        }
    }
}
