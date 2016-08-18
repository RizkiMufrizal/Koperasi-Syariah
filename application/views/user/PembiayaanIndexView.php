<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-17 22:59:43
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-18 22:01:45
 */
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman User</title>
        <?php $this->load->view('layout/CssLayout')?>
    </head>
    <body>

        <?php $this->load->view('layout/HeaderLayout')?>

        <div id="page-wrapper">
            <div class="row">
            <p></p>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>index.php/user/IndexController/">Home</a></li>
                <li>Data Pembiayaan Anggota</li>
            </ol>
                <div class="col-lg-12">
                    <h1 class="page-header">Data Pembiayaan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

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
                            <?php foreach ($pembiayaan as $s) {?>
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
                                        <a href="<?php echo base_url(); ?>index.php/admin/AngsuranPembiayaanController/indexUser/<?php echo $s->id_pembiayaan; ?>">
                                            <button class="btn btn-primary">
                                                Lihat Bayar Angsuran
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
