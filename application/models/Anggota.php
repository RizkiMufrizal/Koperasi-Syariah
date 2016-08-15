<?php

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-15 11:44:57
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-15 12:54:38
 */

class Anggota extends CI_Model
{
    //ambil data anggota
    public function ambilAnggota()
    {
        return $this->db->get('tb_anggota');
    }

    //simpan data anggota
    public function simpanAnggota()
    {
        $id_anggota          = $this->input->post('id_anggota');
        $nama                = $this->input->post('nama');
        $tanggal_pendaftaran = $this->input->post('tanggal_pendaftaran');
        $telepon             = $this->input->post('telepon');
        $tempat_lahir        = $this->input->post('tempat_lahir');
        $tanggal_lahir       = $this->input->post('tanggal_lahir');
        $jenis_kelamin       = $this->input->post('jenis_kelamin');
        $rembug              = $this->input->post('rembug');
        $setoran_awal        = $this->input->post('setoran_awal');
        $alamat              = $this->input->post('alamat');
        $status              = $this->input->post('status');
        $username            = $this->input->post('username');

        $this->db->insert('tb_anggota', array('id_anggota' => $id_anggota,
            'nama'                                             => $nama,
            'tanggal_pendaftaran'                              => $tanggal_pendaftaran,
            'telepon'                                          => $telepon,
            'tempat_lahir'                                     => $tempat_lahir,
            'tanggal_lahir'                                    => $tanggal_lahir,
            'jenis_kelamin'                                    => $jenis_kelamin,
            'rembug'                                           => $rembug,
            'setoran_awal'                                     => $setoran_awal,
            'alamat'                                           => $alamat),
            'username' => $username);

    }

    //hapus data anggota
    public function hapusAnggota($id_anggota)
    {
        $this->db->delete('tb_anggota', array('id_anggota' => $id_anggota));
    }

}
