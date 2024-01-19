<?php

namespace App\Controllers;
use App\Models\Authmodel;

class Auth extends BaseController
{
	public function __construct()
	{
		$this->auth = new AuthModel();
	}

    public function index()
    {
    	$data = [
            'judul'=>'Login Sistem',
            'subjudul'=>'Silahkan masukkan Username dan Password',
            'cart'=> \Config\Services::cart(),
            'menu'=>'Login',
            'submenu'=>'',
    		'record' => $this->auth->findAll(),
    	];
        return view('login',$data);
    }

    public function proseslogin()
    {
        if (! $this->validate([
            'username' => [
            'rules'=>"required",
            'errors'=>[
                'required'=>'Kolom Username Wajib di Isi',
            ]
        ],
            'password'  => [
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Kolom Password Wajib di Isi'
                ]
            ]
        ])) {
            // The validation failed.
            session()->setFlashdata('pesan','<div class="alert alert-danger">'.$this->validator->listErrors().'</div>');
                return redirect()->back()->withInput();
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cekdata = $this->auth->cekuser($username, $password)->getRow();
        if ($cekdata) {
            $this->session->set([
                'username' => $cekdata->Username,
                'level' => $cekdata->Level,
                'nama' => $cekdata->Nama,
                'statuslogin' => 'Y',
            ]);
            session()->setFlashdata('pesan','<div class="alert alert-success"><center>Berhasil Login</center></div>');
                return redirect()->to('/');
        }
        session()->setFlashdata('pesan','<div class="alert alert-danger"><center>Gagal Login</center></div>');
                return redirect()->to('login');
        //dd($data);
    }

    public function logout()
    {
        $this->session->destroy();
        session()->setFlashdata('pesan','<div class="alert alert-danger"><center>Berhasil Logout</center></div>');
                return redirect()->to('login');
        //dd($data);
    }
}