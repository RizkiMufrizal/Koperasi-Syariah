<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 15:04:35
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-18 18:30:06
 */

class IndexController extends CI_Controller
{
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
        $this->load->model('Anggota');
        $this->load->model('User');
        $this->load->model('Pembiayaan');
        $this->load->model('PeminjamanInstan');
        $this->load->model('AngsuranPembiayaan');
        $this->load->model('BiayaOperasional');
    }

    /**
     * Halaman Dasboard Admin
     * @param string $value [description]
     */
    public function index()
    {
        $pembiayaan         = $this->Pembiayaan->ambilSemuaPembiayaan();
        $peminjamanInstan   = $this->PeminjamanInstan->ambilSemuaPeminjamanInstan();
        $angsuranPembiayaan = $this->AngsuranPembiayaan->ambilSemuaAngsuranPembiayaan();
        $biayaOperasional   = $this->BiayaOperasional->ambilBiayaOperasional();
        $jumlahPendapatan   = 0;
        $jumlahPengeluaran  = 0;

        /**
         * untuk proses akumulasi
         */
        foreach ($pembiayaan as $p) {
            $jumlahPendapatan = $jumlahPendapatan + $p->biaya_administrasi + ($p->pembiayaan * ($p->margin / 100));
        }

        /**
         * untuk proses akumulasi
         */
        foreach ($peminjamanInstan as $pi) {
            $jumlahPendapatan = $jumlahPendapatan + $pi->biaya_administrasi + $pi->bagi_hasil;
        }

        /**
         * untuk proses akumulasi
         */
        foreach ($angsuranPembiayaan as $ap) {
            $jumlahPendapatan = $jumlahPendapatan + $ap->bagi_hasil_koperasi + $pa->bagi_hasil_anggota;
        }

        foreach ($biayaOperasional as $bo) {
            $jumlahPengeluaran = $jumlahPengeluaran + $bo->biaya;
        }

        $data['jumlahAnggota']     = $this->Anggota->ambilCountAnggota();
        $data['jumlahUser']        = $this->User->ambilCountUser();
        $data['jumlahPendapatan']  = $jumlahPendapatan;
        $data['jumlahPengeluaran'] = $jumlahPengeluaran;
        return $this->load->view('admin/IndexView', $data);
    }

}
