<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AllDoctors extends Controller
{
    public function index()
    {
        // Mengembalikan view untuk halaman All Doctors
        return view('all_doctors');
    }
}
