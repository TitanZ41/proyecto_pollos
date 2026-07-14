<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleados::all();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'ci' => 'required|string|max:8|unique:empleados,ci',
            'rol' => 'required|string|max:15',
            'turno' => 'required|string|max:10',
            'sueldo' => 'required|numeric|min:0',
        ]);

        Empleados::create($validated);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleados $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleados $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleados $empleado)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'ci' => 'required|string|max:8|unique:empleados,ci,' . $empleado->id,
            'rol' => 'required|string|max:15',
            'turno' => 'required|string|max:10',
            'sueldo' => 'required|numeric|min:0',
        ]);
        $empleado->update($validated);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleados $empleado)
    {
        // Verificar si el empleado tiene asistencias antes de borrar
        if ($empleado->asistencias()->count() > 0) {
            return redirect()->route('empleados.index')
                ->with('error', 'No se puede eliminar el empleado porque tiene asistencias asociadas');
        }

        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado exitosamente');
    }
}
