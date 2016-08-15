<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 15:17:19
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-15 15:31:43
 */
-->

<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Admin</title>
        <?php $this->load->view('layout/CssLayout')?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">

                            <?php if ($this->session->flashdata('pesan') != null) {?>
                                <div id="error" style="text-align: center" class="alert alert-danger">
                                    <a href="" class="close" data-dismiss="alert"> &times; </a>
                                    <strong>Error</strong><p></p> Username Dan Password Salah
                                </div>
                            <?php }?>

                            <form role="form" action="<?php echo base_url(); ?>index.php/UserController/prosesLogin">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $hash; ?>" />
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('layout/JsLayout')?>
        <script type="application/javascript">
            $.noConflict();
            jQuery(document).ready(function(){
                setTimeout(function(){
                    jQuery('#error').fadeOut('slow');
                }, 3000);
            });
        </script>
    </body>
</html>