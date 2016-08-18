<!--
/**
 * @Author: Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Date:   2016-08-15 14:41:25
 * @Last Modified by:   RizkiMufrizal
 * @Last Modified time: 2016-08-17 22:03:05
 */
-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/autoNumeric.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    	$('.angka').autoNumeric("init", {
        	aSign: 'Rp '
        });
    });
</script>