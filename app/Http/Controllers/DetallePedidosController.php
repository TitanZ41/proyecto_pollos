<?php

namespace App\Http\Controllers;

use App\Models\detalle_pedidos;
use Illuminate\Http\Request;

class DetallePedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalle_pedidos = detalle_pedidos::all();
        return view('detalle_pedidos.index', compact('detalle_pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('detalle_pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            /*'inventarios_id' => 'required|exists:inventarios,id',*/
            'cantidad' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
        ]);

        detalle_pedidos::create($validated);

        return redirect()->route('detalle_pedidos.index')
            ->with('success', 'Detalle de pedido registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(detalle_pedidos $detalle_pedido)
    {
        return view('detalle_pedidos.show', compact('detalle_pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detalle_pedidos $detalle_pedido)
    {
        return view('detalle_pedidos.edit', compact('detalle_pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detalle_pedidos $detalle_pedido)
    {
        $validated = $request->validate([
            /*'inventarios_id' => 'required|exists:inventarios,id',*/
            'cantidad' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
        ]);

        $detalle_pedido->update($validated);

        return redirect()->route('detalle_pedidos.index')
            ->with('success', 'Detalle de pedido actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detalle_pedidos $detalle_pedido)
    {
        $detalle_pedido->delete();

        return redirect()->route('detalle_pedidos.index')
            ->with('success', 'Detalle del pedido eliminado correctamente');
    }
}
