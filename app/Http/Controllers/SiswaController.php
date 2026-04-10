<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $siswas = Siswa::when($search, function ($q) use ($search) {
            $q->where('nama', 'like', "%$search%")
              ->orWhere('nis', 'like', "%$search%")
              ->orWhere('kelas', 'like', "%$search%");
        })->orderBy('nama')->paginate(10)->withQueryString();

        return view('siswa.index', compact('siswas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:100',
            'nis'           => 'required|string|max:20|unique:siswas,nis',
            'kelas'         => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|string',
            'no_hp'         => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:100',
        ], [
            'nama.required'          => 'Nama wajib diisi.',
            'nis.required'           => 'NIS wajib diisi.',
            'nis.unique'             => 'NIS sudah terdaftar.',
            'kelas.required'         => 'Kelas wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'alamat.required'        => 'Alamat wajib diisi.',
            'email.email'            => 'Format email tidak valid.',
        ]);

        Siswa::create($validated);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:100',
            'nis'           => 'required|string|max:20|unique:siswas,nis,'.$siswa->id,
            'kelas'         => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|string',
            'no_hp'         => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:100',
        ], [
            'nama.required'          => 'Nama wajib diisi.',
            'nis.required'           => 'NIS wajib diisi.',
            'nis.unique'             => 'NIS sudah terdaftar.',
            'kelas.required'         => 'Kelas wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'alamat.required'        => 'Alamat wajib diisi.',
            'email.email'            => 'Format email tidak valid.',
        ]);

        $siswa->update($validated);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus!');
    }
}
