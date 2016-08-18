<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-16 01:41:30
 * @Last Modified by:   adhibarfan
 * @Last Modified time: 2016-08-18 21:57:55
 */
-->

<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Admin</title>
        <?php $this->load->view('layout/CssLayout')?>
    </head>
    <body>

        <?php $this->load->view('layout/HeaderLayout')?>

        <div id="page-wrapper">
            <div class="row">
            <p></p>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>index.php/admin/">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/UserController/index">Data User</a></li>
                    <li>Edit Data User</li>
                </ol>
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="<?php echo base_url(); ?>index.php/UserController/updateUser">
                        <?php foreach ($user as $s) {?>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input value="<?php echo $s->username; ?>" name="username1" type="text" class="form-control" id="username" placeholder="masukkan username anda" disabled>
                            <input value="<?php echo $s->username; ?>" name="username" type="hidden" class="form-control" id="username" placeholder="masukkan username anda" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input value="<?php echo $s->password; ?>" name="password" type="password" class="form-control" id="password" placeholder="masukkan password anda" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select value="<?php echo $s->role; ?>" name="role" id="role" class="form-control">
                                <option value="ROLE_ADMIN">Role Admin</option>
                                <option value="ROLE_USER">Role User</option>
                            </select>
                        </div>
                        <?php }?>
                        <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $hash; ?>" />
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url(); ?>index.php/UserController/index">
                            <button type="button" class="btn btn-warning">Batal</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>

        <?php $this->load->view('layout/JsLayout')?>
    </body>
</html>
