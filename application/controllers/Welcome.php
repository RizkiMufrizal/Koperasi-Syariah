<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-14 13:25:58
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-14 20:24:47
 */

class Welcome extends CI_Controller
{

    /**
     * halaman index
     * @return [type] [description]
     */
    public function index()
    {
        log_message('info', 'The purpose of some variable is to provide some value.');
        $this->load->view('welcome_message');
    }

}
