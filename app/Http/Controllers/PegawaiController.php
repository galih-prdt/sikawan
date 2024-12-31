<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Mail;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $pegawai = Pegawai::orderBy('id')->get();
       return view('pegawai.index', compact('pegawai'));
    }


    public function sendEmail(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        // Validasi input
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Kirim email
        Mail::raw($request->message, function ($message) use ($request, $pegawai) {
            $message->to($pegawai->email)
                ->subject($request->subject)
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });

        // Redirect kembali dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Email berhasil dikirim ke ' . $pegawai->nama);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'email' => 'required',
        ]);

        Pegawai::create($validatedData);

        return redirect()->route('pegawai.index')->with('success', 'Data Berhasil Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Pegawai::findOrfail($id);
        return view ('pegawai.show', compact ('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Pegawai::findOrfail($id);
        return view ('pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'email' => 'required',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update($validatedData);

        return redirect()->route('pegawai.index')->with('success', 'Data Berhasil Input');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}

