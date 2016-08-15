<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-16 01:32:59
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-16 01:37:20
 */

class PinjamanInstan extends CI_Model
{
    /**
     * function untuk ambil data pinjaman instan
     * @return [type] [description]
     */
    public function ambilPinjamanInstan()
    {
        return $this->db->get('tb_pinjaman_instan')->result();
    }

    /**
     * function untuk mengambil 1 data pinjaman instan
     * @param  [type] $idPinjamanInstan [description]
     * @return [type]                   [description]
     */
    public function ambilSatuPinjamanInstan($idPinjamanInstan)
    {
        $this->db->whete('id_pinjaman_instan', $idPinjamanInstan);
        return $this->db->get('tb_pinjaman_instan')->result();
    }

    /**
     * function untuk simpan data pinjaman instan
     * @param  [type] $pinjamanInstan [description]
     * @return [type]                 [description]
     */
    public function simpanPinjamanInstan($pinjamanInstan)
    {
        $this->db->insert('tb_pinjaman_instan', $pinjamanInstan);
    }

    /**
     * function untuk update pinjaman instan
     * @param  [type] $idPinjamanInstan [description]
     * @param  [type] $pinjamanInstan   [description]
     * @return [type]                   [description]
     */
    public function updatePinjamanInstan($idPinjamanInstan, $pinjamanInstan)
    {
        $this->db->where('id_pinjaman_instan', $idPinjamanInstan);
        $this->db->update('tb_pinjaman_instan', $pinjamanInstan);
    }
}
