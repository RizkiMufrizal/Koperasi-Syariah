<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-16 14:20:02
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-17 08:47:12
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
                    <h1 class="page-header">Data Simpanan Anggota</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <a href="<?php echo base_url(); ?>index.php/admin/SimpananAnggotaController/tambahSimpananAnggota/<?php echo $this->uri->segment(4); ?>">
                        <button type="button" class="btn btn-primary">
                            Tambah Simpanan Anggota
                        </button>
                    </a>

                    <a href="<?php echo base_url(); ?>index.php/admin/SimpananAnggotaController/tambahSimpananAnggotaPengambilan/<?php echo $this->uri->segment(4); ?>">
                        <button type="button" class="btn btn-success">
                            Tambah Pengambilan
                        </button>
                    </a>

                    <p></p>

                    <table id="simpananAnggota" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Tanggal Transaksi</th>
                                <th class="text-center">Simpanan Pokok</th>
                                <th class="text-center">Simpanan Sukarela</th>
                                <th class="text-center">Simpanan Hari raya Awal</th>
                                <th class="text-center">Simpanan Wajib</th>
                                <th class="text-center">Simpanan Pendidikan</th>
                                <th class="text-center">Pengambilan</th>
                                <th class="text-center">Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_simpanan_pokok      = 0;
                            $total_simpanan_sukarela   = 0;
                            $total_simpanan_hari_raya  = 0;
                            $total_simpanan_wajib      = 0;
                            $total_simpanan_pendidikan = 0;
                            $total_pengambilan         = 0;
                            ?>
                            <?php foreach ($simpananAnggota as $s) {
                                ?>
                                <tr>
                                    <td><?php echo $s->tanggal_transaksi; ?></td>
                                    <td class="text-right"><?php echo number_format($s->simpanan_pokok, 0, ',', '.'); ?></td>
                                    <td class="text-right"><?php echo number_format($s->simpanan_sukarela, 0, ',', '.'); ?></td>
                                    <td class="text-right"><?php echo number_format($s->simpanan_hari_raya, 0, ',', '.'); ?></td>
                                    <td class="text-right"><?php echo number_format($s->simpanan_wajib, 0, ',', '.'); ?></td>
                                    <td class="text-right"><?php echo number_format($s->simpanan_pendidikan, 0, ',', '.'); ?></td>
                                    <td class="text-right"><?php echo number_format($s->pengambilan, 0, ',', '.'); ?></td>
                                    <td class="text-right"><?php echo number_format($s->saldo, 0, ',', '.'); ?></td>
                                </tr>
                                <?php
                                $total_simpanan_pokok      = $total_simpanan_pokok + $s->simpanan_pokok;
                                $total_simpanan_sukarela   = $total_simpanan_sukarela + $s->simpanan_sukarela;
                                $total_simpanan_hari_raya  = $total_simpanan_hari_raya + $s->simpanan_hari_raya;
                                $total_simpanan_wajib      = $total_simpanan_wajib + $s->simpanan_wajib;
                                $total_simpanan_pendidikan = $total_simpanan_pendidikan + $s->simpanan_pendidikan;
                                $total_pengambilan         = $total_pengambilan + $s->pengambilan;
                                ?>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td class="text-right"><?php echo number_format($total_simpanan_pokok, 0, ',', '.'); ?></td>
                                <td class="text-right"><?php echo number_format($total_simpanan_sukarela, 0, ',', '.'); ?></td>
                                <td class="text-right"><?php echo number_format($total_simpanan_hari_raya, 0, ',', '.'); ?></td>
                                <td class="text-right"><?php echo number_format($total_simpanan_wajib, 0, ',', '.'); ?></td>
                                <td class="text-right"><?php echo number_format($total_simpanan_pendidikan, 0, ',', '.'); ?></td>
                                <td class="text-right"><?php echo number_format($total_pengambilan, 0, ',', '.'); ?></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <?php $this->load->view('layout/JsLayout') ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#simpananAnggota').DataTable();
            });
        </script>
    </body>
</html>
