<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-15 11:44:57
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-16 06:27:57
 */

class Anggota extends CI_Model
{
    //Ambil Data Anggota
    public function ambilAnggota()
    {
        return $this->db->get('tb_anggota');
    }

    //Simpan Data Anggota
    public function simpanAnggota($data)
    {
        $this->db->insert('tb_anggota', $data);
    }

    //Ambil 1 Data Anggota
    public function ambilSatuAnggota($id_anggota)
    {
        $this->db->where('id_anggota', $id_anggota);
        return $this->db->get('tb_anggota')->result();
    }

    //Untuk Update Data Anggota
    public function updateAnggota($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('tb_anggota', $data);
    }

    //Hapus Data Anggota
    public function hapusAnggota($id_anggota)
    {
        $this->db->delete('tb_anggota', array('id_anggota' => $id_anggota));
    }

}
