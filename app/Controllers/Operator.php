<?php

// namespace App\Controllers;

// use CodeIgniter\Controller;

// class Operator extends Controller
// {
//     public function index()
//     {
//         $session = session();
//         if (!$session->get('loggedin') || $session->get('role') !== 'operator') {
//             return redirect()->to('login');
//         }
//         return view('operator');
//     }
// }

namespace App\Controllers;

class Operator extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }
        $data['role'] = session()->get('role');
        $data['nama'] = session()->get('nama');
        return view('operator/operator', $data);
    }
}