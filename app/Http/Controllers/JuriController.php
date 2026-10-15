<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Pendaftaran;

    class JuriController extends Controller
    {
        // Tampilkan daftar semua peserta lomba
        public function index()
        {
            $pendaftarans = Pendaftaran::with(['user', 'lomba'])->latest()->get();
            return view('juri.dashboard', compact('pendaftarans'));
        }

        // Simpan penilaian & catatan ke database
        public function nilaiPeserta(Request $request, $id)
        {
            $request->validate([
                'status' => 'required|in:Lolos,Tidak Lolos',
                'catatan_juri' => 'nullable|string|max:1000',
            ]);

            $pendaftaran = Pendaftaran::findOrFail($id);
            $pendaftaran->update([
                'status' => $request->status,
                'catatan_juri' => $request->catatan_juri,
            ]);

            return back()->with('success', 'Penilaian berhasil disimpan!');
        }
    }
