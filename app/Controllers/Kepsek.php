<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Kepsek extends Controller
{
    public function index()
    {
        $session = session();
        if (!$session->get('loggedin') || $session->get('role') !== 'kepsek') {
            return redirect()->to('login');
        }
        return view('kepsek');
    }
}