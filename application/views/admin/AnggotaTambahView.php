<!--
/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-16 15:26:41
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-17 22:12:25
 */
-->


<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Admin</title>
        <?php $this->load->view('layout/CssLayout') ?>
    </head>
    <body>

        <?php $this->load->view('layout/HeaderLayout') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Anggota</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="<?php echo base_url(); ?>index.php/admin/AnggotaController/simpanAnggota">

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input name="nama" type="text" class="form-control" id="password" placeholder="masukkan nama anda">
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control" id="password" placeholder="masukkan tempat lahir anda">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tanggal Lahir</label>
                            <input id="datetimepicker" name="tanggal_lahir" type="text" class="form-control" id="password" placeholder="masukkan tanggal lahir anda">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select type="text" name="jenis_kelamin" class="form-control required">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input name="telepon" type="number" class="form-control" id="password" placeholder="masukan nomer telepon anda"
                        </div>
                        <div class="form-group">
                            <label for="rembug">Rembug</label>
                            <select type="text" name="rembug" class="form-control required">
                                <option value="Dewan">Dewan</option>
                                <option value="Surya Legi Nyata">Surya Legi Nyata</option>
                                <option value="Pratama">Pratama</option>
                                <option value="Maju Bersama">Maju Bersama</option>
                                <option value="Arafah">Arafah</option>
                                <option value="Bunga Raya">Bunga Raya</option>
                                <option value="Mawar">Mawar</option>
                                <option value="Al-Falah">Al-Falah</option>
                                <option value="Kartun">Kartun</option>
                                <option value="Bougenville">Bougenville</option>
                                <option value="Matahari">Matahari</option>
                                <option value="Teratai">Teratai</option>
                                <option value="Mina">Mina</option>
                                <option value="Asoka">Asoka</option>
                                <option value="LaaTanza">LaaTanza</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="setoran_awal">Setoran Awal</label>
                            <input name="setoran_awal" type="text" class="form-control angka" id="password" placeholder="masukkan setoran awal anda">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" type="text" class="form-control" id="password" placeholder="masukkan alamat anda"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control" id="password" placeholder="masukkan password anda">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="masukkan password anda">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select type="text" name="status" class="form-control required">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $hash; ?>" />
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url(); ?>index.php/admin/AnggotaController/index">
                            <button type="button" class="btn btn-warning">Batal</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>

        <?php $this->load->view('layout/JsLayout') ?>
        <script type="text/javascript">
            jQuery('#datetimepicker').datetimepicker({
                timepicker: false,
                mask: true,
                format: 'd/m/Y'
            });
        </script>
    </body>
</html>
