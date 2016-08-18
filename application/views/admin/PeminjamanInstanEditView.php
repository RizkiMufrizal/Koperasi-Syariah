<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-18 14:32:21
 * @Last Modified by:   adhibarfan
 * @Last Modified time: 2016-08-18 21:55:38
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
                    <li><a href="<?php echo base_url(); ?>index.php/admin/PeminjamanInstanController/index/<?php echo $this->uri->segment(5); ?>">Data Peminjaman Instan</a></li>
                    <li>Bayar Peminjaman Instan</li>
                </ol>
                <div class="col-lg-12">
                    <h1 class="page-header">Bayar Peminjaman Instan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="<?php echo base_url(); ?>index.php/admin/PeminjamanInstanController/updatePeminjamanInstan/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>">

                        <div class="form-group">
                            <label for="datetimepicker">Tanggal Pengembalian</label>
                            <input id="datetimepicker" name="tanggal_pengembalian" class="form-control" placeholder="masukkan Tanggal Pengembalian anda">
                        </div>

                        <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $hash; ?>" />
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url(); ?>index.php/admin/PeminjamanInstanController/index/<?php echo $this->uri->segment(5); ?>">
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