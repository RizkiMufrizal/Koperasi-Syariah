<!--
/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-17 19:55:55
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-17 22:27:42
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
                    <h1 class="page-header">Data Biaya Operasional</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <a href="<?php echo base_url(); ?>index.php/admin/BiayaOperasionalController/tambahBiayaOperasional">
                        <button type="button" class="btn btn-primary">
                            Tambah Biaya Operasional
                        </button>
                    </a>

                    <p></p>

                    <table id="biayaOperasonal" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal Transaksi</th>
                                <th class="text-center">Jenis Beban</th>
                                <th class="text-center">keterangan</th>
                                <th class="text-center">Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;foreach ($record as $s) {?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $s->tanggal_transaksi; ?></td>
                                    <td><?php echo $s->jenis_beban; ?></td>
                                    <td><?php echo $s->keterangan; ?></td>
                                    <td class="text-right"><?php echo number_format($s->biaya, 0, ',', '.'); ?></td>
                                </tr>
                            <?php $no++;}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php $this->load->view('layout/JsLayout')?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#biayaOperasonal').DataTable();
            });
        </script>
    </body>
</html>
