<?php

namespace App\Controllers;

use PHPUnit\Util\Json;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function dashboard(){
        $jadwal = null;
        // if(session()->get('user')['namaRole'] == "user"){
        //     $jadwal = $this->jadwalModel->findJadwalById(session()->get('user')['cusId']);
        // }
        $data = array(
            'title'     => "Dashboard",
            'folder'    => "Customer",
            'jadwal'    => $jadwal
        );
        return view('Admin/dashboard',$data);
    }

//     public function findJadwal(){
// return Json($this->jadwalModel->findJadwalById(session()->get('user')['cusId']));
//     }
}
