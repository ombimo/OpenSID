<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
function part_content($e, $folder_themes) {
  $e->load->view($folder_themes.'/partials/artikel.php');
}
$this->load->view($folder_themes.'/base.php');