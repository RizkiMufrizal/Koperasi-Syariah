<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 16:18:04
 * @Last Modified by:   adhibarfan
 * @Last Modified time: 2016-08-18 13:27:26
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
     * Halaman index user setelah login
     * @return [type] [description]
     */
    public function index()
    {
        return $this->load->view('user/IndexView');
    }

}
