<?php
/**
 * @Author: Adhib Arfan<adhib.arfan@gmail.com>
 * @Date:   2016-08-15 13:50:06
 * @Last Modified by:   adhibarfan
 * @Last Modified time: 2016-08-15 14:11:06
 */
/**
 *
 */
class SimpananAnggotaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SimpananAnggota');
        $this->load->model('Anggota');
    }

    public function index()
    {
        $data['simpanan_anggota'] = $this->SimpananAnggota->ambilSimpananAnggota();

    }

    public function tambahSimpananAnggota()
    {
        $id_simpanan_anggota = $this->input->post('id_simpanan_anggota');
        $tanggal_transaksi   = $this->input->post('tanggal_transaksi');
        $simpanan_pokok      = $this->input->post('simpanan_pokok');
        $simpanan_sukarela   = $this->input->post('simpanan_sukarela');
        $simpanan_hari_raya  = $this->input->post('simpanan_hari_raya');

    }

    public function simpanSimpananAnggota()
    {
        # code...
    }
}
