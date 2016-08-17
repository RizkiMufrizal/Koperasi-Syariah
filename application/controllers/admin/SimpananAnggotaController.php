<?php
/**
 * @Author: Adhib Arfan<adhib.arfan@gmail.com>
 * @Date:   2016-08-15 13:50:06
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-16 20:00:21
 */

class SimpananAnggotaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SimpananAnggota');
        $this->load->model('User');
        $this->load->model('Anggota');
    }

    /**
     * function untuk menampilkan data simpanan anggota berdasarkan id anggota
     * @param  [type] $idAnggota [description]
     * @return [type]            [description]
     */
    public function index($idAnggota)
    {
        $data['simpananAnggota'] = $this->SimpananAnggota->ambilSimpananAnggota($idAnggota);
        return $this->load->view('admin/SimpananAnggotaIndexView', $data);
    }

    /**
     * halaman simpanan anggota
     * @return [type] [description]
     */
    public function tambahSimpananAnggota()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );
        return $this->load->view('admin/SimpananAnggotaTambahView', $csrf);
    }

    /**
     * untuk proses simpan data simpanan anggota
     * @param  [type] $idAnggota [description]
     * @return [type]            [description]
     */
    public function simpanSimpananAnggota($idAnggota)
    {

        $simpananAnggota = $this->SimpananAnggota->ambilSimpananAnggotaTerbaru($idAnggota);

        $tanggal_transaksi = $this->input->post('tanggal_transaksi');

        $pisah   = explode('/', $tanggal_transaksi);
        $urutan  = array($pisah[2], $pisah[1], $pisah[0]);
        $satukan = implode('-', $urutan);

        $simpanan_pokok      = $this->input->post('simpanan_pokok');
        $simpanan_sukarela   = $this->input->post('simpanan_sukarela');
        $simpanan_hari_raya  = $this->input->post('simpanan_hari_raya');
        $simpanan_wajib      = $this->input->post('simpanan_wajib');
        $simpanan_pendidikan = $this->input->post('simpanan_pendidikan');
        $pengambilan         = 0;

        $saldo = $simpanan_pokok + $simpanan_sukarela + $simpanan_hari_raya + $simpanan_wajib + $simpanan_pendidikan + $simpananAnggota[0]->saldo;

        $simpananAnggota = array(
            'id_simpanan_anggota' => $this->uuid->v4(),
            'tanggal_transaksi'   => $satukan,
            'simpanan_pokok'      => $simpanan_pokok,
            'simpanan_sukarela'   => $simpanan_sukarela,
            'simpanan_hari_raya'  => $simpanan_hari_raya,
            'simpanan_wajib'      => $simpanan_wajib,
            'simpanan_pendidikan' => $simpanan_pendidikan,
            'pengambilan'         => $pengambilan,
            'saldo'               => $saldo,
            'id_anggota'          => $idAnggota,
        );
        $this->SimpananAnggota->simpanSimpananAnggota($simpananAnggota);
        return redirect('admin/SimpananAnggotaController/index/' . $idAnggota);
    }

    /**
     * untuk halaman pengambilan
     * @return [type] [description]
     */
    public function tambahSimpananAnggotaPengambilan()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );
        return $this->load->view('admin/SimpananAnggotaTambahPengambilanView', $csrf);
    }

    public function simpanSimpananAnggotaPengambilan($idAnggota)
    {

        $simpananAnggota = $this->SimpananAnggota->ambilSimpananAnggotaTerbaru($idAnggota);

        $tanggal_transaksi = $this->input->post('tanggal_transaksi');
        $pengambilan       = $this->input->post('pengambilan');

        $pisah   = explode('/', $tanggal_transaksi);
        $urutan  = array($pisah[2], $pisah[1], $pisah[0]);
        $satukan = implode('-', $urutan);

        $saldo = $simpananAnggota[0]->saldo - $pengambilan;

        $simpananAnggota = array(
            'id_simpanan_anggota' => $this->uuid->v4(),
            'tanggal_transaksi'   => $satukan,
            'simpanan_pokok'      => 0,
            'simpanan_sukarela'   => 0,
            'simpanan_hari_raya'  => 0,
            'simpanan_wajib'      => 0,
            'simpanan_pendidikan' => 0,
            'pengambilan'         => $pengambilan,
            'saldo'               => $saldo,
            'id_anggota'          => $idAnggota,
        );
        $this->SimpananAnggota->simpanSimpananAnggota($simpananAnggota);
        return redirect('admin/SimpananAnggotaController/index/' . $idAnggota);
    }

    /**
     * batas user
     */

    /**
     * function untuk halaman simpanan anggota sebagai user
     * @return [type] [description]
     */
    public function indexUser()
    {
        $username = $this->session->userdata('username');
        $user     = $this->User->ambilSatuUser($username);
        $anggota  = $this->Anggota->ambilAnggotaBerdasarkanUsername($user[0]->username);

        $data['simpananAnggota'] = $this->SimpananAnggota->ambilSimpananAnggota($anggota[0]->id_anggota);
        return $this->load->view('user/SimpananAnggotaIndexView', $data);
    }
}
