<?php
/**
 * @Author: Adhib Arfan<adhib.arfan@gmail.com>
 * @Date:   2016-08-15 13:50:06
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-17 22:00:30
 */

class SimpananAnggotaController extends CI_Controller
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

        $simpanan_pokok            = $this->input->post('simpanan_pokok');
        $replaceRpSimpananPokok    = str_replace("Rp ", "", explode(".", $simpanan_pokok)[0]);
        $replaceTitikSimpananPokok = str_replace(",", "", $replaceRpSimpananPokok);

        $simpanan_sukarela            = $this->input->post('simpanan_sukarela');
        $replaceRpSimpananSukarela    = str_replace("Rp ", "", explode(".", $simpanan_sukarela)[0]);
        $replaceTitikSimpananSukarela = str_replace(",", "", $replaceRpSimpananSukarela);

        $simpanan_hari_raya           = $this->input->post('simpanan_hari_raya');
        $replaceRpSimpananHariRaya    = str_replace("Rp ", "", explode(".", $simpanan_hari_raya)[0]);
        $replaceTitikSimpananHariRaya = str_replace(",", "", $replaceRpSimpananHariRaya);

        $simpanan_wajib            = $this->input->post('simpanan_wajib');
        $replaceRpSimpananWajib    = str_replace("Rp ", "", explode(".", $simpanan_wajib)[0]);
        $replaceTitikSimpananWajib = str_replace(",", "", $replaceRpSimpananWajib);

        $simpanan_pendidikan            = $this->input->post('simpanan_pendidikan');
        $replaceRpSimpananPendidikan    = str_replace("Rp ", "", explode(".", $simpanan_pendidikan)[0]);
        $replaceTitikSimpananPendidikan = str_replace(",", "", $replaceRpSimpananPendidikan);

        $pengambilan = 0;

        $saldo = $replaceTitikSimpananPokok + $replaceTitikSimpananSukarela + $replaceTitikSimpananHariRaya + $replaceTitikSimpananWajib + $replaceTitikSimpananPendidikan + $simpananAnggota[0]->saldo;

        $simpananAnggota = array(
            'id_simpanan_anggota' => $this->uuid->v4(),
            'tanggal_transaksi'   => $satukan,
            'simpanan_pokok'      => $replaceTitikSimpananPokok,
            'simpanan_sukarela'   => $replaceTitikSimpananSukarela,
            'simpanan_hari_raya'  => $replaceTitikSimpananHariRaya,
            'simpanan_wajib'      => $replaceTitikSimpananWajib,
            'simpanan_pendidikan' => $replaceTitikSimpananPendidikan,
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

    /**
     * proses simpan data pengambilan simpanan anggota
     * @param  [type] $idAnggota [description]
     * @return [type]            [description]
     */
    public function simpanSimpananAnggotaPengambilan($idAnggota)
    {

        $simpananAnggota = $this->SimpananAnggota->ambilSimpananAnggotaTerbaru($idAnggota);

        $tanggal_transaksi       = $this->input->post('tanggal_transaksi');
        $pengambilan             = $this->input->post('pengambilan');
        $replaceRpPengambilan    = str_replace("Rp ", "", explode(".", $pengambilan)[0]);
        $replaceTitikPengambilan = str_replace(",", "", $replaceRpPengambilan);

        $pisah   = explode('/', $tanggal_transaksi);
        $urutan  = array($pisah[2], $pisah[1], $pisah[0]);
        $satukan = implode('-', $urutan);

        $saldo = $simpananAnggota[0]->saldo - $replaceTitikPengambilan;

        $simpananAnggota = array(
            'id_simpanan_anggota' => $this->uuid->v4(),
            'tanggal_transaksi'   => $satukan,
            'simpanan_pokok'      => 0,
            'simpanan_sukarela'   => 0,
            'simpanan_hari_raya'  => 0,
            'simpanan_wajib'      => 0,
            'simpanan_pendidikan' => 0,
            'pengambilan'         => $replaceTitikPengambilan,
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
