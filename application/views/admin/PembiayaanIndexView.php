<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-17 09:42:41
 * @Last Modified by:   adhibarfan
 * @Last Modified time: 2016-08-18 15:36:21
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
                <li>Pembiayaan</li>
                <div class="col-lg-12">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Pembiayaan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <a href="<?php echo base_url(); ?>index.php/admin/PembiayaanController/tambahPembiayaan/<?php echo $this->uri->segment(4); ?>">
                        <button type="button" class="btn btn-primary">
                            Tambah Pembiayaan
                        </button>
                    </a>

                    <h4>Total Saldo Anda <?php echo 'Rp ' . number_format($dataSimpananAnggota, 0, ',', '.'); ?></h4>

                    <p></p>

                    <?php if ($this->session->flashdata('pesan') != null) {?>
                        <div id="error" style="text-align: center" class="alert alert-danger">
                            <a href="" class="close" data-dismiss="alert"> &times; </a>
                            <strong>Error</strong><p></p> <?php echo $this->session->flashdata('pesan'); ?>
                        </div>
                    <?php }?>

                    <p></p>

                    <table id="dataUser" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Tanggal Peminjaman</th>
                                <th class="text-center">Tanggal Jatuh Tempo</th>
                                <th class="text-center">Pembiayaan</th>
                                <th class="text-center">Biaya Administrasi</th>
                                <th class="text-center">Jenis Pembiayaan</th>
                                <th class="text-center">Margin</th>
                                <th class="text-center">Total Pembiayaan</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($record as $s) {?>
                                <tr>
                                    <td><?php echo $s->tanggal_peminjaman; ?></td>
                                    <td><?php echo $s->tanggal_jatuh_tempo; ?></td>
                                    <td class="text-right"><?php echo number_format($s->pembiayaan, 0, ',', '.'); ?></td>
                                    <td class="text-right"><?php echo number_format($s->biaya_administrasi, 0, ',', '.'); ?></td>
                                    <td><?php echo $s->jenis_pembiayaan; ?></td>
                                    <td class="text-right"><?php echo $s->margin; ?> %</td>
                                    <td class="text-right"><?php echo number_format($s->total_pembiayaan, 0, ',', '.'); ?></td>
                                    <td><?php if ($s->status == 0) {echo "BELUM LUNAS";} else {echo "SUDAH LUNAS";}?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url(); ?>index.php/admin/AngsuranPembiayaanController/index/<?php echo $s->id_pembiayaan; ?>/<?php echo $this->uri->segment(4); ?>">
                                            <button class="btn btn-success">
                                                Bayar Angsuran
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php $this->load->view('layout/JsLayout')?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#dataUser').DataTable();
            });
        </script>
    </body>
</html>
