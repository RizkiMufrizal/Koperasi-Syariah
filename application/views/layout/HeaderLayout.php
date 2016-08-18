<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 14:41:25
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-18 18:46:41
 */
-->

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Koperasi Syariah</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('username'); ?>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo base_url(); ?>index.php/UserController/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>

                <?php if ($this->session->userdata('role') == 'ROLE_ADMIN') {?>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/UserController/index"><i class="fa fa-dashboard fa-fw"></i> Data User</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/admin/AnggotaController/index"><i class="fa fa-dashboard fa-fw"></i> Data Anggota</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/admin/BiayaOperasionalController/index"><i class="fa fa-dashboard fa-fw"></i> Data Biaya Operasional</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/admin/BiayaAssetController/index"><i class="fa fa-dashboard fa-fw"></i> Data Biaya Asset</a>
                </li>
                <?php } else {?>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/user/IndexController/index"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/admin/SimpananAnggotaController/indexUser"><i class="fa fa-dashboard fa-fw"></i> Data Simpanan Anggota</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/admin/PembiayaanController/indexUser"><i class="fa fa-dashboard fa-fw"></i> Data Pembiayaan</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/admin/PeminjamanInstanController/indexUser"><i class="fa fa-dashboard fa-fw"></i> Data Peminjaman Instan</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/admin/AnggotaController/Profile"><i class="fa fa-dashboard fa-fw"></i> Profile</a>
                </li>
                <?php }?>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
