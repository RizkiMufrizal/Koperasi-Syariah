<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-18 21:52:27
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-18 22:39:12
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
                <li>
                	<a href="<?php echo base_url(); ?>index.php/admin/">Home</a>
                </li>
                <li>
                	Laporan
                </li>
             	</ol>
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <form method="post" action="<?php echo base_url(); ?>index.php/admin/LaporanController/laporanBerdasarkanTanggal">

                        <div class="form-group">
                            <label for="datetimepicker1">Tanggal Awal</label>
                            <input id="datetimepicker1" name="tanggal_awal" class="form-control" placeholder="masukkan Tanggal Awal anda" required>
                        </div>

                        <div class="form-group">
                            <label for="datetimepicker2">Tanggal Akhir</label>
                            <input id="datetimepicker2" name="tanggal_akhir" class="form-control" placeholder="masukkan Tanggal Akhir anda" required>
                        </div>

                        <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $hash; ?>" />
                        <button type="submit" class="btn btn-primary">Proses</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form method="post" action="<?php echo base_url(); ?>index.php/admin/LaporanController/laporanBerdasarkanBulan">

                        <div class="form-group">
                            <label for="bulanAwal">Bulan Awal</label>
                            <input id="bulanAwal" name="bulanAwal" class="form-control" placeholder="masukkan Tanggal Awal anda" required>
                        </div>

                        <div class="form-group">
                            <label for="bulanAkhir">Bulan Akhir</label>
                            <input id="bulanAkhir" name="bulanAkhir" class="form-control" placeholder="masukkan Bulan Akhir anda" required>
                        </div>

                        <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $hash; ?>" />
                        <button type="submit" class="btn btn-primary">Proses</button>
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