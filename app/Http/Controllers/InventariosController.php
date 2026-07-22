<?php

namespace App\Http\Controllers;

use App\Models\inventarios;
use Illuminate\Http\Request;

class InventariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventarios = inventarios::all();
        return view('inventarios.index', compact('inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'producto' => 'required|string|max:255',
            'stock_actual' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        inventarios::create($validated);

        return redirect()->route('inventarios.index')
            ->with('success', 'Inventario registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(inventarios $inventario)
    {
        return view('inventarios.show', compact('inventario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(inventarios $inventario)
    {
        $inventarios = inventarios::all();
        return view('inventarios.edit', compact('inventario', 'inventarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, inventarios $inventario)
    {
        $validated = $request->validate([
            'producto' => 'required|string|max:255',
            'stock_actual' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        $inventario->update($validated);

        return redirect()->route('inventarios.index')
            ->with('success', 'Inventario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(inventarios $inventario)
    {
        /*if ($inventarios->detallePedidos()->count() > 0) {
            return redirect()->route('inventarios.index')
                ->with('error', 'No se puede eliminar el inventario porque tiene detalles en el inventario ');
        }*/

        $inventario->delete();

        return redirect()->route('inventarios.index')
            ->with('success', 'Inventario eliminado correctamente');
    }
}
