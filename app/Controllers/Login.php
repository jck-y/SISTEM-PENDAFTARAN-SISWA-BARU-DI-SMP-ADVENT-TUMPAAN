<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function process()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Define user credentials
        $users = [
            'admin' => [
                'password' => 'admin',
                'role' => 'admin',
                'redirect' => 'admin'
            ],
            'operator' => [
                'password' => 'operator',
                'role' => 'operator',
                'redirect' => 'operator'
            ],
            'kepsek' => [
                'password' => 'kepsek',
                'role' => 'kepsek',
                'redirect' => 'kepsek'
            ]
        ];

        if (isset($users[$username]) && $users[$username]['password'] === $password) {
            $session->set([
                'loggedin' => true,
                'username' => $username,
                'role' => $users[$username]['role']
            ]);
            return redirect()->to($users[$username]['redirect']);
        } else {
            return redirect()->to('login')->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}