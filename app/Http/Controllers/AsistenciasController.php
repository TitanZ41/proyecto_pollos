<?php

namespace App\Http\Controllers;

use App\Models\Asistencias;
use App\Models\Empleados;
use Illuminate\Http\Request;

class AsistenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asistencias = Asistencias::with('empleado')->get();
        return view('asistencias.index', compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleados = Empleados::all();
        return view('asistencias.create', compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_empleado' => 'required|exists:empleados,id',
            'fecha_hora' => 'required|date',
            'hora_salida' => 'nullable|date_format:H:i:s',
            'hora_entrada' => 'nullable|date_format:H:i:s',
        ]);

        Asistencias::create($validated);

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia registrada exitosamente');
    }

    /**
     * Display the specified resource.

     */
    public function show(Asistencias $asistencia)
    {
        return view('asistencias.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencias $asistencia)
    {
        $empleados = Empleados::all();
        return view('asistencias.edit', compact('asistencia', 'empleados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asistencias $asistencia)
    {
        $validated = $request->validate([
            'id_empleado' => 'required|exists:empleados,id',
            'fecha_hora' => 'required|date',
            'hora_salida' => 'nullable|date_format:H:i:s',
            'hora_entrada' => 'nullable|date_format:H:i:s',
        ]);

      
        $asistencia->update($validated);

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asistencias $asistencia)
    {
        
        $asistencia->delete();

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia eliminada exitosamente');
    }
}