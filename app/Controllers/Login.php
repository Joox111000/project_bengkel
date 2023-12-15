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

        $dataLogin = $this->akunModel->dataLogin($data['username']);
    
        if($dataLogin && sha1( $data['password']) == $dataLogin['password']){
            if($dataLogin['namaRole'] != "admin"){
                $dataLogin = $this->akunModel->dataLoginCustomer($data['username']);
            }
session()->set('user',$dataLogin);
            return redirect()->to(base_url("Home/dashboard"));
        }
        return redirect()->back()->with('error','email atau password salah');
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('/Login/index'));
    }
}
