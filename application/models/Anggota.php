<?php 

/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-15 11:44:57
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-15 11:49:31
 */

class Anggota extends CI_Model
{
	//ambil data anggota
	public function ambilAnggota()
	{
		return $this->db->get('tb_anggota');
	}
}