<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-16 01:27:33
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-18 22:45:17
 */

class BiayaOperasional extends CI_Model
{
    /**
     * ambil data biaya operasional
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function ambilBiayaOperasional()
    {
        $this->db->order_by("tanggal_transaksi", "desc");
        return $this->db->get('tb_biaya_operasional')->result();
    }

    /**
     * function untuk simpan biaya operasional
     * @param  [type] $biayaOperasional [description]
     * @return [type]                   [description]
     */
    public function simpanBiayaOperasional($biayaOperasional)
    {
        $this->db->insert('tb_biaya_operasional', $biayaOperasional);
    }

    /**
     * ambil data biaya operasional berdasarkan dua tanggal
     * @param  [type] $tanggalAwal  [description]
     * @param  [type] $tanggalAkhir [description]
     * @return [type]               [description]
     */
    public function ambilBiayaOperasionalBerdasarkanDuaTanggal($tanggalAwal, $tanggalAkhir)
    {
        return $this->db->query("SELECT biaya FROM tb_biaya_operasional WHERE tanggal_transaksi BETWEEN " . "'" . $tanggalAwal . "' AND '" . $tanggalAkhir . "'")->result();
    }
}
