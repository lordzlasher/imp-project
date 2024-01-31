<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\InventoryLog;


class InventoryLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = InventoryLog::all();
        $inventories = Inventory::all();

        return view('inventory-log.index', compact('logs', 'inventories'));
    }

    public function create()
    {
        $barangs = Inventory::all();

        return view('inventory-log.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required|numeric',
            'status' => 'required'
        ]);

        // Update jumlah di tabel Inventory berdasarkan status
        $inventory = Inventory::find($request->barang_id);

        if ($request->status == 'Barang Masuk') {
            $inventory->jumlah += $request->jumlah;
        } elseif ($request->status == 'Barang Keluar') {
            // Pastikan jumlah yang dikeluarkan tidak melebihi jumlah yang ada di inventory
            if ($request->jumlah > $inventory->jumlah) {
                return redirect()->back()->with('danger', 'Jumlah barang keluar melebihi stok yang ada.');
            }

            $inventory->jumlah -= $request->jumlah;
        }

        // Buat entry baru di tabel InventoryLog
        $inventoryLog = InventoryLog::create([
            'id_inventory' => $request->barang_id,
            'tanggal' => now(),
            'jumlah' => $request->jumlah,
            'status' => $request->status
        ]);

        // Simpan perubahan pada tabel Inventory
        $inventory->save();

        return redirect()->route('inventory-log.index')->with('success', 'Log Inventory telah ditambahkan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventoryLog = InventoryLog::find($id);

        // Simpan status untuk digunakan setelah menghapus InventoryLog
        $status = $inventoryLog->status;

        // Update jumlah di tabel Inventory berdasarkan status yang disimpan sebelumnya
        $inventory = Inventory::find($inventoryLog->id_inventory);

        if ($status == 'Barang Masuk') {
            $inventory->jumlah -= $inventoryLog->jumlah;
        } elseif ($status == 'Barang Keluar') {
            $inventory->jumlah += $inventoryLog->jumlah;
        }

        // Simpan perubahan pada tabel Inventory
        $inventory->save();

        $inventoryLog->delete();

        return redirect()->route('inventory-log.index')->with('danger', 'Log Inventory telah dihapus.');
    }
}
