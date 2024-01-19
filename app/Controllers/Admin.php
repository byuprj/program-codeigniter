<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        //tampilkan halaman admin
        return view('admin/index');
        
        
    }
}
