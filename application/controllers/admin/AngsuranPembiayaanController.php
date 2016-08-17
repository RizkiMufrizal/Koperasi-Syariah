<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-16 06:10:55
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-17 13:09:08
 */

class AngsuranPembiayaanController extends CI_Controller
{
    //File Constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AngsuranPembiayaan'); //load model AngsuranPembiayaan yang berada di folder model
        $this->load->model('Pembiayaan');
    }

    //Menampilkan Data Angsuran Pembiayaan
    public function index($id_pembiayaan)
    {
        $data['record'] = $this->AngsuranPembiayaan->ambilAngsuranPembiayaan($id_pembiayaan);
        $this->load->view('admin/AngsuranPembiayaanIndexView', $data);
    }

    //Tampilkan Halaman Tambah Angsuran Pembiayaan
    public function tambahAngsuranPembiayaan()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        $this->load->view('admin/AngsuranPembiayaanTambahView', $csrf);
    }

    //Untuk Menyimpan Data Angsuran Pembiayaan Ke Dalam Tabel Angsuran Pembiayaan
    public function simpanAngsuranPembiayaan($idPembiayaan)
    {

        $pembiayaan = $this->Pembiayaan->ambilPembiayaanTerbaruBerdasarkanIdPembiayaan($idPembiayaan);
        $angsuran   = $this->AngsuranPembiayaan->ambilAngsuranPembiayaanTerbaru($idPembiayaan);

        $tanggal_pembayaran_angsuran = $this->input->post('tanggal_pembayaran_angsuran');
        $pembayaran_angsuran         = $this->input->post('pembayaran_angsuran');

        if ($angsuran == null) {
            $sisa_angsuran = $pembiayaan[0]->total_pembiayaan - $pembayaran_angsuran;
        } else {
            $sisa_angsuran = $angsuran[0]->sisa_angsuran - $pembayaran_angsuran;
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
            'pembayaran_angsuran'         => $pembayaran_angsuran,
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
