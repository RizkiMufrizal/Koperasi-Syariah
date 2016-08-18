<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 22:53:12
 * @Last Modified by:   Aviv Arifian D
 * @Last Modified time: 2016-08-18 21:48:57
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
                <li><a href="#">Home</a></li>
                </ol>
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="jumbotron">
                    <div class="container">
                        <h1 class="text-center">Aplikasi Koperasi Syariah</h1>
                        <h2 class="text-center">Selamat Datang <?php echo $this->session->userdata('username'); ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('layout/JsLayout')?>
    </body>
</html>
