<?php
/**
 * @Author: Adhib Arfan<adhib.arfan@gmail.com>
 * @Date:   2016-08-15 13:50:06
 * @Last Modified by:   adhibarfan
 * @Last Modified time: 2016-08-15 22:32:43
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
        $tanggal_transaksi   = $this->input->post('tanggal_transaksi');
        $simpanan_pokok      = $this->input->post('simpanan_pokok');
        $simpanan_sukarela   = $this->input->post('simpanan_sukarela');
        $simpanan_hari_raya  = $this->input->post('simpanan_hari_raya');
        $simpanan_wajib      = $this->input->post('simpanan_wajib');
        $simpanan_pendidikan = $this->input->post('simpanan_pendidikan');

        $simpananAnggota = array(
            'id_simpanan_anggota' => $this->uuid->v4(),
            'tanggal_transaksi'   => $tanggal_transaksi,
            'simpanan_pokok'      => $simpanan_pokok,
            'simpanan_sukarela'   => $simpanan_sukarela,
            'simpanan_hari_raya'  => $simpanan_hari_raya,
            'simpanan_wajib'      => $simpanan_wajib,
            'simpanan_pendidikan' => $simpanan_pendidikan,
        );
        $this->SimpananAnggota->simpanSimpananAnggota($simpananAnggota);
        redirect('admin/SimpananAnggotaController', 'refresh');

    }

    public function simpanSimpananAnggota()
    {
        # code...
    }
}
