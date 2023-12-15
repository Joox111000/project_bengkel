<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Customer extends BaseController
{
    public function index()
    {
        $plat = explode(',', session()->get('user')['cusPlat']);
        $dataToFind = strtoupper($plat[0] . ',' . $plat[1] . ',' . $plat[2]);
        $findId = $this->customerModel->findPlat($dataToFind);

        $hasil = null;
        if ($findId) {
            $hasil = $this->riwayatServiceModel->cariRiwayatByCustomer($findId);
        }
        $data = array(
            'title'     => "Riwayat Service",
            'folder'    => "Customer",
            'hasil'     => $hasil
        );

        return view('Customer/riwayat', $data);
    }

    public function aduan(){
        $data = array(
            'title'     => "Kotak Saran",
            'folder'    => "Customer",
        );

        return view('Customer/aduan', $data);  
    }

    public function kirim(){
        $data = $this->request->getPost();
        $insertes = array(
'customer_id'       => intval(session()->get('user')['cusId']),
'pesan'             => $data['aduan']
        );
        if ($this->kritikModel->insert($insertes)) {
            return redirect()->back()->with('success', 'Kritik berhasil diKirim');
        }
        return redirect()->back()->with('error', 'Kritik gagal diKirim');
    }
}
