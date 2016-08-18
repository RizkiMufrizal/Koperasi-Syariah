<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-16 06:20:21
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-18 14:57:35
 */

class PeminjamanInstanController extends CI_Controller
{
    //File Constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PeminjamanInstan'); //load model Pinjaman yang berada di folder model
        $this->load->model('User');
        $this->load->model('Anggota');
    }

    //Menampilkan Data Pinjaman Instan
    public function index($idAnggota)
    {
        $data['record'] = $this->PeminjamanInstan->ambilPeminjamanInstan($idAnggota);
        $this->load->view('admin/PeminjamanInstanIndexView', $data);
    }

    //Menampilkan Form Untuk Menambah Data Pinjaman Instan
    public function tambahPeminjamanInstan()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        $this->load->view('admin/PeminjamanInstanTambahView', $csrf);
    }

    //Untuk Menyimpan Data Pinjaman Instan Ke Dalam Tabel Pinjaman Instan
    public function simpanPeminjamanInstan($idAnggota)
    {
        $peminjamanInstanTerbaru = $this->PeminjamanInstan->ambilPeminjamanInstanTerbaru($idAnggota);

        if ($peminjamanInstanTerbaru == null) {
            $id_peminjaman_instan = $this->uuid->v4();

            $tanggal_peminjaman = $this->input->post('tanggal_peminjaman');
            $pisah1             = explode('/', $tanggal_peminjaman);
            $urutan1            = array($pisah1[2], $pisah1[1], $pisah1[0]);
            $satukan1           = implode('-', $urutan1);

            $tanggal_jatuh_tempo = $this->input->post('tanggal_jatuh_tempo');
            $pisah2              = explode('/', $tanggal_jatuh_tempo);
            $urutan2             = array($pisah2[2], $pisah2[1], $pisah2[0]);
            $satukan2            = implode('-', $urutan2);

            $tanggal_pengembalian = null;

            $pinjaman             = $this->input->post('pinjaman');
            $replaceRpPinjaman    = str_replace("Rp ", "", explode(".", $pinjaman)[0]);
            $replaceTitikPinjaman = str_replace(",", "", $replaceRpPinjaman);

            $total_pinjaman     = 0;
            $bagi_hasil         = 0;
            $biaya_administrasi = 0;

            if ($replaceTitikPinjaman >= 1000000) {
                $biaya_administrasi = 17000;
            } else {
                $biaya_administrasi = 12000;
            }

            $total_pinjaman = $replaceTitikPinjaman + $biaya_administrasi;

            $keterangan = $this->input->post('keterangan');

            $data = array(
                'id_peminjaman_instan' => $id_peminjaman_instan,
                'tanggal_peminjaman'   => $satukan1,
                'tanggal_jatuh_tempo'  => $satukan2,
                'tanggal_pengembalian' => $tanggal_pengembalian,
                'pinjaman'             => $replaceTitikPinjaman,
                'total_pinjaman'       => $total_pinjaman,
                'bagi_hasil'           => $bagi_hasil,
                'biaya_administrasi'   => $biaya_administrasi,
                'keterangan'           => $keterangan,
                'status'               => 0,
                'id_anggota'           => $idAnggota,
            );

            $this->PeminjamanInstan->simpanPeminjamanInstan($data);

            return redirect('admin/PeminjamanInstanController/index/' . $idAnggota);
        } else {
            if ($peminjamanInstanTerbaru[0]->status == 0) {
                $this->session->set_flashdata('pesan', 'maaf, anda harus membayar Peminjaman Instan terlebih dahulu');
                return redirect('admin/PeminjamanInstanController/index/' . $idAnggota);
            } else {
                $id_peminjaman_instan = $this->uuid->v4();

                $tanggal_peminjaman = $this->input->post('tanggal_peminjaman');
                $pisah1             = explode('/', $tanggal_peminjaman);
                $urutan1            = array($pisah1[2], $pisah1[1], $pisah1[0]);
                $satukan1           = implode('-', $urutan1);

                $tanggal_jatuh_tempo = $this->input->post('tanggal_jatuh_tempo');
                $pisah2              = explode('/', $tanggal_jatuh_tempo);
                $urutan2             = array($pisah2[2], $pisah2[1], $pisah2[0]);
                $satukan2            = implode('-', $urutan2);

                $tanggal_pengembalian = null;

                $pinjaman             = $this->input->post('pinjaman');
                $replaceRpPinjaman    = str_replace("Rp ", "", explode(".", $pinjaman)[0]);
                $replaceTitikPinjaman = str_replace(",", "", $replaceRpPinjaman);

                $total_pinjaman     = 0;
                $bagi_hasil         = 0;
                $biaya_administrasi = 0;

                if ($replaceTitikPinjaman >= 1000000) {
                    $biaya_administrasi = 17000;
                } else {
                    $biaya_administrasi = 12000;
                }

                $total_pinjaman = $replaceTitikPinjaman + $biaya_administrasi;

                $keterangan = $this->input->post('keterangan');

                $data = array(
                    'id_peminjaman_instan' => $id_peminjaman_instan,
                    'tanggal_peminjaman'   => $satukan1,
                    'tanggal_jatuh_tempo'  => $satukan2,
                    'tanggal_pengembalian' => $tanggal_pengembalian,
                    'pinjaman'             => $replaceTitikPinjaman,
                    'total_pinjaman'       => $total_pinjaman,
                    'bagi_hasil'           => $bagi_hasil,
                    'biaya_administrasi'   => $biaya_administrasi,
                    'keterangan'           => $keterangan,
                    'status'               => 0,
                    'id_anggota'           => $idAnggota,
                );

                $this->PeminjamanInstan->simpanPeminjamanInstan($data);

                return redirect('admin/PeminjamanInstanController/index/' . $idAnggota);
            }
        }
    }

    //Ambil 1 Data Pinjaman Instan Lalu Menampilkan Halaman Edit Pinjaman Instan
    public function editPeminjamanInstan($id_peminjaman_instan)
    {
        $data = array(
            'record' => $this->PeminjamanInstan->ambilSatuPeminjamanInstan($id_peminjaman_instan),
            'name'   => $this->security->get_csrf_token_name(),
            'hash'   => $this->security->get_csrf_hash(),
        );
        $this->load->view('admin/PeminjamanInstanEditView', $data);
    }

    //Update 1 Data Pinjaman Instan
    public function updatePeminjamanInstan($id_peminjaman_instan, $idAnggota)
    {
        $tanggal_pengembalian = $this->input->post('tanggal_pengembalian');
        $pisah                = explode('/', $tanggal_pengembalian);
        $urutan               = array($pisah[2], $pisah[1], $pisah[0]);
        $satukan              = implode('-', $urutan);

        $data = array(
            'tanggal_pengembalian' => $satukan,
            'status'               => 1,
        );

        $this->PeminjamanInstan->updatePeminjamanInstan($id_peminjaman_instan, $data);

        return redirect('admin/PeminjamanInstanController/index/' . $idAnggota);
    }

    /**
     * batas user
     */

    public function indexUser()
    {
        $username       = $this->session->userdata('username');
        $user           = $this->User->ambilSatuUser($username);
        $anggota        = $this->Anggota->ambilAnggotaBerdasarkanUsername($user[0]->username);
        $data['record'] = $this->PeminjamanInstan->ambilPeminjamanInstan($anggota[0]->id_anggota);
        $this->load->view('user/PeminjamanInstanIndexView', $data);
    }

}
