<?php
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 13:06:36
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-16 02:33:07
 */

class UserController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

    /**
     * tampil data user
     * @return [type] [description]
     */
    public function index()
    {
        $session = $this->session->userdata('loggedIn');
        if ($session == false) {
            $this->session->set_flashdata('pesan', 'maaf, anda belum melakukan login');
            return redirect('/');
        } else {
            $data['users'] = $this->User->ambilUser();
            return $this->load->view('admin/UserIndexView', $data);
        }
    }

    /**
     * halaman tambah user
     * @return [type] [description]
     */
    public function tambahUser()
    {
        $session = $this->session->userdata('loggedIn');
        if ($session == false) {
            $this->session->set_flashdata('pesan', 'maaf, anda belum melakukan login');
            return redirect('/');
        } else {
            $csrf = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
            );
            return $this->load->view('admin/UserTambahView', $csrf);
        }
    }

    /**
     * proses simpan user
     * @return [type] [description]
     */
    public function simpanUser()
    {
        $session = $this->session->userdata('loggedIn');
        if ($session == false) {
            $this->session->set_flashdata('pesan', 'maaf, anda belum melakukan login');
            return redirect('/');
        } else {
            $hash = $this->bcrypt->hash_password($this->input->post('password'));
            $user = array(
                'username' => $this->input->post('username'),
                'password' => $hash,
                'role'     => $this->input->post('role'),
            );
            $this->User->simpanUser($user);

            return redirect('UserController');
        }
    }

    /**
     * edit data user, redirect ke halaman edit user
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function editUser($username)
    {
        $session = $this->session->userdata('loggedIn');
        if ($session == false) {
            $this->session->set_flashdata('pesan', 'maaf, anda belum melakukan login');
            return redirect('/');
        } else {
            $data = array(
                'user' => $this->User->ambilSatuUser($username),
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
            );
            $this->load->view('admin/UserEditView', $data);
        }
    }

    /**
     * proses update data user
     * @return [type] [description]
     */
    public function updateUser()
    {
        $session = $this->session->userdata('loggedIn');
        if ($session == false) {
            $this->session->set_flashdata('pesan', 'maaf, anda belum melakukan login');
            return redirect('/');
        } else {
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
    }

    /**
     * hapus user
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function hapusUser($username)
    {
        $session = $this->session->userdata('loggedIn');
        if ($session == false) {
            $this->session->set_flashdata('pesan', 'maaf, anda belum melakukan login');
            return redirect('/');
        } else {
            $this->User->deleteUser($username);

            return redirect('UserController');
        }
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
        return $this->load->view('admin/LoginView', $csrf);
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

        if (sizeof($user) == 0) {
            $this->session->set_flashdata('pesan', 'maaf, user tidak tersedia');
            return redirect('/');
        } else {
            if ($this->bcrypt->check_password($password, $user[0]->password)) {
                $sessionArray = array('username' => $user[0]->username, 'role' => $user[0]->role, 'loggedIn' => true);
                $this->session->set_userdata($sessionArray);

                if ($user[0]->role == 'ROLE_ADMIN') {
                    return redirect('admin');
                } else {
                    return redirect('user/IndexController/index');
                }

            } else {
                $this->session->set_flashdata('pesan', 'maaf, password anda salah');
                return redirect('/');
            }
        }
    }

    /**
     * function untuk logout
     * @return [type] [description]
     */
    public function logout()
    {
        $this->session->unset_userdata(array('loggedIn', 'username', 'role'));
        $this->session->set_flashdata('logout', 'anda berhasil logout');
        return redirect('/');
    }

}
