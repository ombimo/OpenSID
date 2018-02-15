<?php
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  $title = (!empty($judul_kategori))? $judul_kategori: "Artikel Terkini";
?>

<h1 class="main-title"><?= $title; ?></h1>
<?php if($artikel){ ?>
  <div class="artikel-container">
    <?php foreach ($artikel as $data) { 
        $abstrak = potong_teks($data['isi'], 300);
        if($data['gambar'] != '' AND is_file(LOKASI_FOTO_ARTIKEL."kecil_".$data['gambar'])) { 
          $src = AmbilFotoArtikel($data['gambar'],'kecil');
        } else {
          $src = base_url()."assets/images/404-image-not-found.jpg";
        }
        $artikelUrl = site_url('first/artikel/'.$data['id']);
    ?>
      <div class="card-artikel">
        <div class="card-artikel__main">
          <div class="card-artikel__gambar">
            <img class="img-fit" src="<?= $src;?>" alt="<?= $data['judul'];?>">
          </div>
          <div class="card-artikel__text">
            <div class="card-artikel__title">
              <a href="<?= $artikelUrl ?>"><?= $data['judul'];?></a>
            </div>
            <div class="card-artikel__tgl"><i class="fa fa-clock-o"></i> <?= tgl_indo2($data['tgl_upload']) ?></div>
            </aside>
            <div class="card-artikel__abstrak"><?= $abstrak;?>...<a href="<?= $artikelUrl;?>">selengkapnya</a></div>
            <div class="card-artikel__penulis">
              <i class="fa fa-tag"></i> <a href="<?= site_url('first/kategori/'.$data['id_kategori']);?>"><?= $data['kategori'] ?></a>
              <i class="fa fa-user"></i> <?= $data['owner'] ?>
            </div>
          </div>
        </div>
      </div>
    <?php } //end foreach artikel ?>
    <div class="paging-container card-simple">
        <ul class="pagination">
          <?php if($paging->start_link){ ?>
            <li><a href="<?= site_url('first/'.$paging_page.'/'.$paging->start_link.$paging->suffix);?>" title="Hamalan Pertama"><i class="fa fa-fast-backward"></i>&nbsp;</a></li>
          <?php } ?>
          <?php if($paging->prev){ ?>
            <li><a href="<?= site_url('first/'.$paging_page.'/'.$paging->prev.$paging->suffix);?>" title="Hamalan Sebelumnya"><i class="fa fa-backward"></i>&nbsp;</a></li>
          <?php } ?>

          <?php for($i=$paging->start_link;$i<=$paging->end_link;$i++){ 
            $active = ($p == $i)? "active":"";
          ?>
            <li class="<?= $active;?>"><a href="<?= site_url("first/".$paging_page."/$i" . $paging->suffix);?>" title="Halaman <?= $i;?>"><?= $i;?></a></li>
          <?php } ?>

          <?php if($paging->next){ ?>
            <li><a href="<?= site_url('first/'.$paging_page.'/'.$paging->next.$paging->suffix);?>" title="Hamalan Selanjutnya">&nbsp;<i class="fa fa-forward"></i></a></li>
          <?php } ?>
          <?php if($paging->end_link){ ?>
            <li><a href="<?= site_url('first/'.$paging_page.'/'.$paging->end_link.$paging->suffix);?>" title="Hamalan Terakhir">&nbsp;<i class="fa fa-fast-forward"></i></a></li>
          <?php } ?>
        </ul>
        
    </div>
  </div>
<?php }//end if artikel ?>