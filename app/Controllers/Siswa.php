<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Siswa extends Controller
{
    public function index()
    {
        $session = session();
        if (!$session->get('loggedin') || $session->get('role') !== 'siswa') {
            return redirect()->to('login');
        }
        return view('siswa');
    }
}