<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-18 14:00:56
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-18 14:10:41
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
                    <h1 class="page-header">Tambah Data Peminjaman Instan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="<?php echo base_url(); ?>index.php/admin/PeminjamanInstanController/simpanPeminjamanInstan/<?php echo $this->uri->segment(4); ?>">

                        <div class="form-group">
                            <label for="datetimepicker1">Tanggal Peminjaman</label>
                            <input id="datetimepicker1" name="tanggal_peminjaman" class="form-control" placeholder="masukkan Tanggal Peminjaman anda">
                        </div>

                        <div class="form-group">
                            <label for="datetimepicker2">Tanggal Jatuh Tempo</label>
                            <input id="datetimepicker2" name="tanggal_jatuh_tempo" class="form-control" placeholder="masukkan Tanggal Jatuh Tempo anda">
                        </div>

                        <div class="form-group">
                            <label for="pinjaman">Pinjaman</label>
                            <input id="pinjaman" name="pinjaman" class="form-control angka" placeholder="masukkan Pinjaman anda">
                        </div>

                         <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" class="form-control" placeholder="masukkan Keterangan anda"></textarea>
                        </div>

                        <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $hash; ?>" />
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url(); ?>index.php/admin/PeminjamanInstanController/index/<?php echo $this->uri->segment(4); ?>">
                            <button type="button" class="btn btn-warning">Batal</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>

        <?php $this->load->view('layout/JsLayout')?>
        <script type="text/javascript">
            jQuery('#datetimepicker1').datetimepicker({
                timepicker: false,
                mask: true,
                format: 'd/m/Y'
            });
            jQuery('#datetimepicker2').datetimepicker({
                timepicker: false,
                mask: true,
                format: 'd/m/Y'
            });
        </script>
    </body>
</html>