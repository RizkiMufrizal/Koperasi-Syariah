<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-15 13:09:46
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-17 13:42:55
 */

class PembiayaanController extends CI_Controller
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

        $this->load->model('Pembiayaan'); //load model Pembiayaan yang berada di folder model
        $this->load->model('SimpananAnggota');
    }

    //Menampilkan Data Pembiayaan
    public function index($idAnggota)
    {
        $data['dataSimpananAnggota'] = $this->SimpananAnggota->ambilSimpananAnggotaTerbaru($idAnggota)[0]->saldo;
        $data['record']              = $this->Pembiayaan->ambilPembiayaan($idAnggota);
        $this->load->view('admin/PembiayaanIndexView', $data);
    }

    //Tampilkan Halaman Tambah Pembiayaan
    public function tambahPembiayaan()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        $this->load->view('admin/PembiayaanTambahView', $csrf);
    }

    //Untuk Menyimpan Data Pembiayaan Ke Dalam Tabel Pembiayaan
    public function simpanPembiayaan($idAnggota)
    {
        $id_pembiayaan       = $this->uuid->v4();
        $tanggal_peminjaman  = $this->input->post('tanggal_peminjaman');
        $tanggal_jatuh_tempo = $this->input->post('tanggal_jatuh_tempo');
        $pembiayaan          = $this->input->post('pembiayaan');
        $jenis_pembiayaan    = $this->input->post('jenis_pembiayaan');
        $margin              = $this->input->post('margin');
        $total_pembiayaan    = 0;
        $status              = 0;
        $id_anggota          = $idAnggota;

        $pembiayaanModel = $this->Pembiayaan->ambilPembiayaanTerbaru($idAnggota);

        if ($pembiayaanModel == null) {
            $pisah1   = explode('/', $tanggal_peminjaman);
            $urutan1  = array($pisah1[2], $pisah1[1], $pisah1[0]);
            $satukan1 = implode('-', $urutan1);

            $pisah2   = explode('/', $tanggal_jatuh_tempo);
            $urutan2  = array($pisah2[2], $pisah2[1], $pisah2[0]);
            $satukan2 = implode('-', $urutan2);

            $hasilMargin = 0;

            if ($pembiayaan >= 1000000) {
                $biaya_administrasi = 17000;
            } else {
                $biaya_administrasi = 12000;
            }

            if ($jenis_pembiayaan == 'Mudarobah') {
                $hasilMargin      = 0;
                $total_pembiayaan = $pembiayaan + $biaya_administrasi;
            } else if ($jenis_pembiayaan == 'Musyarokah') {
                $hasilMargin      = 0;
                $total_pembiayaan = $pembiayaan + $biaya_administrasi;
            } else {
                $hasilMargin = $margin;

                $total_pembiayaan = $pembiayaan + (($pembiayaan * ($margin / 100)) + $biaya_administrasi);
            }

            $data = array(
                'id_pembiayaan'       => $id_pembiayaan,
                'tanggal_peminjaman'  => $satukan1,
                'tanggal_jatuh_tempo' => $satukan2,
                'pembiayaan'          => $pembiayaan,
                'biaya_administrasi'  => $biaya_administrasi,
                'jenis_pembiayaan'    => $jenis_pembiayaan,
                'margin'              => $hasilMargin,
                'total_pembiayaan'    => $total_pembiayaan,
                'status'              => $status,
                'id_anggota'          => $id_anggota,
            );

            $this->Pembiayaan->simpanPembiayaan($data);

            return redirect('admin/PembiayaanController/index/' . $idAnggota);
        } else {
            if ($pembiayaanModel[0]->status == 0) {
                $this->session->set_flashdata('pesan', 'maaf, anda harus membayar angsuran terlebih dahulu');
                return redirect('admin/PembiayaanController/index/' . $idAnggota);
            } else {
                $simpananAnggota = $this->SimpananAnggota->ambilSimpananAnggotaTerbaru($idAnggota);

                $tigaKaliSimpananAnggota = $simpananAnggota[0]->saldo * 3;

                if ($tigaKaliSimpananAnggota < $pembiayaan) {
                    $this->session->set_flashdata('pesan', 'maaf, saldo anda tidak mencukupi untuk pembiayaan');
                    return redirect('admin/PembiayaanController/index/' . $idAnggota);
                } else {
                    $pisah1   = explode('/', $tanggal_peminjaman);
                    $urutan1  = array($pisah1[2], $pisah1[1], $pisah1[0]);
                    $satukan1 = implode('-', $urutan1);

                    $pisah2   = explode('/', $tanggal_jatuh_tempo);
                    $urutan2  = array($pisah2[2], $pisah2[1], $pisah2[0]);
                    $satukan2 = implode('-', $urutan2);

                    $hasilMargin = 0;

                    if ($pembiayaan >= 1000000) {
                        $biaya_administrasi = 17000;
                    } else {
                        $biaya_administrasi = 12000;
                    }

                    if ($jenis_pembiayaan == 'Mudarobah') {
                        $hasilMargin      = 0;
                        $total_pembiayaan = $pembiayaan + $biaya_administrasi;
                    } else if ($jenis_pembiayaan == 'Musyarokah') {
                        $hasilMargin      = 0;
                        $total_pembiayaan = $pembiayaan + $biaya_administrasi;
                    } else {
                        $hasilMargin = $margin;

                        $total_pembiayaan = $pembiayaan + (($pembiayaan * ($margin / 100)) + $biaya_administrasi);
                    }

                    $data = array(
                        'id_pembiayaan'       => $id_pembiayaan,
                        'tanggal_peminjaman'  => $satukan1,
                        'tanggal_jatuh_tempo' => $satukan2,
                        'pembiayaan'          => $pembiayaan,
                        'biaya_administrasi'  => $biaya_administrasi,
                        'jenis_pembiayaan'    => $jenis_pembiayaan,
                        'margin'              => $hasilMargin,
                        'total_pembiayaan'    => $total_pembiayaan,
                        'status'              => $status,
                        'id_anggota'          => $id_anggota,
                    );

                    $this->Pembiayaan->simpanPembiayaan($data);

                    return redirect('admin/PembiayaanController/index/' . $idAnggota);
                }
            }
        }
    }

}
