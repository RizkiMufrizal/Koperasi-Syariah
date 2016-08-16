<?php
<<<<<<< HEAD

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-16 06:21:55
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-16 06:44:53
=======
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-16 01:32:59
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-16 01:37:20
>>>>>>> 471736f4196b0351260e86f66338c6aa1d50494b
 */

class PinjamanInstan extends CI_Model
{
<<<<<<< HEAD
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

=======
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
>>>>>>> 471736f4196b0351260e86f66338c6aa1d50494b
}
