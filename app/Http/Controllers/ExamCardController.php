<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function create()
    {
        return view('exam-card.create');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:20',
            'nama_mahasiswa' => 'required|string|max:100',
            'mata_kuliah' => 'required|string|max:100',
            'tanggal_ujian' => 'required|date',
        ]);

        $data = [
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'mata_kuliah' => $request->mata_kuliah,
            'tanggal_ujian' => $request->tanggal_ujian,
        ];

        return view('exam-card.card', compact('data'));
    }
}