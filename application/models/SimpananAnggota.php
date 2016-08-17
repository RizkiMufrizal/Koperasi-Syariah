<?php
/**
 * @Author: arfan
 * @Date:   2016-08-15 12:46:19
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-16 17:58:05
 */

class SimpananAnggota extends CI_Model
{
    /**
     * ambil simpanan anggota
     * @return [type] [description]
     */
    public function ambilSimpananAnggota($idAnggota)
    {
        $this->db->where('id_anggota', $idAnggota);
        return $this->db->get('tb_simpanan_anggota')->result();
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

    /**
     * function untuk data terbaru
     * @return [type] [description]
     */
    public function ambilSimpananAnggotaTerbaru($idAnggota)
    {
        $this->db->order_by('tanggal_transaksi', 'DESC');
        $this->db->where('id_anggota', $idAnggota);
        return $this->db->get('tb_simpanan_anggota')->result();
    }
}
