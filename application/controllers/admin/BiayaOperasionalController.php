<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-17 18:54:59
 * @Last Modified by:   adhibarfan
 * @Last Modified time: 2016-08-18 15:51:48
 */

class BiayaOperasionalController extends CI_Controller
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

        $this->load->model('BiayaOperasional'); //load model BiayaOperasional yang berada di folder model
    }

    //Menampilkan Data Biaya Operasional
    public function index()
    {
        $data['record'] = $this->BiayaOperasional->ambilBiayaOperasional();
        $this->load->view('admin/BiayaOperasionalIndexView', $data);
    }

    //Menampilkan Form Untuk Menambah Data Biaya Operasional
    public function tambahBiayaOperasional()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        $this->load->view('admin/BiayaOperasionalTambahView', $csrf);
    }

    //Untuk Menyimpan Data Pembiayaan Ke Dalam Tabel Biaya Operasional
    public function simpanBiayaOperasional()
    {
        $tanggal_transaksi = $this->input->post('tanggal_transaksi');

        $pisah   = explode('/', $tanggal_transaksi);
        $urutan  = array($pisah[2], $pisah[1], $pisah[0]);
        $satukan = implode('-', $urutan);

        $jenis_beban       = $this->input->post('jenis_beban');
        $keterangan        = $this->input->post('keterangan');
        $biaya             = $this->input->post('biaya');
        $replaceRpBiaya    = str_replace("Rp ", "", explode(".", $biaya)[0]);
        $replaceTitikBiaya = str_replace(",", "", $replaceRpBiaya);

        $data = array(
            'id_biaya_operasional' => $this->uuid->v4(),
            'tanggal_transaksi'    => $satukan,
            'jenis_beban'          => $jenis_beban,
            'keterangan'           => $keterangan,
            'biaya'                => $replaceTitikBiaya,
        );

        $this->BiayaOperasional->simpanBiayaOperasional($data);

        return redirect('admin/BiayaOperasionalController/index');
    }

}
