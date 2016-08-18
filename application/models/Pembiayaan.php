<?php

/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 12:56:42
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-18 22:29:32
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

    /**
     * ambil semua data pembiayaan
     * @param string $value [description]
     */
    public function ambilSemuaPembiayaan()
    {
        return $this->db->get('tb_pembiayaan')->result();
    }

    /**
     * ambil pembiayaan berdasarkan dua tanggal
     * @param  [type] $tanggalAwal  [description]
     * @param  [type] $tanggalAkhir [description]
     * @return [type]               [description]
     */
    public function ambilPembiayaanBerdasarkanDuaTanggal($tanggalAwal, $tanggalAkhir)
    {
        return $this->db->query("SELECT pembiayaan, biaya_administrasi, margin FROM tb_pembiayaan WHERE tanggal_peminjaman BETWEEN " . "'" . $tanggalAwal . "' AND '" . $tanggalAkhir . "'")->result();
    }

}
