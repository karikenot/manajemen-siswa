<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}