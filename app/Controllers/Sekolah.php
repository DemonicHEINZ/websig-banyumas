<?php

namespace App\Controllers;

use App\Models\SekolahModel;
use App\Models\KecamatanModel;
use CodeIgniter\Controller;

class Sekolah extends Controller
{
    protected $sekolahModel;
    protected $kecamatanModel;

    // Konstruktor untuk menginisialisasi model dan helper
    public function __construct()
    {
        $this->sekolahModel = new SekolahModel();
        $this->kecamatanModel = new KecamatanModel();
        helper('url');
    }

    // Metode untuk menampilkan semua data sekolah dengan kecamatan terkait
    public function index()
    {
        // Siapkan data sekolah dengan kecamatan terkait
        $data = [
            'title' => 'Sekolah',
            'sekolah' => $this->sekolahModel->getSekolahWithKecamatan()
        ];

        // Tampilkan view dengan data sekolah
        return view('sekolah/index', $data);
    }

    // Metode untuk menampilkan form tambah data sekolah
    public function create()
    {
        // Siapkan data kecamatan untuk pilihan di form
        $data = [
            'title' => 'Tambah Data Sekolah',
            'kecamatan' => $this->kecamatanModel->findAll()
        ];

        // Tampilkan view dengan form tambah sekolah
        return view('sekolah/create', $data);
    }

    // Metode untuk menyimpan data sekolah yang baru
    public function store()
    {
        // Simpan data sekolah yang diterima dari form
        $this->sekolahModel->save([
            'npsn' => $this->request->getPost('npsn'),
            'nama_sekolah' => $this->request->getPost('nama_sekolah'),
            'alamat_sekolah' => $this->request->getPost('alamat_sekolah'),
            'status_sekolah' => $this->request->getPost('status_sekolah'),
            'jenjang_pendidikan' => $this->request->getPost('jenjang_pendidikan'),
            'koordinat' => $this->request->getPost('koordinat'),
            'kode_kecamatan' => $this->request->getPost('kode_kecamatan')
        ]);

        // Redirect ke halaman daftar sekolah
        return redirect()->to('/sekolah');
    }

    // Metode untuk menampilkan form edit data sekolah
    public function edit($npsn)
    {
        // Siapkan data sekolah yang akan diedit dan data kecamatan untuk pilihan di form
        $data = [
            'title' => 'Edit Sekolah',
            'sekolah' => $this->sekolahModel->find($npsn),
            'kecamatan' => $this->kecamatanModel->findAll()
        ];

        // Tampilkan view dengan form edit sekolah
        return view('sekolah/edit', $data);
    }

    // Metode untuk memperbarui data sekolah
    public function update($npsn)
    {
        // Update data sekolah yang diterima dari form
        $this->sekolahModel->update($npsn, [
            'npsn' => $this->request->getPost('npsn'),
            'nama_sekolah' => $this->request->getPost('nama_sekolah'),
            'alamat_sekolah' => $this->request->getPost('alamat_sekolah'),
            'status_sekolah' => $this->request->getPost('status_sekolah'),
            'jenjang_pendidikan' => $this->request->getPost('jenjang_pendidikan'),
            'koordinat' => $this->request->getPost('koordinat'),
            'kode_kecamatan' => $this->request->getPost('kode_kecamatan')
        ]);

        // Redirect ke halaman daftar sekolah
        return redirect()->to('/sekolah');
    }

    // Metode untuk menghapus data sekolah
    public function delete($npsn)
    {
        // Hapus data sekolah berdasarkan NPSN
        $this->sekolahModel->delete($npsn);

        // Redirect ke halaman daftar sekolah
        return redirect()->to('/sekolah');
    }
}
