<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Scheme;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skemaData = Scheme::all();
        return Inertia::render('Sertifikasi/index', [
            'data' => $skemaData
        ]);
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
        $kode = IdGenerator::generate(['table' => 'schemes', 'field' => 'kd_skema', 'length' => 7, 'prefix' => 'SKM-']);
        $scheme = new Scheme([
            'kd_skema' => $kode,
            'nm_skema' => $request->input('nama_skema'),
            'jenis' => $request->input('jenis'),
            'jml_unit' => $request->input('jumlah_unit'),
        ]);
        $scheme->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Scheme $scheme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $scheme = Scheme::findOrFail($id);
        return Inertia::render('Sertifikasi/[id]', [
            'data' => $scheme
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    /**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    $scheme = Scheme::findOrFail($id);

    $request->validate([
        'nama_skema' => 'required|string',
        'jenis' => 'required|string',
        'jumlah_unit' => 'required|integer',
    ]);

    $scheme->update([
        'nm_skema' => $request->input('nama_skema'),
        'jenis' => $request->input('jenis'),
        'jml_unit' => $request->input('jumlah_unit'),
    ]);

    return redirect()->route('sertifikasi.index')->with('success', 'Scheme updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $scheme = Scheme::findOrFail($id);
        $scheme->delete();
        return redirect()->route('sertifikasi.index')->with('success', 'Scheme deleted successfully');
    }
}
