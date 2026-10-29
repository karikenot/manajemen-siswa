<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JurusanController extends Controller
{
    //

    public function index() {
        $jurusans = Jurusan::orderBy('nama_jurusan')->get();
        return view('jurusan.index', compact('jurusans'));
    }

    public function create() {
        return view('jurusan.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'kode_jurusan' => ['required', 'string', 'max:20', 'alpha_dash', 'unique:jurusan,kode_jurusan'],
            'nama_jurusan' => ['required', 'string', 'max:100'],
        ], [
            'kode_jurusan.required' => 'Kode jurusan wajib diisi',
            'kode_jurusan.alpha_dash' => 'Kode hanya boleh memakai huruf, angka, - atau _.',
            'kode_jurusan_unique' => 'Kode jurusan sudah digunakan',
            'nama_jurusan.required' => 'Nama jurusan wajib diisi',
        ]);
    }
}