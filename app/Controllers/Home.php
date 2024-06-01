<?php

namespace App\Controllers;

use App\Models\KabupatenModel;
use App\Models\SekolahModel;

class Home extends BaseController
{
    public function index(): string
    {
        // Inisialisasi model
        $kabupatenModel = new KabupatenModel();
        $sekolahModel = new SekolahModel();

        // Ambil data kabupaten dan sekolah
        $kabupatenData = $kabupatenModel->findAll();
        $sekolahData = $sekolahModel->findAll();

        // Siapkan data untuk dikirim ke view
        $data = [
            'title' => 'Dashboard',
            'kabupaten' => $kabupatenData,
            'sekolah' => $sekolahData,
        ];

        // Tampilkan view dengan data yang diperlukan
        return view('home/index', $data);
    }
}
