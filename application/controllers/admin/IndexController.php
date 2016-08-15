<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 15:04:35
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-15 23:39:13
 */

class IndexController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $session = $this->session->userdata('loggedIn');
        if ($session == false) {
            $this->session->set_flashdata('pesan', 'maaf, anda belum melakukan login');
            return redirect('/');
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
