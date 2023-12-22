<?php

namespace App\Controllers;

use PHPUnit\Util\Json;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function dashboard()
    {
        $jadwal = null;
        // if(session()->get('user')['namaRole'] == "user"){
        //     $jadwal = $this->jadwalModel->findJadwalById(session()->get('user')['cusId']);
        // }
        if (session()->get('user')['namaRole'] == "user") {
            $data = array(
                'title'     => "Dashboard",
                'folder'    => "Customer",
                'jadwal'    => $jadwal
            );
        } else {
            $data = array(
                'title'     => "Dashboard",
                'folder'    => "Customer",
                'jumlahCustomer'    => $this->customerModel->countAllResults(),
                'jumlahServis'      => implode(" ",$this->itemServiceModel->jumlahService()),
                'jumlahKritik'      => implode(' ', $this->kritikModel->allKritik()),
                'jumlahBarang'      => implode(' ', $this->barangModel->allBarang())
            );
        }
        return view('Admin/dashboard', $data);
    }

    //     public function findJadwal(){
    // return Json($this->jadwalModel->findJadwalById(session()->get('user')['cusId']));
    //     }

    public function jadwalService()
    {
        $id = session()->get('user')['cusId'];
        $data = $this->jadwalModel->findJadwalById($id);

        return $this->response->setJSON($data);
    }
    public function tipeMotor()
    {
        $data = $this->customerModel->getTipeMotor();

        return $this->response->setJSON($data);
    }
}
