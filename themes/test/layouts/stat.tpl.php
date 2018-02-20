<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

echo "tipe = $tipe";
echo "typex = $tipex";
$_SESSION['temp_theme'] = [
  'tipe' => $tipe,
  'tipex' => $tipex
];
//isi utama
function part_content($e, $folder_themes) {
  $tipe = $_SESSION['temp_theme']['tipe'];
  $tipex = $_SESSION['temp_theme']['tipex'];
  switch ($tipe) {
    case '2':
      if($tipex == 1){
        $e->load->view($folder_themes.'/partials/statistik_sos.php');
      }
      break;
    case '3':
      $e->load->view($folder_themes.'/partials/wilayah.php');
      break;
    case '2':
      $e->load->view('statistik/dpt.php');
      break;

    default:
      $e->load->view($folder_themes.'/partials/statistik.php');
      break;
  }
  unset($_SESSION['temp_theme']);
}

//include base
$this->load->view($folder_themes.'/base.php');
 //echo $tipe.'<br>'.$tipex; ?>
<?php /*$this->load->view($folder_themes.'/layouts/header.php');?>
      <div id="contentwrapper">
        <div id="contentcolumn">
          <div class="innertube">
            <?php
            if($tipe == 2){
              if($tipex==1){
                $this->load->view($folder_themes.'/partials/statistik_sos.php');
              }
            }elseif($tipe == 3){
              $this->load->view($folder_themes.'/partials/wilayah.php');
            }elseif($tipe == 4){
              $this->load->view('statistik/dpt.php');
            }else{
              $this->load->view(Web_Controller::fallback_default($this->theme, '/partials/statistik.php'));
            }
            ?>
          </div>
        </div>
      </div>

      <div id="rightcolumn">
        <div class="innertube">
          <?php $this->load->view($folder_themes.'/partials/side.right.php');?>
        </div>
      </div>

      <div id="footer">
        <?php
        $this->load->view($folder_themes.'/partials/copywright.tpl.php');
        ?>
      </div>
    </div>
  </body>
</html>
*/?>