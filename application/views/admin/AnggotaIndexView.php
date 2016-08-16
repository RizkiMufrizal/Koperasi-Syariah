<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-16 13:11:14
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-16 13:41:16
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
                    <h1 class="page-header">Data Anggota</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <a href="<?php echo base_url(); ?>index.php/UserController/tambahUser">
                        <button type="button" class="btn btn-primary">
                            Tambah Anggota
                        </button>
                    </a>

                    <p></p>

                    <table id="dataAnggota" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">ID Anggota</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Rembug</th>
                                <th class="text-center">Setoran Awal</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($record as $s) {?>
                                <tr>
                                    <td><?php echo $s->id_anggota; ?></td>
                                    <td><?php echo $s->nama; ?></td>
                                    <td><?php echo $s->rembug; ?></td>
                                    <td><?php echo $s->setoran_awal; ?></td>
                                    <td><?php echo $s->status; ?></td>
                                    <td class="text-center">
                                    	<a href="">
                                    		<button type="button" class="btn btn-default">
                                    			Detail
                                    		</button>
                                    	</a>
                                    	<a href="">
                                    		<button type="button" class="btn btn-default">
                                    			Simpanan Anggota
                                    		</button>
                                    	</a>
                                    	<a href="">
                                    		<button type="button" class="btn btn-default">
                                    			Pembiayaan
                                    		</button>
                                    	</a>
                                    	<a href="">
                                    		<button type="button" class="btn btn-default">
                                    			Pinjaman Instan
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
                $('#dataAnggota').DataTable();
            });
        </script>
    </body>
</html>
