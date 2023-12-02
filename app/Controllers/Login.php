<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        return view("Login/index");
    }

    public function auth(){
        $data = $this->request->getPost();

        $dataLogin = $this->akunModel->where('email',$data['username'])->first();
        if($dataLogin && sha1( $data['password']) == $dataLogin['password']){
            return redirect()->to(base_url("Home/dashboard"));
        }
        return redirect()->back()->with('error','email atau password salah');
    }
}
