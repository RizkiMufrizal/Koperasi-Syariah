<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-16 19:25:19
 * @Last Modified by:   adhibarfan
 * @Last Modified time: 2016-08-18 21:56:11
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
                    <li><a href="<?php echo base_url(); ?>index.php/admin/AnggotaController/index">Data Anggota</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/SimpananAnggotaController/index/<?php echo $this->uri->segment(4); ?>">Data Simpanan Anggota</a></li>
                    <li>Tambah Pengambilan</li>
                </ol>
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Pengambilan Simpanan Anggota</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="<?php echo base_url(); ?>index.php/admin/SimpananAnggotaController/simpanSimpananAnggotaPengambilan/<?php echo $this->uri->segment(4); ?>">

                        <div class="form-group">
                            <label for="datetimepicker">Tanggal Transaksi</label>
                            <input id="datetimepicker" name="tanggal_transaksi" class="form-control" placeholder="masukkan Tanggal Transaksi anda" required>
                        </div>

                        <div class="form-group">
                            <label for="pengambilan">Pengambilan</label>
                            <input name="pengambilan" type="text" class="form-control angka" id="pengambilan" placeholder="masukkan Pengambilan anda" required>
                        </div>

                        <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $hash; ?>" />
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url(); ?>index.php/admin/SimpananAnggotaController/index/<?php echo $this->uri->segment(4); ?>">
                            <button type="button" class="btn btn-warning">Batal</button>
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