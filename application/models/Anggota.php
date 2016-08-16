<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-15 11:44:57
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-16 19:59:01
 */

class Anggota extends CI_Model
{
    //Ambil Data Anggota
    public function ambilAnggota()
    {
        return $this->db->get('tb_anggota')->result();
    }

    //Simpan Data Anggota
    public function simpanAnggota($data)
    {
        $this->db->insert('tb_anggota', $data);
    }

    //Ambil Jumlah Anggota
    public function ambilCountAnggota()
    {
        return $this->db->count_all_results('tb_anggota');
    }

    public function ambilDataAnggotaTerbaru()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('tb_anggota')->result();
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

    /**
     * untuk mengambil data anggota berdasarkan username
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function ambilAnggotaBerdasarkanUsername($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('tb_anggota')->result();
    }

}
