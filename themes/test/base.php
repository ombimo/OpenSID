<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
      <?php $this->load->view($folder_themes.'/partials/_head.php');?>
  </head>
  <body>
    <?php $this->load->view($folder_themes.'/partials/_header.php');?>

    <div class="container main-content">
      <div class="col-md-8">
        <?php part_content($this, $folder_themes) ;?>
      </div>
      <div class="col-md-4">
        <?php $this->load->view($folder_themes.'/partials/side.right.php');?>
      </div>
    </div>

    <?php $this->load->view($folder_themes.'/partials/_footer.php');?>
  </body>
</html>