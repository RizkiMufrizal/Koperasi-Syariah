/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-14 13:25:58
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-14 13:26:07
 */

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * halaman index
     * @return [type] [description]
     */
    public function index()
    {
        $this->load->view('welcome_message');
    }
}
