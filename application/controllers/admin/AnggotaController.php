<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-15 13:58:58
 * @Last Modified by:   adhibarfan
 * @Last Modified time: 2016-08-17 11:25:16
 */

class AnggotaController extends CI_Controller
{
    //File Constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota'); //load model Anggota yang berada di folder model
        $this->load->model('User'); //load model User yang berada di folder model
    }

    //Menampilkan Data Anggota
    public function index()
    {
        $data['record'] = $this->Anggota->ambilAnggota();
        $this->load->view('admin/AnggotaIndexView', $data);
    }

    //Menampilkan Form Untuk Menambah Data Anggota
    public function tambahAnggota()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        $this->load->view('admin/AnggotaTambahView', $csrf);
    }

    //Untuk Menyimpan Data Anggota Ke Dalam Tabel Anggota
    public function simpanAnggota()
    {

        $pisah   = explode('/', $this->input->post('tanggal_lahir'));
        $urutan  = array($pisah[2], $pisah[1], $pisah[0]);
        $satukan = implode('-', $urutan);

        $nama                = $this->input->post('nama');
        $tanggal_pendaftaran = date('Y-m-d');
        $telepon             = $this->input->post('telepon');
        $tempat_lahir        = $this->input->post('tempat_lahir');
        $tanggal_lahir       = $satukan;
        $jenis_kelamin       = $this->input->post('jenis_kelamin');
        $rembug              = $this->input->post('rembug');
        $setoran_awal        = $this->input->post('setoran_awal');
        $alamat              = $this->input->post('alamat');
        $status              = $this->input->post('status');
        $username            = $this->input->post('username');

        $kode_rembug = "";
        $id          = 0;
        $kode        = "";
        if ($rembug == "Dewan") {
            $kode_rembug = "DW";
        } else if ($rembug == "Surya Legi Nyata") {
            $kode_rembug = "SL";
        } else if ($rembug == "Pratama") {
            $kode_rembug = "PR";
        } else if ($rembug == "Maju Bersama") {
            $kode_rembug = "MB";
        } else if ($rembug == "Arafah") {
            $kode_rembug = "AR";
        } else if ($rembug == "Bunga Raya") {
            $kode_rembug = "BR";
        } else if ($rembug == "Mawar") {
            $kode_rembug = "MW";
        } else if ($rembug == "Al-Falah") {
            $kode_rembug = "AF";
        } else if ($rembug == "Kartun") {
            $kode_rembug = "KT";
        } else if ($rembug == "Bougenville") {
            $kode_rembug = "BG";
        } else if ($rembug == "Matahari") {
            $kode_rembug = "MT";
        } else if ($rembug == "Teratai") {
            $kode_rembug = "TR";
        } else if ($rembug == "Mina") {
            $kode_rembug = "MN";
        } else if ($rembug == "Asoka") {
            $kode_rembug = "AS";
        } else if ($rembug == "LaaTanza") {
            $kode_rembug = "LT";
        }

        if ($this->Anggota->ambilCountAnggota() == 0) {
            $kode = $kode_rembug . '-0001';
            $id   = 1;
        } else {
            $hasilSubString = substr($this->Anggota->ambilDataAnggotaTerbaru()[0]->id_anggota, 3);
            $noUrutTest     = $hasilSubString + 1;
            $id             = $noUrutTest;
            if ($noUrutTest >= 2 && $noUrutTest <= 9) {
                $kode = $kode_rembug . '-000' . $noUrutTest;
            } else if ($noUrutTest >= 10 && $noUrutTest <= 99) {
                $kode = $kode_rembug . '-00' . $noUrutTest;
            } else if ($noUrutTest >= 100 && $noUrutTest <= 999) {
                $kode = $kode_rembug . '-0' . $noUrutTest;
            } else if ($noUrutTest >= 1000 && $noUrutTest <= 9999) {
                $kode = $kode_rembug . '-' . $noUrutTest;
            }
        }

        $hash = $this->bcrypt->hash_password($this->input->post('password'));
        $user = array(
            'username' => $this->input->post('username'),
            'password' => $hash,
            'role'     => 'ROLE_USER',
        );

        $this->User->simpanUser($user);

        $data = array(
            'id_anggota'          => $kode,
            'id'                  => $id,
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

        redirect('admin/AnggotaController/index');
    }

    //Ambil 1 Data Anggota Lalu Menampilkan Halaman Edit Anggota
    public function editAnggota($id_anggota)
    {
        $data = array(
            'record' => $this->Anggota->ambilSatuAnggota($id_anggota),
            'name'   => $this->security->get_csrf_token_name(),
            'hash'   => $this->security->get_csrf_hash(),
        );
        $this->load->view('admin/AnggotaEditView', $data);
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

        redirect('admin/AnggotaController/index');
    }

    //Untuk Menghapus Data Anggota
    public function hapusAnggota($id_anggota)
    {
        $this->Anggota->hapusAnggota($id_anggota);
        redirect('admin/AnggotaController/index');
    }

}
