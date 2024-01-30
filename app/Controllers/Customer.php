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

    public function reward()
    {
        $id = intval(session()->get('user')['cusId']);
        $dataPoint = $this->rewardModel->where('customer_id',$id)->get()->getRowArray();
        $data = array(
            'title'     => "Tukar Kupon",
            'folder'    => "Customer",
            'myPoint'   => $this->rewardModel->getCustomerPoint($id),
            'dataRedeem'    => $this->redeemModel->where('point_reward_id',$dataPoint['id'])->get()->getResultArray()
        );
        return view('Customer/reward', $data);
    }

    public function redeem(){
        $id = intval(session()->get('user')['cusId']);

        $data = $this->request->getPost();
        $myPoint = intval($data['myPoint']);
        $rewardPoint = intval($data['reward']);
        if($rewardPoint > $myPoint){
            return redirect()->back()->with('error', 'Poin Anda Kurang!');
        }

        $rewardData = $this->rewardModel->where('customer_id',$id)->get()->getRowArray();
        if(!$rewardData){
            return redirect()->back()->with('error', 'Poin Anda Kurang!');
        }

        $reward = ($rewardPoint == 10) ? "Aqua" : (($rewardPoint == 15) ? "Teh Botol" : "Pocari");
        $token = $this->generateRandomString();
        $insertes = array(
            'reward'            => $reward,
            'token'             => $token,
            'point_digunakan'   => $rewardPoint,
            'point_reward_id'   => $rewardData['id'],
        );
        if ($this->redeemModel->insert($insertes)) {
            return redirect()->back()->with('success', 'Redeem berhasil');
        }
        return redirect()->back()->with('error', 'Redeem gagal');
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ!?';
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $randomString;
    }
}
