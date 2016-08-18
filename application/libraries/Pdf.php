<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-18 22:58:40
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-18 22:58:52
 */

class Pdf
{

    public function pdf()
    {
        $CI = &get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }

    public function load($param = null)
    {
        include_once APPPATH . '/third_party/mpdf/mpdf.php';

        if ($params == null) {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';
        }

        return new mPDF($param);
    }

}
