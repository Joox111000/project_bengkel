<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        //
    }

    public function inventori()
    {
        $data = array(
            'title'     => "Inventori",
            'folder'    => "Admin"
        );

        return view('Admin/inventori', $data);
    }

    public function customer()
    {
        $data = array(
            'title'     => "Data Customer",
            'folder'    => "Admin",
            'customer'  => $this->customerModel->allData()
        );

        return view('Admin/customer', $data);
    }
    public function addCustomer()
    {
        $data = $this->request->getPost();

        $plat = $data['plat1'] . "," . $data['plat2'] . "," . $data['plat3'];
        $insertAkun = array(
            'email'     => $data['email'],
            'password'  => sha1($data['password']),
            'role_id'   => 2
        );


        if ($this->akunModel->insert($insertAkun)) {
            $insertCustomer = array(
                'nama'      => $data['nama'],
                'plat'      => $plat,
                'jenis'     => $data['jenis'],
                'cc'        => $data['cc'],
                'akun_id'   => $this->akunModel->getInsertID()
            );
            if ($this->customerModel->insert($insertCustomer)) {
                return redirect()->back()->with('success', 'Data Customer berhasil diinput');
            }
            return redirect()->back()->with('error', 'Data Customer gagal diinput');
        }
    }
}
