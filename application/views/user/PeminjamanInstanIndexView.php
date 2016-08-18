<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-18 14:55:52
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-18 14:56:38
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
                    <h1 class="page-header">Data Peminjaman Instan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <table id="dataPeminjamanInstan" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Tanggal Peminjaman</th>
                                <th class="text-center">Tanggal Jatuh Tempo</th>
                                <th class="text-center">Tanggal Pengembalian</th>
                                <th class="text-center">Pinjaman</th>
                                <th class="text-center">Biaya Administrasi</th>
                                <th class="text-center">Bagi Hasil</th>
                                <th class="text-center">Total Pinjaman</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($record as $s) {?>
                                <tr>
                                    <td><?php echo $s->tanggal_peminjaman; ?></td>
                                    <td><?php echo $s->tanggal_jatuh_tempo; ?></td>
                                    <td><?php echo $s->tanggal_pengembalian; ?></td>
                                    <td class="text-right"><?php echo number_format($s->pinjaman, 0, ',', '.'); ?></td>
                                    <td class="text-right"><?php echo number_format($s->biaya_administrasi, 0, ',', '.'); ?></td>
                                    <td class="text-right"><?php echo number_format($s->bagi_hasil, 0, ',', '.'); ?></td>
                                    <td class="text-right"><?php echo number_format($s->total_pinjaman, 0, ',', '.'); ?></td>
                                    <td><?php echo $s->keterangan; ?></td>
                                    <td><?php if ($s->status == 0) {echo "BELUM LUNAS";} else {echo "SUDAH LUNAS";}?></td>
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
                $('#dataPeminjamanInstan').DataTable();
            });
        </script>
    </body>
</html>