<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusCrew;


class StatusCrewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('status-crew.index', ['status' => StatusCrew::get()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status_crew' => 'required',
        ]);

        StatusCrew::create($validatedData);

        return redirect()->route('status-crew.index')->with('success', 'Status telah ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status_crew' => 'required',
        ]);

        StatusCrew::where('id', $id)->update($validatedData);

        return redirect()->route('status-crew.index')->with('warning', 'Status telah diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        StatusCrew::where('id', $id)->delete();
        return redirect()->route('status-crew.index')->with('danger', 'Status telah dihapus.');
    }
}
