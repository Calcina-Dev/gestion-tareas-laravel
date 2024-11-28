<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Mostrar todas las tareas.
     */
    public function index()
    {
        $tareas = Tarea::all();
        return response()->json($tareas);
    }

    /**
     * Crear una nueva tarea.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dni' => 'required|integer',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_vencimiento' => 'required|date',
            'estado' => 'required|string|in:pendiente,en_progreso,completada',
        ]);

        $tarea = Tarea::create($validated);

        return response()->json($tarea, 201);
    }

    /**
     * Mostrar una tarea específica.
     */
    public function show($id)
    {
        $tarea = Tarea::find($id);
        
        if ($tarea) {
            return response()->json($tarea);
        }

        return response()->json(['message' => 'Tarea no encontrada'], 404);
    }

    /**
     * Actualizar una tarea.
     */
    public function update(Request $request, $id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }

        $validated = $request->validate([
            'dni' => 'required|integer',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_vencimiento' => 'required|date',
            'estado' => 'required|string|in:pendiente,en_progreso,completada',
        ]);

        $tarea->update($validated);
        
        return response()->json($tarea);
    }

    /**
     * Eliminar una tarea.
     */
    public function destroy($id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }

        $tarea->delete();

        return response()->json(['message' => 'Tarea eliminada correctamente']);
    }
}
