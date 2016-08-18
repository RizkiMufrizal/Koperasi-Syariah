<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-18 21:50:13
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-18 22:47:54
 */
class LaporanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembiayaan');
        $this->load->model('PeminjamanInstan');
        $this->load->model('AngsuranPembiayaan');
        $this->load->model('BiayaOperasional');
    }

    public function index()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );
        $this->load->view('admin/LaporanIndexView', $csrf);
    }

    public function laporanBerdasarkanTanggal()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $pisah1       = explode('/', $tanggal_awal);
        $urutan1      = array($pisah1[2], $pisah1[1], $pisah1[0]);
        $satukan1     = implode('-', $urutan1);

        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $pisah2        = explode('/', $tanggal_akhir);
        $urutan2       = array($pisah2[2], $pisah2[1], $pisah2[0]);
        $satukan2      = implode('-', $urutan2);

        $pembiayaan         = $this->Pembiayaan->ambilPembiayaanBerdasarkanDuaTanggal($satukan1, $satukan2);
        $peminjamanInstan   = $this->PeminjamanInstan->ambilPeminjamanInstanBerdasarkanDuaTanggal($satukan1, $satukan2);
        $angsuranPembiayaan = $this->AngsuranPembiayaan->ambilAngsuranPembiayaanBerdasarkanDuaTanggal($satukan1, $satukan2);
        $biayaOperasional   = $this->BiayaOperasional->ambilBiayaOperasionalBerdasarkanDuaTanggal($satukan1, $satukan1);
    }

    public function laporanBerdasarkanBulan()
    {

    }

}
