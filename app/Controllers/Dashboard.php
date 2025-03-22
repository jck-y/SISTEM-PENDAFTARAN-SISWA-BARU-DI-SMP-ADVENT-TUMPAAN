<?php
namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard/admin');
    }
    public function siswa()
    {
        return view('dashboard/admin2');
    }
}