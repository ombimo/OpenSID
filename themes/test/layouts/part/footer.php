<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="footer">
    <div class="container">
        <p>&copy; 2006-<?php echo date("Y");?> <a target="_blank" href="<?php echo base_url()?>index.php/siteman">Aplikasi Sistem Informasi Desa (SID)</a> yang digunakan dalam situs ini adalah <a target="_blank" href="https://github.com/OpenSID/OpenSID">OpenSID</a> <?php echo AmbilVersi()?>. <br>
  Aplikasi ini dikembangkan dari SID yang awalnya dibangun oleh <a target="_blank" href="http://www.combine.or.id">COMBINE Resource Institution</a>.</br>
  Sistem ini dikelola dengan merujuk pada lisensi <a target="_blank" href="http://www.gnu.org/licenses/gpl.html"> GNU GENERAL PUBLIC LICENSE Version 3</a><br>
  Tema dibuat oleh <a href="https://github.com/OpenSID/OpenSID">ombimo</a>
</p>
    </div>
</div>

<script src="<?php echo base_url()?>themes/test/vendor/jquery/jquery-1.12.4.min.js"></script>
<script src="<?php echo base_url()?>themes/test/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>themes/test/vendor/jssocials/jssocials.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".js-share").jsSocials({
            shares: ["facebook", "twitter", "googleplus", 
                "pinterest", "linkedin","whatsapp", "telegram", "line", "email"]
        });
    });
</script>