<!--
/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-17 20:07:26
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-17 20:50:10
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
                    <h1 class="page-header">Tambah Data Biaya Operasional</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="<?php echo base_url(); ?>index.php/admin/BiayaOperasionalController/simpanBiayaOperasional/<?php echo $this->uri->segment(4); ?>">

                        <div class="form-group">
                            <label for="datetimepicker">Tanggal Transaksi</label>
                            <input id="datetimepicker" name="tanggal_transaksi" class="form-control" placeholder="masukkan Tanggal Transaksi anda">
                        </div>

                        <div class="form-group">
                            <label for="jenis_beban">Jenis Beban</label>
                            <input name="jenis_beban" type="text" class="form-control" id="jenis_beban" placeholder="masukkan Jenis Beban anda">
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input name="keterangan" type="text" class="form-control" id="keterangan" placeholder="masukkan Keterangan anda">
                        </div>

                        <div class="form-group">
                            <label for="biaya">Biaya</label>
                            <input name="biaya" type="text" class="form-control" id="biaya" placeholder="masukkan Biaya anda">
                        </div>

                        <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $hash; ?>" />
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url(); ?>index.php/admin/BiayaOperasionalController/index/<?php echo $this->uri->segment(4); ?>">
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