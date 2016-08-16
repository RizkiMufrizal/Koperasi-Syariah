<?php

/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 12:56:42
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-15 16:14:54
 */

class Pembiayaan extends CI_Model
{
    //Untuk Ambil Data Pembiayaan
    public function ambilPembiayaan()
    {
        return $this->db->get('tb_pembiayaan');
    }

    //Untuk Simpan Pembiayaan
    public function simpanPembiayaan($data)
    {
        $this->db->insert('tb_pembiayaan', $data);
    }

}
