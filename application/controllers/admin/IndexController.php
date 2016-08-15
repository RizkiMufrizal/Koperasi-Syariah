<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 15:04:35
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-16 02:33:32
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
