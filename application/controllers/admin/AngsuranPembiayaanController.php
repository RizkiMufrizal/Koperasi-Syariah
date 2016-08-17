<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-16 06:10:55
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-17 23:12:54
 */

class AngsuranPembiayaanController extends CI_Controller
{
    //File Constructor
    public function __construct()
    {
        parent::__construct();

        $session = $this->session->userdata('loggedIn');
        if ($session == false) {
            $this->session->set_flashdata('pesan', 'maaf, anda belum melakukan login');
            return redirect('/');
        }

        $this->load->model('AngsuranPembiayaan'); //load model AngsuranPembiayaan yang berada di folder model
        $this->load->model('Pembiayaan');
    }

    //Menampilkan Data Angsuran Pembiayaan
    public function index($id_pembiayaan)
    {
        $role = $this->session->userdata('role');
        if ($role == 'ROLE_USER') {
            $this->session->set_flashdata('pesan', 'maaf, anda tidak memiliki hak akses untuk halaman tersebut');
            return redirect('/');
        } else {
            $data['record'] = $this->AngsuranPembiayaan->ambilAngsuranPembiayaan($id_pembiayaan);
            $this->load->view('admin/AngsuranPembiayaanIndexView', $data);
        }
    }

    //Tampilkan Halaman Tambah Angsuran Pembiayaan
    public function tambahAngsuranPembiayaan()
    {
        $role = $this->session->userdata('role');
        if ($role == 'ROLE_USER') {
            $this->session->set_flashdata('pesan', 'maaf, anda tidak memiliki hak akses untuk halaman tersebut');
            return redirect('/');
        } else {
            $csrf = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
            );

            $this->load->view('admin/AngsuranPembiayaanTambahView', $csrf);
        }
    }

    //Untuk Menyimpan Data Angsuran Pembiayaan Ke Dalam Tabel Angsuran Pembiayaan
    public function simpanAngsuranPembiayaan($idPembiayaan)
    {
        $role = $this->session->userdata('role');
        if ($role == 'ROLE_USER') {
            $this->session->set_flashdata('pesan', 'maaf, anda tidak memiliki hak akses untuk halaman tersebut');
            return redirect('/');
        } else {
            $pembiayaan = $this->Pembiayaan->ambilPembiayaanTerbaruBerdasarkanIdPembiayaan($idPembiayaan);
            $angsuran   = $this->AngsuranPembiayaan->ambilAngsuranPembiayaanTerbaru($idPembiayaan);

            $tanggal_pembayaran_angsuran    = $this->input->post('tanggal_pembayaran_angsuran');
            $pembayaran_angsuran            = $this->input->post('pembayaran_angsuran');
            $replaceRpPembayaranAngsuran    = str_replace("Rp ", "", explode(".", $pembayaran_angsuran)[0]);
            $replaceTitikPembayaranAngsuran = str_replace(",", "", $replaceRpPembayaranAngsuran);

            if ($angsuran == null) {
                $sisa_angsuran = $pembiayaan[0]->total_pembiayaan - $replaceTitikPembayaranAngsuran;
            } else {
                $sisa_angsuran = $angsuran[0]->sisa_angsuran - $replaceTitikPembayaranAngsuran;
            }

            $pisah   = explode('/', $tanggal_pembayaran_angsuran);
            $urutan  = array($pisah[2], $pisah[1], $pisah[0]);
            $satukan = implode('-', $urutan);

            $bagi_hasil_koperasi = 0;
            $bagi_hasil_anggota  = 0;

            if ($pembiayaan[0]->jenis_pembiayaan == 'Mudarobah') {
                $bagi_hasil_koperasi = 1;
                $bagi_hasil_anggota  = 1;
            } else if ($pembiayaan[0]->jenis_pembiayaan == 'Musyarokah') {
                $bagi_hasil_koperasi = 1;
                $bagi_hasil_anggota  = 1;
            }

            $data = array(
                'id_angsuran_pembiayaan'      => $this->uuid->v4(),
                'tanggal_pembayaran_angsuran' => $satukan,
                'bagi_hasil_koperasi'         => $bagi_hasil_koperasi,
                'bagi_hasil_anggota'          => $bagi_hasil_anggota,
                'sisa_angsuran'               => $sisa_angsuran,
                'pembayaran_angsuran'         => $replaceTitikPembayaranAngsuran,
                'id_pembiayaan'               => $idPembiayaan,
            );

            $this->AngsuranPembiayaan->simpanAngsuranPembiayaan($data);

            if ($angsuran != null) {
                if ($sisa_angsuran == 0) {
                    $this->Pembiayaan->updatePembiayaan($idPembiayaan);
                }
            }

            return redirect('admin/AngsuranPembiayaanController/index/' . $idPembiayaan);
        }
    }

    /**
     * batas user
     */

    /**
     * function untuk halaman angsuran pembiayaan sebagai user
     * @return [type] [description]
     */
    public function indexUser($idPembiayaan)
    {
        $data['record'] = $this->AngsuranPembiayaan->ambilAngsuranPembiayaan($idPembiayaan);
        $this->load->view('user/AngsuranPembiayaanIndexView', $data);
    }

}
