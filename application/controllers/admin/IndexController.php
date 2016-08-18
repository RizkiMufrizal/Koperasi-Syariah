<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 15:04:35
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-18 22:52:04
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
        return $this->load->view('admin/IndexView');
    }

}
