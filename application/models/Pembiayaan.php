<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 12:56:42
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-15 12:58:50
 */

class Pembiayaan extends CI_Model
{
    /**
     * ambil data pembiayaan
     * @return [type] [description]
     */
    public function ambilPembiayaan()
    {
        return $this->db->get('tb_pembiayaan');
    }

    /**
     * simpan data pembiayaan
     * @param  [type] $pembiayaan [description]
     * @return [type]             [description]
     */
    public function simpanPembiayaan($pembiayaan)
    {
        $this->db->insert('tb_pembiayaan', $pembiayaan);
    }
}
