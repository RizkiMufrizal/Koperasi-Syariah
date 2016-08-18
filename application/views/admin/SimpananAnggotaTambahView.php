<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-16 17:42:30
 * @Last Modified by:   adhibarfan
 * @Last Modified time: 2016-08-18 21:56:17
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
                    <li>Tambah Simpanan Anggota</li>
                </ol>
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Simpanan Anggota</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="<?php echo base_url(); ?>index.php/admin/SimpananAnggotaController/simpanSimpananAnggota/<?php echo $this->uri->segment(4); ?>">

                        <div class="form-group">
                            <label for="datetimepicker">Tanggal Transaksi</label>
                            <input id="datetimepicker" name="tanggal_transaksi" class="form-control" placeholder="masukkan Tanggal Transaksi anda" required>
                        </div>

                        <div class="form-group">
                            <label for="simpanan_pokok">Simpanan Pokok</label>
                            <input name="simpanan_pokok" type="text" class="form-control angka" id="simpanan_pokok" placeholder="masukkan Simpanan Pokok anda" required>
                        </div>

                        <div class="form-group">
                            <label for="simpanan_sukarela">Simpanan Sukarela</label>
                            <input name="simpanan_sukarela" type="text" class="form-control angka" id="simpanan_sukarela" placeholder="masukkan Simpanan Sukarela anda" required>
                        </div>

                        <div class="form-group">
                            <label for="simpanan_hari_raya">Simpanan Hari Raya</label>
                            <input name="simpanan_hari_raya" type="text" class="form-control angka" id="simpanan_hari_raya" placeholder="masukkan Simpanan Hari Raya anda" required>
                        </div>

                        <div class="form-group">
                            <label for="simpanan_wajib">Simpanan Wajib</label>
                            <input name="simpanan_wajib" type="text" class="form-control angka" id="simpanan_wajib" placeholder="masukkan Simpanan Wajib anda" required>
                        </div>

                        <div class="form-group">
                            <label for="simpanan_pendidikan">Simpanan Pendidikan</label>
                            <input name="simpanan_pendidikan" type="text" class="form-control angka" id="simpanan_pendidikan" placeholder="masukkan Simpanan Pendidikan anda" required>
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