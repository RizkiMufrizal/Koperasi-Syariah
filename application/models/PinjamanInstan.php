<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-16 06:21:55
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-16 07:36:11
 */

class PinjamanInstan extends CI_Model
{
    //Ambil Data Pinjaman Instan
    public function ambilPinjamanInstan()
    {
        return $this->db->get('tb_peminjaman_instan');
    }

    //Simpan Data Simpan Pinjaman Instan
    public function simpanPinjamanInstan($data)
    {
        $this->db->insert('tb_peminjaman_instan', $data);
    }

    //Ambil 1 Data Pinjaman Instan
    public function ambilSatuPinjamanInstan($id_peminjaman_instan)
    {
        $this->db->where('id_peminjaman_instan', $id_peminjaman_instan);
        return $this->db->get('tb_peminjaman_instan')->result();
    }

    //Untuk Update Data Pinjaman Instan
    public function updatePinjamanInstan($id_peminjaman_instan, $data)
    {
        $this->db->where('id_peminjaman_instan', $id_peminjaman_instan);
        $this->db->update('tb_peminjaman_instan', $data);
    }

}
