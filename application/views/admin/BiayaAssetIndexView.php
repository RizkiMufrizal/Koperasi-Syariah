<!--
/**
 * @Author: Aviv Arifian D
 * @Date:   2016-08-17 20:43:41
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-17 20:45:46
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
                    <h1 class="page-header">Data Biaya Asset</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <a href="<?php echo base_url(); ?>index.php/admin/BiayaAssetController/tambahBiayaAsset/<?php echo $this->uri->segment(4); ?>">
                        <button type="button" class="btn btn-primary">
                            Tambah Biaya Asset
                        </button>
                    </a>

                    <p></p>

                    <table id="biayaOperasonal" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Inventaris</th>
                                <th class="text-center">Sumber</th>
                                <th class="text-center">keterangan</th>
                                <th class="text-center">Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;foreach ($record as $s) {
    ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $s->kode_inventaris; ?></td>
                                    <td><?php echo $s->sumber; ?></td>
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
                $('#simpananAnggota').DataTable();
            });
        </script>
    </body>
</html>
