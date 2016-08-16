<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-16 06:10:55
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-16 06:52:22
 */

class AngsuranPembiayaanController extends CI_Controller
{
    //File Constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AngsuranPembiayaan'); //load model AngsuranPembiayaan yang berada di folder model
    }

    //Menampilkan Data Angsuran Pembiayaan
    public function index()
    {
        $data['record'] = $this->AngsuranPembiayaan->ambilAngsuranPembiayaan();
        $this->load->view('TampilAngsuranPembiayaanView', $data);
    }

    //Tampilkan Halaman Tambah Angsuran Pembiayaan
    public function tambahAngsuranPembiayaan()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        $this->load->view('TambahAngsuranPembiayaanView', $csrf);
    }

    //Untuk Menyimpan Data Angsuran Pembiayaan Ke Dalam Tabel Angsuran Pembiayaan
    public function simpanAngsuranPembiayaan()
    {
        $id_angsuran_pembiayaan      = $this->input->post('id_angsuran_pembiayaan');
        $tanggal_pembayaran_angsuran = $this->input->post('tanggal_pembayaran_angsuran');
        $bagi_hasil_koperasi         = $this->input->post('bagi_hasil_koperasi');
        $bagi_hasil_anggota          = $this->input->post('bagi_hasil_anggota');
        $keterangan                  = $this->input->post('keterangan');
        $id_pembiayaan               = $this->input->post('id_pembiayaan');

        $data = array(
            'id_angsuran_pembiayaan'      => $id_angsuran_pembiayaan,
            'tanggal_pembayaran_angsuran' => $tanggal_pembayaran_angsuran,
            'bagi_hasil_koperasi'         => $bagi_hasil_koperasi,
            'bagi_hasil_anggota'          => $bagi_hasil_anggota,
            'keterangan'                  => $keterangan,
            'id_pembiayaan'               => $id_pembiayaan);

        $this->AngsuranPembiayaan->simpanAngsuranPembiayaan($data);

        redirect('AngsuranPembiayaanController/index');
    }

}
