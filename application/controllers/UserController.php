<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 13:06:36
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-15 14:29:16
 */

class UserController extends CI_Controller
{

    public function __construct()
    {
        $this->load->model('User');
    }

    /**
     * tampil data user
     * @return [type] [description]
     */
    public function index()
    {
        $data['user'] = $this->User->ambilUser();
        return $this->load->view('IndexUser', $data);
    }

    /**
     * halaman tambah user
     * @return [type] [description]
     */
    public function tambahUser()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );
        return $this->load->view('TambahUser', $csrf);
    }

    /**
     * proses simpan user
     * @return [type] [description]
     */
    public function simpanUser()
    {
        $hash = $this->bcrypt->hash_password($this->input->post('password'));
        $user = array(
            'username' => $this->input->post('username'),
            'password' => $hash,
            'role'     => $this->input->post('role'),
        );
        $this->User->simpanUser($username, $user);

        return redirect('UserController');
    }

    /**
     * edit data user, redirect ke halaman edit user
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function editUser($username)
    {
        $data = array(
            'user' => $this->User->ambilSatuUser($username),
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );
        $this->load->view('EditUser', $data);
    }

    /**
     * proses update data user
     * @return [type] [description]
     */
    public function updateUser()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user     = $this->User->ambilSatuUser($username);

        if ($this->bcrypt->check_password($password, $user[0]->username)) {
            $user = array(
                'password' => $this->input->post('password'),
                'role'     => $this->input->post('role'),
            );
        } else {
            $hash = $this->bcrypt->hash_password($this->input->post('password'));
            $user = array(
                'password' => $hash,
                'role'     => $this->input->post('role'),
            );
        }

        $this->User->updateUser($username, $user);

        return redirect('UserController');
    }

    /**
     * hapus user
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function hapusUser($username)
    {
        $this->User->deleteUser($username);

        return redirect('UserController');
    }

    /**
     * halaman login
     * @return [type] [description]
     */
    public function login()
    {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );
        return $this->load->view('LoginView', $csrf);
    }

    /**
     * proses login user
     * @return [type] [description]
     */
    public function prosesLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User->loginUser($username);

        if ($user == null) {
            return redirect('login');
        } else {
            if ($this->bcrypt->check_password($password, $user[0]->password)) {
                return redirect('admin');
            } else {
                return redirect('login');
            }
        }
    }

}
