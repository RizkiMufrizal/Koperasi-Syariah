<?php

/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 12:56:42
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-17 13:07:09
 */

class Pembiayaan extends CI_Model
{
    //Untuk Ambil Data Pembiayaan
    public function ambilPembiayaan($idAnggota)
    {
        $this->db->where('id_anggota', $idAnggota);
        return $this->db->get('tb_pembiayaan')->result();
    }

    //Untuk Simpan Pembiayaan
    public function simpanPembiayaan($data)
    {
        $this->db->insert('tb_pembiayaan', $data);
    }

    public function ambilPembiayaanTerbaru($idAnggota)
    {
        $this->db->order_by('tanggal_peminjaman', 'DESC');
        $this->db->where('id_anggota', $idAnggota);
        return $this->db->get('tb_pembiayaan')->result();
    }

    public function ambilPembiayaanTerbaruBerdasarkanIdPembiayaan($idPembiayaan)
    {
        $this->db->order_by('tanggal_peminjaman', 'DESC');
        $this->db->where('id_pembiayaan', $idPembiayaan);
        return $this->db->get('tb_pembiayaan')->result();
    }

    public function updatePembiayaan($idPembiayaan)
    {
        $this->db->set('status', '1');
        $this->db->where('id_pembiayaan', $idPembiayaan);
        $this->db->update('tb_pembiayaan', $pembiayaan);
    }

}
