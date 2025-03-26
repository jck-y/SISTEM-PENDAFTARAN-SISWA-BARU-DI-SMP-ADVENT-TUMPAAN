<?php
namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }
        $data['role'] = session()->get('role');
        $data['nama'] = session()->get('nama');
        return view('admin/admin', $data);
    }
}