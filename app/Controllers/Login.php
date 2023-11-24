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
        if($data['username'] == "sandi" && $data['password'] == "abc"){
            return redirect()->to(base_url("Home/dashboard"));
        }
        return redirect()->to(base_url("Login/index"));
    }
}
