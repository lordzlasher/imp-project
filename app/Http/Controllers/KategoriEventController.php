<?php

namespace App\Http\Controllers;

use App\Models\KategoriEvent;
use Illuminate\Http\Request;

class KategoriEventController extends Controller
{
    public function index()
    {
        return view('kategori-event.index', ['kategories' => KategoriEvent::get()]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_event' => 'required',
        ]);

        KategoriEvent::create($validatedData);

        return redirect()->route('kategori-event.index')->with('success', 'Kategori telah ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kategori_event' => 'required',
        ]);

        KategoriEvent::where('id', $id)->update($validatedData);

        return redirect()->route('kategori-event.index')->with('warning', 'Kategori telah diupdate.');
    }

    public function destroy(string $id)
    {
        KategoriEvent::where('id', $id)->delete();
        return redirect()->route('kategori-event.index')->with('danger', 'Kategori telah dihapus.');
    }
}
