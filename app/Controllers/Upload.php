<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Upload extends Controller
{
    public function index()
    {
        return view('upload_dokumen');
    }

    public function process()
    {
        $validationRules = [
            'foto' => [
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
                'label' => 'Foto 3x4'
            ],
            'ijazah' => [
                'rules' => 'uploaded[ijazah]|mime_in[ijazah,image/jpg,image/jpeg,image/png,application/pdf]|max_size[ijazah,2048]',
                'label' => 'Ijazah'
            ],
            'akta' => [
                'rules' => 'uploaded[akta]|mime_in[akta,image/jpg,image/jpeg,image/png,application/pdf]|max_size[akta,2048]',
                'label' => 'Akta Kelahiran'
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file uploads
        $foto = $this->request->getFile('foto');
        $ijazah = $this->request->getFile('ijazah');
        $akta = $this->request->getFile('akta');

        // Move files to upload directory
        $foto->move(WRITEPATH . 'uploads/foto');
        $ijazah->move(WRITEPATH . 'uploads/ijazah');
        $akta->move(WRITEPATH . 'uploads/akta');

        // Add your database storage logic here

        return redirect()->to('success')->with('message', 'Documents uploaded successfully');
    }
}