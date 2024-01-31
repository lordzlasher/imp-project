<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inventory.index', ['inventory' => Inventory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required|numeric'
        ]);

        Inventory::create([
            'nama' => $request->nama,
            'satuan' => $request->satuan,
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('inventory.index')->with('success', 'Data Inventory telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inventory = Inventory::find($id);
        return view('inventory.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required|numeric'
        ]);

        Inventory::where('id', $id)->update($validatedData);

        return redirect()->route('inventory.index')->with('warning', 'Data Inventory berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect()->route('inventory.index')->with('danger', 'Data Inventory telah dihapus.');
    }
}
