<!--
/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-17 20:46:14
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-17 20:57:59
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
                    <h1 class="page-header">Tambah Data Biaya Asset</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="<?php echo base_url(); ?>index.php/admin/BiayaAssetController/simpanBiayaAsset/<?php echo $this->uri->segment(4); ?>">

                        <div class="form-group">
                            <label for="kode_inventaris">Kode Inventaris</label>
                            <input name="kode_inventaris" type="text" class="form-control" id="kode_inventaris" placeholder="masukkan Kode Inventaris anda">
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input name="keterangan" type="text" class="form-control" id="keterangan" placeholder="masukkan Keterangan anda">
                        </div>

                        <div class="form-group">
                            <label for="disabledSelect">Sumber</label>
                            	<select class="form-control" name="sumber">
                            		<option value="Internal">Internal</option>
                            		<option value="Eksternal">Eksternal</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="biaya">Biaya</label>
                            <input name="biaya" type="text" class="form-control" id="biaya" placeholder="masukkan Biaya anda">
                        </div>

                        <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $hash; ?>" />
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url(); ?>index.php/admin/BiayaAssetController/index/<?php echo $this->uri->segment(4); ?>">
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