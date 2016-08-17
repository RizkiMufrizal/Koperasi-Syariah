<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-16 06:20:21
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-17 23:13:34
 */

class PinjamanInstanController extends CI_Controller
{
    //File Constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PinjamanInstan'); //load model Pinjaman yang berada di folder model
    }

    //Menampilkan Data Pinjaman Instan
    public function index()
    {
        $data['record'] = $this->PinjamanInstan->ambilPinjamanInstan();
        $this->load->view('TampilPinjamanInstanView', $data);
    }

    //Menampilkan Form Untuk Menambah Data Pinjaman Instan
    public function tambahPinjamanInstan()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        $this->load->view('TambahPinjamanInstanView', $csrf);
    }

    //Untuk Menyimpan Data Pinjaman Instan Ke Dalam Tabel Pinjaman Instan
    public function simpanPinjamanInstan()
    {
        $id_peminjaman_instan = $this->input->post('id_peminjaman_instan');
        $tanggal_peminjaman   = $this->input->post('tanggal_peminjaman');
        $tanggal_jatuh_tempo  = $this->input->post('tanggal_jatuh_tempo');
        $tanggal_pengembalian = $this->input->post('tanggal_pengembalian');
        $pinjaman             = $this->input->post('pinjaman');
        $pengembalian         = $this->input->post('pengembalian');
        $bagi_hasil           = $this->input->post('bagi_hasil');
        $biaya_administrasi   = $this->input->post('biaya_administrasi');
        $keterangan           = $this->input->post('keterangan');
        $id_anggota           = $this->input->post('id_anggota');

        $data = array(
            'id_peminjaman_instan' => $id_peminjaman_instan,
            'tanggal_peminjaman'   => tanggal_peminjaman,
            'tanggal_jatuh_tempo'  => tanggal_jatuh_tempo,
            'tanggal_pengembalian' => tanggal_pengembalian,
            'pinjaman'             => pinjaman,
            'pengembalian'         => pengembalian,
            'bagi_hasil'           => bagi_hasil,
            'biaya_administrasi'   => biaya_administrasi,
            'keterangan'           => keterangan,
            'id_anggota'           => $id_anggota);

        $this->PinjamanInstan->simpanPinjamanInstan($data);

        return redirect('PinjamanInstanController/index');
    }

    //Ambil 1 Data Pinjaman Instan Lalu Menampilkan Halaman Edit Pinjaman Instan
    public function editPinjamanInstan($id_peminjaman_instan)
    {
        $data = array(
            'record' => $this->PinjamanInstan->ambilSatuPinjamanInstan($id_peminjaman_instan),
            'name'   => $this->security->get_csrf_token_name(),
            'hash'   => $this->security->get_csrf_hash(),
        );
        $this->load->view('EditPinjamanInstanView', $data);
    }

    //Update 1 Data Pinjaman Instan
    public function updatePinjamanInstan()
    {
        $id_peminjaman_instan = $this->input->post('id_peminjaman_instan');
        $tanggal_peminjaman   = $this->input->post('tanggal_peminjaman');
        $tanggal_jatuh_tempo  = $this->input->post('tanggal_jatuh_tempo');
        $tanggal_pengembalian = $this->input->post('tanggal_pengembalian');
        $pinjaman             = $this->input->post('pinjaman');
        $pengembalian         = $this->input->post('pengembalian');
        $bagi_hasil           = $this->input->post('bagi_hasil');
        $biaya_administrasi   = $this->input->post('biaya_administrasi');
        $keterangan           = $this->input->post('keterangan');
        $id_anggota           = $this->input->post('id_anggota');

        $data = array(
            'tanggal_peminjaman'   => tanggal_peminjaman,
            'tanggal_jatuh_tempo'  => tanggal_jatuh_tempo,
            'tanggal_pengembalian' => tanggal_pengembalian,
            'pinjaman'             => pinjaman,
            'pengembalian'         => pengembalian,
            'bagi_hasil'           => bagi_hasil,
            'biaya_administrasi'   => biaya_administrasi,
            'keterangan'           => keterangan,
            'id_anggota'           => $id_anggota);

        $this->PinjamanInstan->updatePinjamanInstan($id_peminjaman_instan, $data);

        return redirect('AnggotaController/index');
    }

}
