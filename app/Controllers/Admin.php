<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use DateTime;
use Exception;

class Admin extends BaseController
{
    public function index()
    {
        //
    }

    // READ Data
    public function barang()
    {
        $data = array(
            'title'     => "Barang",
            'folder'    => "Admin",
            'barang'    => $this->barangModel->findAll()
        );

        return view('Admin/inventori', $data);
    }

    // CREATE Data
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

    //UPDATE Data
    public function editBarang()
    {
        $data = $this->request->getPost();

        $updateBarang = array(
            'nama'      => $data['tes'],
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

        $dataService = $this->itemServiceModel->findAll();
        $arrId = [];
        foreach ($dataService as $d) {
            array_push($arrId, [intval($d['id']), intval($d['frekuensi']), $d['nama']]);
        }

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


                $jadwal = [];
                $cusId = $this->customerModel->getInsertID();
                $tanggal = new DateTime();

                foreach ($arrId as $newData) {
                    $tahun = $tanggal->format('Y');
                    $bulan = $tanggal->format('m');
                    $hari = $tanggal->format('d');
                    $addBulan = $newData[1];
                    $newBulan = intval($bulan + $addBulan);
                    if ($newBulan > 12) {
                        $newBulan -= 12;
                        $tahun += 1;
                    }
                    $dataJ = null;
                    $dataJ = array(
                        'customer_id' => $cusId,
                        'service_id' => $newData[0],
                        'date'      => $tahun . "-" . $newBulan . "-" . $hari
                    );
                    array_push($jadwal, $dataJ);
                }
                if ($this->jadwalModel->insertBatch($jadwal)) {
                    $pointToInsert = array(
                        'customer_id'       => $cusId
                    );
                    $this->rewardModel->insert($pointToInsert);
                    return redirect()->back()->with('success', 'Data Customer berhasil diinput');
                }
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
        $delJadwal = $this->jadwalModel->where('customer_id', $data['id'])->delete();
        $delRiwayat = $this->riwayatServiceModel->where('customer_id', $data['id'])->delete();
        $delCust = $this->customerModel->delete($data['id']);
        $delAkun = $this->akunModel->delete($data['accountId']);
        if ($delJadwal && $delRiwayat && $delCust && $delAkun) {
            return redirect()->back()->with('success', 'Data Customer berhasil di Hapus');
        }
        return redirect()->back()->with('error', 'Data Customer gagal di Hapus');
    }


    public function tabelService()
    {
        $data = array(
            'title'     => "Item Service",
            'folder'    => "Admin",
            'item'  => $this->itemServiceModel->getAll(),
            'barang'    => $this->barangModel->findAll()
        );
        return view('Admin/tabel_service', $data);
    }

    public function addItem()
    {
        $data = $this->request->getPost();
        $insertBarang = array(
            'nama'      => $data['nama'],
            'frekuensi'      => $data['frekuensi'],
            'barang_id'     => intval($data['barang'])
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

    public function pencarian()
    {
        $data = array(
            'title'     => "Cari Riwayat Service",
            'folder'    => "Admin",
            'hasil'     => null
        );

        return view('Admin/pencarian', $data);
    }
    public function resetPencarian()
    {
        return $this->pencarian();
    }

    public function cari()
    {
        $data = $this->request->getPost();


        $dataToFind = strtoupper($data['cari1'] . ',' . $data['cari2'] . ',' . $data['cari3']);
        $findId = $this->customerModel->findPlat($dataToFind);

        $hasil = null;
        if ($findId) {
            $hasil = $this->riwayatServiceModel->cariRiwayatByCustomer($findId);
        }
        $returnData = array(
            'title'     => "Cari Riwayat Service",
            'folder'    => "Admin",
            'hasil'     => $hasil,
        );
        if ($hasil) {
            return view('Admin/pencarian', $returnData);
        }
        return redirect()->back()->with('error', 'Data Service Tidak Ditemukan');
    }

    public function riwayat()
    {
        $data = array(
            'title'         => "Riwayat Service",
            'folder'        => "Admin",
            'data'          => $this->riwayatServiceModel->semuaRiwayat(),
            'cust'          => $this->customerModel->getCust(),
            'serv'          => $this->itemServiceModel->allService()
        );
        return view('Admin/riwayat', $data);
    }

    public function addCustomerService()
    {
        $data = $this->request->getPost();
        $selectedServices = $data['service']; // This will be an array

        // If you want to store it as a comma-separated string
        $tableServiceIds = implode(',', $selectedServices);

        $ids = [];
        foreach ($selectedServices as $ts) {
            $idService = $this->itemServiceModel->getServiceId($ts);
            array_push($ids, $idService);
        }
        $insertBarang = array(
            'table_service_id' => $tableServiceIds,
            'customer_id' => $data['plat'],
            'nama_mekanik' => $data['mekanik'],
            'nama_admin' => $data['admin'],
            'total_biaya' => $data['biaya'],
            'keluhan' => $data['keluhan'],
        );
        $pointReward = intval(intval($insertBarang['total_biaya']) / 5000);
        $dataReward = $this->rewardModel->where('customer_id',$insertBarang['customer_id'])->get()->getRowArray();
        $updatedPoint = intval(intval($dataReward['poin']) + $pointReward);
        if ($this->riwayatServiceModel->insert($insertBarang)) {
            $today = new DateTime();
            foreach ($ids as $idss) {
                $da = $this->jadwalModel->findId(intval($data['plat']), intval($idss['id']));
                if ($da) {
                    $tanggal = new DateTime($da['date']);
                    $tahun = intval($tanggal->format('Y'));
                    $bulan = intval($tanggal->format('m'));
                    $hari = $today->format('d');
                    $freq = intval($da['frekuensi']);
                    $newBulan = $bulan + $freq;
                    if ($newBulan > 12) {
                        $newBulan -= 12;
                        $tahun += 1;
                    }
                    $dataJ = null;
                    $dataJ = array(
                        'customer_id' => $da['customer_id'],
                        'service_id' => $da['service_id'],
                        'date'      => $tahun . "-" . $newBulan . "-" . $hari
                    );
                    $this->jadwalModel->update($da['id'], $dataJ);
                    
                }
            }

            $pointToAdd = array(
                'poin'     => $updatedPoint
            );
            $this->rewardModel->update($dataReward['id'], $pointToAdd);
            return redirect()->back()->with('success', 'Data Service berhasil diinput');
        }
        return redirect()->back()->with('error', 'Data Service gagal diinput');
    }

    public function aduan()
    {
        $data = array(
            'title'         => "Kotak Saran",
            'folder'        => "Admin",
            'data'          => $this->kritikModel->getKritik(),
        );
        return view('Admin/aduan', $data);
    }

    public function reward()
    {
        $data = array(
            'title'     => "Tukar Kupon",
            'folder'    => "Admin",
            'data'      => $this->redeemModel->getDataRedeem()
        );
        return view('Admin/reward', $data);
    }

    public function redeem()
    {
        $data = $this->request->getPost();

        $dataRedeem = $this->redeemModel->getDataByToken($data['token']);

        if(!$dataRedeem){
            return redirect()->back()->with('error', 'Token Salah!');
        }
        $idRedeem = intval($dataRedeem['id']);
        $idPoint = intval($dataRedeem['point_reward_id']);
        $usedPoint = intval($dataRedeem['point_digunakan']);

        $dataPoint = $this->rewardModel->find($idPoint);
        if(!$dataPoint){
            return redirect()->back()->with('error', 'Token Salah!');
        }
        $existingPoint = intval($dataPoint['poin']);
        $remainPoint = $existingPoint - $usedPoint;
        if($remainPoint < 0){
            return redirect()->back()->with('error', 'Point Tidak Mencukupi!');
        }

        $dataToUpdate = array(
            'poin'     => $remainPoint
        );

        $redeemSucced = array(
            'status'    => 1
        );
        if ($this->redeemModel->update($idRedeem, $redeemSucced) && $this->rewardModel->update($idPoint, $dataToUpdate)) {
            return redirect()->back()->with('success', 'Reward Berhasil di Redeem');
        }
        return redirect()->back()->with('error', 'Reward Gagal di Redeem');
    }
}
