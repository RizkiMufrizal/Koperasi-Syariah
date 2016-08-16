<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-16 06:08:27
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-16 06:18:59
 */

class AngsuranPembiayaan extends CI_Model
{
    //Untuk Ambil Data Angsuran Pembiayaan
    public function ambilAngsuranPembiayaan()
    {
        return $this->db->get('tb_angsuran_pembiayaan');
    }

    //Untuk Simpan Angsuran Pembiayaan
    public function simpanAngsuranPembiayaan($data)
    {
        $this->db->insert('tb_angsuran_pembiayaan', $data);
    }

}
