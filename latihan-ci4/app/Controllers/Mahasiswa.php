<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{

    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        $mahasiswa = $this->mahasiswaModel->get();

        $data = [
            'title' => 'Mahasiswa',
            'mahasiswa' => $mahasiswa
        ];

        return view('mahasiswa/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Mahasiswa',
            'validation' => \Config\Services::validation(),
        ];

        return view('mahasiswa/create', $data);
    }

    public function save()
    {
        // dd($this->request->getVar());

        $rules = [
            'nama' => ['rules' => 'required', 'errors' => ['required' => 'Nama tidak boleh kosong']],
            'nim' => ['rules' => 'required', 'errors' => ['required' => 'Nim tidak boleh kosong']],
        ];

        if (!$this->validate($rules)) {
            // $validation = \Config\Services::validation();
            // dd($validation);

            // withInput(); disimpan ke dalam session
            return redirect()->to('/mahasiswa/create')->withInput();
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
        ];

        $this->mahasiswaModel->save($data);
        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to('/mahasiswa');
    }

    public function edit($id_mahasiswa)
    {
        $data = [
            'title' => 'Ubah Mahasiswa',
            'validation' => \Config\Services::validation(),
            'mahasiswa' => $this->mahasiswaModel->getId($id_mahasiswa)
        ];

        return view('mahasiswa/edit', $data);
    }

    public function update($id_mahasiswa)
    {
        $rules = [
            'nama' => ['rules' => 'required', 'errors' => ['required' => 'Nama tidak boleh kosong']],
            'nim' => ['rules' => 'required', 'errors' => ['required' => 'Nim tidak boleh kosong']],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/mahasiswa/edit/' . $id_mahasiswa)->withInput();
        }

        $data = [
            'id_mahasiswa' => $id_mahasiswa,
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
        ];

        $this->mahasiswaModel->save($data);
        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to('/mahasiswa');
    }

    public function delete($id_mahasiswa)
    {
        $this->mahasiswaModel->delete($id_mahasiswa);
        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/mahasiswa');
    }
}
