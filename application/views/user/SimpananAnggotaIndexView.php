<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-16 19:56:02
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-18 21:58:01
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
                <li><a href="<?php echo base_url(); ?>index.php/user/IndexController/">Home</a></li>
                <li>Data Simpanan Anggota</li>
            </ol>
                <div class="col-lg-12">
                    <h1 class="page-header">Data Simpanan Anggota</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

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
                            <?php foreach ($simpananAnggota as $s) {?>
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
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php $this->load->view('layout/JsLayout')?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#simpananAnggota').DataTable();
            });
        </script>
    </body>
</html>