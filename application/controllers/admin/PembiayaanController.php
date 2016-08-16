<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-15 13:09:46
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-16 06:51:02
 */

class PembiayaanController extends CI_Controller
{
    //File Constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembiayaan'); //load model Pembiayaan yang berada di folder model
    }

    //Menampilkan Data Pembiayaan
    public function index()
    {
        $data['record'] = $this->Pembiayaan->ambilPembiayaan();
        $this->load->view('TampilPembiayaanView', $data);
    }

    //Tampilkan Halaman Tambah Pembiayaan
    public function tambahPembiayaan()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        $this->load->view('TambahPembiayaanView', $csrf);
    }

    //Untuk Menyimpan Data Pembiayaan Ke Dalam Tabel Pembiayaan
    public function simpanPembiayaan()
    {
        $id_pembiayaan       = $this->input->post('id_pembiayaan');
        $tanggal_peminjaman  = $this->input->post('tanggal_peminjaman');
        $tanggal_jatuh_tempo = $this->input->post('tanggal_jatuh_tempo');
        $pembiayaan          = $this->input->post('pembiayaan');
        $biaya_administrasi  = $this->input->post('biaya_administrasi');
        $jenis_pembiayaan    = $this->input->post('jenis_pembiayaan');
        $margin              = $this->input->post('margin');
        $total_pembiayaan    = $this->input->post('total_pembiayaan');
        $status              = $this->input->post('status');
        $id_anggota          = $this->input->post('id_anggota');

        $data = array(
            'id_pembiayaan'       => $id_pembiayaan,
            'tanggal_peminjaman'  => $tanggal_peminjaman,
            'tanggal_jatuh_tempo' => $tanggal_jatuh_tempo,
            'pembiayaan'          => $pembiayaan,
            'biaya_administrasi'  => $biaya_administrasi,
            'jenis_pembiayaan'    => $jenis_pembiayaan,
            'margin'              => $margin,
            'total_pembiayaan'    => $total_pembiayaan,
            'status'              => $status,
            'id_anggota'          => $id_anggota);

        $this->Pembiayaan->simpanPembiayaan($data);

        redirect('PembiayaanController/index');
    }

}
