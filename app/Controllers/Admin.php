<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        $session = session();
        if (!$session->get('loggedin')) {
            return redirect()->to('login');
        }
        return view('admin');
    }
}