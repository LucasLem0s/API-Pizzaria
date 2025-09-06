<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return response()->json(Pizza::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $pizza = Pizza::create([
        'nome' => $request->nome,
        'preco' => $request->preco,
    ]);

    return response()->json($pizza, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pizza $pizza)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json(['error' => 'Pizza não encontrada'], 404);
        }

        return response()->json($pizza);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pizza $pizza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pizza $pizza)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json(['error' => 'Pizza não encontrada'], 404);
        }

        $pizza->update([
            'nome' => $request->nome ?? $pizza->nome,
            'preco' => $request->preco ?? $pizza->preco,
        ]);

        return response()->json($pizza);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pizza $pizza)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json(['error' => 'Pizza não encontrada'], 404);
        }

        $pizza->delete();

        return response()->json(['message' => 'Pizza deletada com sucesso']);
    }
}
