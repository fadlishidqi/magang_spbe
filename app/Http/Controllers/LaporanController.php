<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Metode untuk admin
    public function index()
    {
        $laporans = Laporan::paginate(10); // Menggunakan paginate
        return view('admin.laporan.index', compact('laporans'));
    }

    public function show(Laporan $laporan)
    {
        return view('admin.laporan.show', compact('laporan'));
    }

    public function edit(Laporan $laporan)
    {
        return view('admin.laporan.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
            'kategori' => 'required|string',
            'file_pendukung' => 'nullable|file|max:2048'
        ]);

        $laporan->update($request->all());

        if ($request->hasFile('file_pendukung')) {
            $path = $request->file('file_pendukung')->store('public/files');
            $laporan->file_pendukung = $path;
        }

        return redirect()->route('laporan.index')->with('success', 'Laporan updated successfully.');
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan deleted successfully.');
    }

    // Metode untuk pengguna
    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
            'kategori' => 'required|string',
            'file_pendukung' => 'nullable|file|max:2048'
        ]);

        $laporan = new Laporan($request->all());

        if ($request->hasFile('file_pendukung')) {
            $path = $request->file('file_pendukung')->store('public/files');
            $laporan->file_pendukung = $path;
        }

        $laporan->save();

        return redirect()->route('laporan.create')->with('success', 'Laporan created successfully.');
    }
}
    