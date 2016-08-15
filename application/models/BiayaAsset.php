<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-16 01:29:44
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-16 01:32:09
 */

class BiayaAsset extends CI_Model
{

    /**
     * funtion untuk ambil data biaya asset
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function ambilBiayaAsset()
    {
        return $this->db->get('tb_biaya_asset')->result();
    }

    /**
     * function untuk simpan data asset
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function simpanBiayaAsset($biayaAsset)
    {
        $this->db->insert('tb_biaya_asset', $biayaAsset);
    }
}
