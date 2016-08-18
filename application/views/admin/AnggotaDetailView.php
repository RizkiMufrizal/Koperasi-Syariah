<!--
/**
 * @Author: Adhib Arfan<adhib.arfan@gmail.com>
 * @Date:   2016-08-17 11:35:57
 * @Last Modified by:   adhibarfan
 * @Last Modified time: 2016-08-17 12:33:30
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
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Anggota</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php foreach ($record as $r) {
    ?>
            <div class="row">
                <div class="col-lg-12">

                    <form method="post" action="<?php echo base_url(); ?>index.php/admin/AnggotaController/simpanAnggota">

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input name="nama" type="text" class="form-control" value="<?php echo $r->nama; ?>" disabled>
                        </div>
                         <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control" value="<?php echo $r->tempat_lahir; ?>" disabled>
                        </div>
                         <div class="form-group">
                            <label for="tempat_lahir">Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="text" class="form-control" value="<?php echo $r->tanggal_lahir; ?>" disabled>
                        </div>
                         <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select type="text" name="jenis_kelamin" class="form-control required" value="<?php echo $r->jenis_kelamin; ?>" disabled>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input name="telepon" type="number" class="form-control" value="<?php echo $r->telepon; ?>" disabled>
                        </div>
                         <div class="form-group">
                            <label for="rembug">Rembug</label>
                            <select type="text" name="rembug" class="form-control required" value="<?php echo $r->rembug; ?>" disabled>
                                                <option value="Dewan">Dewan</option>
                                                <option value="SuryaLegiNyata">Surya Legi Nyata</option>
                                                <option value="Pratama">Pratama</option>
                                                <option value="MajuBersama">Maju Bersama</option>
                                                <option value="Arafah">Arafah</option>
                                                <option value="BungaRaya">Bunga Raya</option>
                                                <option value="Mawar">Mawar</option>
                                                <option value="Al - Falah">Al-Falah</option>
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
                            <input name="setoran_awal" type="number" class="form-control" value="<?php echo $r->setoran_awal; ?>" disabled>
                        </div>
                         <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input name="alamat" class="form-control" value="<?php echo $r->alamat; ?>" disabled>
                        </div>

                         <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control" value="<?php echo $r->username; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select type="text" name="status" class="form-control required" value="<?php echo $r->status; ?>" disabled>
                                                <option value="Aktif">Aktif</option>
                                                <option value="TidakAktif">Tidak Aktif</option>
                                            </select>
                        </div>
       <?php }
?>

                        <a href="<?php echo base_url(); ?>index.php/admin/AnggotaController/index">
                            <button type="button" class="btn btn-warning">Close</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>

        <?php $this->load->view('layout/JsLayout')?>
        <script type="text/javascript">
            jQuery('#datetimepicker').datetimepicker({
                timepicker: false,
                mask: true,
                format: 'd/m/Y'
            });
        </script>
    </body>
</html>
