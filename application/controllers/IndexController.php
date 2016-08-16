<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 15:04:35
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-15 15:06:44
 */

class IndexController extends CI_Controller
{
    /**
     * Halaman Dasboard Admin
     * @param string $value [description]
     */
    public function index()
    {
        return $this->load->view('admin/IndexView');
    }
}
