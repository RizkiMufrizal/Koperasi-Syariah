<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-16 06:21:55
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-18 18:19:06
 */

class PeminjamanInstan extends CI_Model
{
    //Ambil Data Pinjaman Instan
    public function ambilPeminjamanInstan($idAnggota)
    {
        $this->db->where('id_anggota', $idAnggota);
        return $this->db->get('tb_peminjaman_instan')->result();
    }

    //Simpan Data Simpan Pinjaman Instan
    public function simpanPeminjamanInstan($data)
    {
        $this->db->insert('tb_peminjaman_instan', $data);
    }

    //Ambil 1 Data Pinjaman Instan
    public function ambilSatuPeminjamanInstan($id_peminjaman_instan)
    {
        $this->db->where('id_peminjaman_instan', $id_peminjaman_instan);
        return $this->db->get('tb_peminjaman_instan')->result();
    }

    //Untuk Update Data Pinjaman Instan
    public function updatePeminjamanInstan($id_peminjaman_instan, $data)
    {
        $this->db->where('id_peminjaman_instan', $id_peminjaman_instan);
        $this->db->update('tb_peminjaman_instan', $data);
    }

    public function ambilPeminjamanInstanTerbaru($idAnggota)
    {
        $this->db->order_by('tanggal_peminjaman', 'DESC');
        $this->db->where('id_anggota', $idAnggota);
        return $this->db->get('tb_peminjaman_instan')->result();
    }

    /**
     * ambil semua data peminjaman instan
     * @return [type] [description]
     */
    public function ambilSemuaPeminjamanInstan()
    {
        return $this->db->get('tb_peminjaman_instan')->result();
    }

}
