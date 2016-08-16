<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-15 13:58:58
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-16 06:49:17
 */

class AnggotaController extends CI_Controller
{
    //File Constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota'); //load model Anggota yang berada di folder model
    }

    //Menampilkan Data Anggota
    public function index()
    {
        $data['record'] = $this->Anggota->ambilAnggota();
        $this->load->view('TampilAnggotaView', $data);
    }

    //Menampilkan Form Untuk Menambah Data Anggota
    public function tambahAnggota()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        $this->load->view('TambahAnggotaView', $csrf);
    }

    //Untuk Menyimpan Data Anggota Ke Dalam Tabel Anggota
    public function simpanAnggota()
    {
        $id_anggota          = $this->input->post('id_anggota');
        $nama                = $this->input->post('nama');
        $tanggal_pendaftaran = $this->input->post('tanggal_pendaftaran');
        $telepon             = $this->input->post('telepon');
        $tempat_lahir        = $this->input->post('tempat_lahir');
        $tanggal_lahir       = $this->input->post('tanggal_lahir');
        $jenis_kelamin       = $this->input->post('jenis_kelamin');
        $rembug              = $this->input->post('rembug');
        $setoran_awal        = $this->input->post('setoran_awal');
        $alamat              = $this->input->post('alamat');
        $status              = $this->input->post('status');
        $username            = $this->input->post('username');

        $data = array(
            'id_anggota'          => $id_anggota,
            'nama'                => $nama,
            'tanggal_pendaftaran' => $tanggal_pendaftaran,
            'telepon'             => $telepon,
            'tempat_lahir'        => $tempat_lahir,
            'tanggal_lahir'       => $tanggal_lahir,
            'jenis_kelamin'       => $jenis_kelamin,
            'rembug'              => $rembug,
            'setoran_awal'        => $setoran_awal,
            'alamat'              => $alamat,
            'status'              => $status,
            'username'            => $username);

        $this->Anggota->simpanAnggota($data);

        redirect('AnggotaController/index');
    }

    //Ambil 1 Data Anggota Lalu Menampilkan Halaman Edit Anggota
    public function editAnggota($id_anggota)
    {
        $data = array(
            'record' => $this->Anggota->ambilSatuAnggota($id_anggota),
            'name'   => $this->security->get_csrf_token_name(),
            'hash'   => $this->security->get_csrf_hash(),
        );
        $this->load->view('EditAnggotaView', $data);
    }

    //Update 1 Data Anggota
    public function UpdateAnggota()
    {
        $id_anggota          = $this->input->post('id_anggota');
        $nama                = $this->input->post('nama');
        $tanggal_pendaftaran = $this->input->post('tanggal_pendaftaran');
        $telepon             = $this->input->post('telepon');
        $tempat_lahir        = $this->input->post('tempat_lahir');
        $tanggal_lahir       = $this->input->post('tanggal_lahir');
        $jenis_kelamin       = $this->input->post('jenis_kelamin');
        $rembug              = $this->input->post('rembug');
        $setoran_awal        = $this->input->post('setoran_awal');
        $alamat              = $this->input->post('alamat');
        $status              = $this->input->post('status');
        $username            = $this->input->post('username');

        $data = array(
            'nama'                => $nama,
            'tanggal_pendaftaran' => $tanggal_pendaftaran,
            'telepon'             => $telepon,
            'tempat_lahir'        => $tempat_lahir,
            'tanggal_lahir'       => $tanggal_lahir,
            'jenis_kelamin'       => $jenis_kelamin,
            'rembug'              => $rembug,
            'setoran_awal'        => $setoran_awal,
            'alamat'              => $alamat,
            'status'              => $status,
            'username'            => $username);

        $this->Anggota->updateAnggota($id_anggota, $data);

        redirect('AnggotaController/index');
    }

    //Untuk Menghapus Data Anggota
    public function hapusAnggota($id_anggota)
    {
        $this->Anggota->hapusAnggota($id_anggota);
        redirect('AnggotaController/index');
    }

}
