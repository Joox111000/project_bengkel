<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        //
    }

    public function barang()
    {
        $data = array(
            'title'     => "Barang",
            'folder'    => "Admin",
            'barang'    => $this->barangModel->findAll()
        );

        return view('Admin/inventori', $data);
    }
    public function addBarang()
    {
        $data = $this->request->getPost();
        $insertBarang = array(
            'nama'      => $data['nama'],
            'merk'      => $data['merk'],
            'tipe'     => $data['tipe'],
        );
        if ($this->barangModel->insert($insertBarang)) {
            return redirect()->back()->with('success', 'Data Barang berhasil diinput');
        }
        return redirect()->back()->with('error', 'Data Barang gagal diinput');
    }
    public function editBarang()
    {
        $data = $this->request->getPost();

        $updateBarang = array(
            'nama'      => $data['nama'],
            'merk'      => $data['merk'],
            'tipe'     => $data['tipe'],
        );
        if ($this->barangModel->update($data['id'], $updateBarang)) {
            return redirect()->back()->with('success', 'Data Barang berhasil di Edit');
        }
        return redirect()->back()->with('error', 'Data Barang gagal di Edit');
    }
    public function deleteBarang()
    {
        $data = $this->request->getPost();

        $delBarang = $this->barangModel->delete($data['id']);
        if ($delBarang) {
            return redirect()->back()->with('success', 'Data Barang berhasil di Hapus');
        }
        return redirect()->back()->with('error', 'Data Barang gagal di Hapus');
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
                'telepon'        => $data['telepon'],
                'akun_id'   => $this->akunModel->getInsertID()
            );
            if ($this->customerModel->insert($insertCustomer)) {
                return redirect()->back()->with('success', 'Data Customer berhasil diinput');
            }
            return redirect()->back()->with('error', 'Data Customer gagal diinput');
        }
    }
    public function editCustomer()
    {
        $data = $this->request->getPost();

        $plat = $data['plat1'] . "," . $data['plat2'] . "," . $data['plat3'];
        $dataUpdate = array(
            'nama'      => $data['nama'],
            'plat'      => $plat,
            'jenis'     => $data['jenis'],
            'cc'        => $data['cc'],
            'telepon'        => $data['telepon'],
        );
        if ($this->customerModel->update($data['id'], $dataUpdate)) {
            return redirect()->back()->with('success', 'Data Customer berhasil di Edit');
        }
        return redirect()->back()->with('error', 'Data Customer gagal di Edit');
    }

    public function deleteCustomer()
    {
        $data = $this->request->getPost();

        $delCust = $this->customerModel->delete($data['id']);
        $delAkun = $this->akunModel->delete($data['accountId']);
        if ($delAkun && $delCust) {
            return redirect()->back()->with('success', 'Data Customer berhasil di Hapus');
        }
        return redirect()->back()->with('error', 'Data Customer gagal di Hapus');
    }


    public function tabelService()
    {
        $data = array(
            'title'     => "Item Service",
            'folder'    => "Admin",
            'item'  => $this->itemServiceModel->findAll()
        );

        return view('Admin/tabel_service', $data);
    }

    public function addItem()
    {
        $data = $this->request->getPost();
        $insertBarang = array(
            'nama'      => $data['nama'],
            'frekuensi'      => $data['frekuensi'],
        );
        if ($this->itemServiceModel->insert($insertBarang)) {
            return redirect()->back()->with('success', 'Data Service berhasil diinput');
        }
        return redirect()->back()->with('error', 'Data Service gagal diinput');
    }

    public function editItem()
    {
        $data = $this->request->getPost();

        $updateBarang = array(
            'nama'      => $data['nama'],
            'frekuensi'      => $data['frekuensi'],
        );
        if ($this->itemServiceModel->update($data['id'], $updateBarang)) {
            return redirect()->back()->with('success', 'Data Service berhasil di Edit');
        }
        return redirect()->back()->with('error', 'Data Service gagal di Edit');
    }
    public function deleteItem()
    {
        $data = $this->request->getPost();

        $delBarang = $this->itemServiceModel->delete($data['id']);
        if ($delBarang) {
            return redirect()->back()->with('success', 'Data Service berhasil di Hapus');
        }
        return redirect()->back()->with('error', 'Data Service gagal di Hapus');
    }
}
