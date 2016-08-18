<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-18 13:16:38
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-18 14:47:50
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

                    <a href="<?php echo base_url(); ?>index.php/admin/PeminjamanInstanController/tambahPeminjamanInstan/<?php echo $this->uri->segment(4); ?>">
                        <button type="button" class="btn btn-primary">
                            Tambah Peminjaman Instan
                        </button>
                    </a>

                    <p></p>

                    <?php if ($this->session->flashdata('pesan') != null) {?>
                        <div id="error" style="text-align: center" class="alert alert-danger">
                            <a href="" class="close" data-dismiss="alert"> &times; </a>
                            <strong>Error</strong><p></p> <?php echo $this->session->flashdata('pesan'); ?>
                        </div>
                    <?php }?>

                    <p></p>

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
                                <th class="text-center">Aksi</th>
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
                                    <td class="text-center">
                                    	<?php if ($s->status == 0) {?>
                                    		<a href="<?php echo base_url(); ?>index.php/admin/PeminjamanInstanController/editPeminjamanInstan/<?php echo $s->id_peminjaman_instan; ?>/<?php echo $this->uri->segment(4); ?>">
                                            <button class="btn btn-success">
                                                Bayar
                                            </button>
                                        </a>
                                    	<?php } else {?>
                                    		<button class="btn btn-success" disabled>
                                                Bayar
                                            </button>
                                    	<?php }?>
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
                $('#dataPeminjamanInstan').DataTable();
            });
        </script>
    </body>
</html>
