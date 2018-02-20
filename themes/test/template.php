<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

//isi utama
function part_content($e, $folder_themes) {
  $e->load->view($folder_themes.'/partials/content.php');
}

//include base
$this->load->view($folder_themes.'/base.php');