<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-17 19:06:43
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-17 23:13:02
 */

class BiayaAssetController extends CI_Controller
{
    //File Constructor
    public function __construct()
    {
        parent::__construct();

        $session = $this->session->userdata('loggedIn');
        $role    = $this->session->userdata('role');
        if ($session == false) {
            $this->session->set_flashdata('pesan', 'maaf, anda belum melakukan login');
            return redirect('/');
        } else {
            if ($role == 'ROLE_USER') {
                $this->session->set_flashdata('pesan', 'maaf, anda tidak memiliki hak akses untuk halaman tersebut');
                return redirect('/');
            }
        }

        $this->load->model('BiayaAsset'); //load model BiayaAsset yang berada di folder model
    }

    //Menampilkan Data Biaya Asset
    public function index()
    {
        $data['record'] = $this->BiayaAsset->ambilBiayaAsset();
        $this->load->view('admin/BiayaAssetIndexView', $data);
    }

    //Menampilkan Form Untuk Menambah Data Biaya Asset
    public function tambahBiayaAsset()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        $this->load->view('admin/BiayaAssetTambahView', $csrf);
    }

    //Untuk Menyimpan Data Pembiayaan Ke Dalam Tabel Biaya Asset
    public function simpanBiayaAsset()
    {
        $kode_inventaris   = $this->input->post('kode_inventaris');
        $sumber            = $this->input->post('sumber');
        $keterangan        = $this->input->post('keterangan');
        $biaya             = $this->input->post('biaya');
        $replaceRpBiaya    = str_replace("Rp ", "", explode(".", $biaya)[0]);
        $replaceTitikBiaya = str_replace(",", "", $replaceRpBiaya);

        $data = array(
            'id_biaya_asset'  => $this->uuid->v4(),
            'kode_inventaris' => $kode_inventaris,
            'sumber'          => $sumber,
            'keterangan'      => $keterangan,
            'biaya'           => $replaceTitikBiaya,
        );

        $this->BiayaAsset->simpanBiayaAsset($data);

        return redirect('admin/BiayaAssetController/index');
    }

}
