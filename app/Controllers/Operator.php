<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Operator extends Controller
{
    public function index()
    {
        $session = session();
        if (!$session->get('loggedin') || $session->get('role') !== 'operator') {
            return redirect()->to('login');
        }
        return view('operator');
    }
}