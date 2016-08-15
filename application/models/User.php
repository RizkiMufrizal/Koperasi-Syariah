<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 12:42:49
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-15 13:52:40
 */

class User extends CI_Model
{
    /**
     * ambil data user
     * @return [type] [description]
     */
    public function ambilUser()
    {
        return $this->db->get('tb_user')->result();
    }

    /**
     * function ambil satu user
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function ambilSatuUser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('tb_user')->result();
    }

    /**
     * simpan user
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function simpanUser($user)
    {
        $this->db->insert('tb_user', $user);
    }

    /**
     * update user
     * @param  [type] $username [description]
     * @param  [type] $user     [description]
     * @return [type]           [description]
     */
    public function updateUser($username, $user)
    {
        $this->db->where('username', $username);
        $this->db->update('tb_user', $user);
    }

    /**
     * hapus user
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function deleteUser($username)
    {
        $this->db->where('username', $username);
        $this->db->delete('tb_user');
    }

    /**
     * function untuk login user
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function loginUser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('tb_user')->result();
    }

}
