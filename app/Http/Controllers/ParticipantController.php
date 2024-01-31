<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Scheme;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Participant::with('scheme')->get();
        return Inertia::render('Index',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skemaData = Scheme::all();
        return Inertia::render('Peserta/form',[
            'skemaData' => $skemaData
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $participant = new Participant([
            'kd_skema' => $request->input('kd_skema'),
            'nm_peserta' => $request->input('nama_peserta'),
            'jekel' => $request->input('jenis_kelamin'),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
        ]);
        $participant->save();
        return redirect()->route('welcome')->with('success', 'Scheme updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        //
    }
}
