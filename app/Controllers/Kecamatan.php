<?php

namespace App\Controllers;

use App\Models\KecamatanModel;
use App\Models\KabupatenModel;
use CodeIgniter\Controller;

class Kecamatan extends Controller
{
    protected $kecamatanModel;
    protected $kabupatenModel;

    // Konstruktor untuk menginisialisasi model dan helper
    public function __construct()
    {
        $this->kecamatanModel = new KecamatanModel();
        $this->kabupatenModel = new KabupatenModel();
        helper('url');
    }

    // Metode untuk menampilkan semua data kecamatan
    public function index()
    {
        // Ambil semua data kecamatan
        $kecamatanData = $this->kecamatanModel->findAll();

        // Siapkan data untuk dikirim ke view
        $data = [
            'title' => 'Kecamatan',
            'kecamatan' => $kecamatanData
        ];

        // Tampilkan view dengan data kecamatan
        return view('kecamatan/index', $data);
    }

    // Metode untuk menampilkan form tambah data kecamatan
    public function create()
    {
        // Ambil semua data kabupaten
        $kabupatenData = $this->kabupatenModel->findAll();

        // Siapkan data untuk dikirim ke view
        $data = [
            'title' => 'Kecamatan',
            'kabupaten' => $kabupatenData
        ];

        // Tampilkan view dengan form tambah kecamatan
        return view('kecamatan/create', $data);
    }

    // Metode untuk menyimpan data kecamatan yang baru
    public function store()
    {
        // Simpan data kecamatan yang diterima dari form
        $this->kecamatanModel->save([
            'kode_kecamatan' => $this->request->getPost('kode_kecamatan'),
            'nama_kecamatan' => $this->request->getPost('nama_kecamatan'),
            'jumlah_penduduk' => $this->request->getPost('jumlah_penduduk'),
            'luas_wilayah' => $this->request->getPost('luas_wilayah'),
            'id_kabupaten' => $this->request->getPost('id_kabupaten'),
        ]);

        // Redirect ke halaman daftar kecamatan
        return redirect()->to('/kecamatan');
    }

    // Metode untuk menampilkan form edit data kecamatan
    public function edit($kode_kecamatan)
    {
        // Ambil semua data kabupaten
        $kabupatenData = $this->kabupatenModel->findAll();

        // Siapkan data kecamatan yang akan diedit dan data kabupaten untuk dikirim ke view
        $data = [
            'title' => 'Edit Data Kecamatan',
            'kecamatan' => $this->kecamatanModel->find($kode_kecamatan),
            'kabupaten' => $kabupatenData
        ];

        // Tampilkan view dengan form edit kecamatan
        return view('kecamatan/edit', $data);
    }

    // Metode untuk memperbarui data kecamatan
    public function update($kode_kecamatan)
    {
        // Update data kecamatan yang diterima dari form
        $this->kecamatanModel->update($kode_kecamatan, [
            'nama_kecamatan' => $this->request->getPost('nama_kecamatan'),
            'jumlah_penduduk' => $this->request->getPost('jumlah_penduduk'),
            'luas_wilayah' => $this->request->getPost('luas_wilayah'),
            'id_kabupaten' => $this->request->getPost('id_kabupaten'),
        ]);

        // Redirect ke halaman daftar kecamatan
        return redirect()->to('/kecamatan');
    }

    // Metode untuk menghapus data kecamatan
    public function delete($kode_kecamatan)
    {
        // Hapus data kecamatan berdasarkan kode_kecamatan
        $this->kecamatanModel->delete($kode_kecamatan);

        // Redirect ke halaman daftar kecamatan
        return redirect()->to('/kecamatan');
    }
}
