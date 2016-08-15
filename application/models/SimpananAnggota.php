<?php
/**
 * @Author: arfan
 * @Date:   2016-08-15 12:46:19
 * @Last Modified by:   adhibarfan
 * @Last Modified time: 2016-08-15 12:56:40
 */

class SimpananAnggota extends CI_Model
{
    /**
     * ambil simpanan anggota
     * @return [type] [description]
     */
    public function ambilSimpananAnggota()
    {
        $this->db->get('tb_simpanan_anggota')->result();
    }

    /**
     * simpan simpanan anggota
     * @param  [type] $simpananAnggota [description]
     * @return [type]                  [description]
     */
    public function simpanSimpananAnggota($simpananAnggota)
    {
        $this->db->insert('tb_simpanan_anggota', $simpananAnggota);
    }
}
