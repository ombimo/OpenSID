<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php if($single_artikel["id"]){ ?>
<div class="artikel-detail">
  <div class="card-simple">
    <h2 class="artikel-detail__judul"><?= $single_artikel['judul'];?></h2>
    <h3 class="kecil">
      <i class="fa fa-user"></i><?= $single_artikel['owner'] ;?>
      <i class="fa fa-clock-o"></i><?= tgl_indo2($single_artikel['tgl_upload']); ?>
    <?php if (trim($single_artikel['kategori']) != '') { ?>
      <i class='fa fa-tag'></i> <a href="<?= site_url('first/kategori/'.$single_artikel['id_kategori']); ?>">
      <?= $single_artikel['kategori'] ;?></a>
      <?php }//end kategori ?>
        </h3>
  </div>
  <div class="card-simple">

    <?php if($single_artikel['gambar']!='') {
      if(is_file(LOKASI_FOTO_ARTIKEL."sedang_".$single_artikel['gambar'])) { ?>
        <div class="artikel-detail__sampul">
          <a class="group2" href="<?= AmbilFotoArtikel($single_artikel['gambar'],'sedang') ?>">
            <img src="<?= AmbilFotoArtikel($single_artikel['gambar'],'sedang');?>"
              alt="<?= $single_artikel['judul'];?>"></a>
        </div>
    <?php } }//end jika ada gambar dan file gambar ada ?>
      <div class="artikel-detail__isi"><?= $single_artikel['isi']; ?></div>
    <?php if($single_artikel['dokumen']!=''){
            if(is_file(LOKASI_DOKUMEN.$single_artikel['dokumen'])) { ?>
        <p>Dokumen Lampiran : <a href="<?= base_url().LOKASI_DOKUMEN.$single_artikel['dokumen'];?>"><?= $single_artikel['link_dokumen'];?></a></p>
    <?php } }//end jika ada dokumen lampiran ?>
    <div class="clearfix">
    <?php for ($i=1; $i < 4 ; $i++) {
      $gambar_tambahan = $single_artikel['gambar'.$i];
      if($gambar_tambahan!='') {
        if(is_file(LOKASI_FOTO_ARTIKEL."sedang_".$gambar_tambahan)) { ?>
          <div class="artikel-detail__gambar-tambahan">
            <a class="group2" href="<?= AmbilFotoArtikel($gambar_tambahan,'sedang') ?>">
              <img src="<?= AmbilFotoArtikel($gambar_tambahan,'sedang');?>"
                alt="<?= $single_artikel['judul'];?>"></a>
          </div>
    <?php } } } //end loop gambar tambahan?>
    </div>
  </div>

  <div class="card-simple">
    <div class="card-simple__title"><span>Share</span></div>
    <div class="js-share"></div>
  </div>

  <?php if(is_array($komentar) and !empty($komentar)) { ?>
    <div class="card-simple">
      <div class="card-simple__title"><span>Komentar</span></div>
      <div class="komentar-container">
      <?php foreach ($komentar as $value) { 
        if($value['enabled']==1){ ?>
        <div class="box-komentar">
          <div class="box-komentar__author"><?= $value['owner'];?></div>
          <div class="box-komentar__time"><i class="fa fa-clock-o"></i> <?= tgl_indo2($value['tgl_upload']) ?></div>
          <div class="box-komentar__body"><?= $value['komentar'];?></div>
        </div>
      <?php } } //end foreach?>
      </div>
    </div>
  <?php } //end komentar?>
  
  <?php if($single_artikel['boleh_komentar']){ ?>
    <div class="card-simple">
      <div class="card-simple__title"><span>Formulir Komentar</span></div>
      <div class="card-simple__body">
        <form id="form-komentar" name="form" 
          action="<?= site_url("first/add_comment/".$single_artikel["id"]) ?>" 
          method="POST" onSubmit="return validasi(this)" class="form-horizontal">
          <?php
          if (isset($_SESSION['validation_error']) AND $_SESSION['validation_error']) $label = 'label-danger'; else $label = 'label-info'; ?>

        <?php
          $alertClass = ((isset($_SESSION['validation_error']) 
                AND $_SESSION['validation_error'])) ? 'alert-danger' : 'alert-info';
          if ($flash_message) { ?>
          <div class="form-group">
            <div class="col-md-12">
              <div class="alert alert-dismissible <?= $alertClass;?>" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= $flash_message ?>
              </div>
            </div>
          </div>
        <?php }//end if flash message ?>

          <div class="form-group">
            <div class="col-md-4">
              <label for="fk-nama">Nama</label>
            </div>
            <div class="col-md-8">
              <input class="form-control" type="text" name="owner" maxlength="30" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              <label for="fk-nama">Alamat E-Mail</label>
            </div>
            <div class="col-md-8">
              <input class="form-control" type="email" name="email">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              <label for="fk-nama">Komentar</label>
            </div>
            <div class="col-md-8">
              <textarea name="komentar" class="form-control" rows="5" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8 col-md-push-4">
              <img id="captcha" src="<?= base_url()."securimage/securimage_show.php"; ?>" alt="CAPTCHA Image">
              <a href="#!" onclick="document.getElementById('captcha').src = '<?= base_url() ;?>securimage/securimage_show.php?' + Math.random(); return false">[ Ganti gambar ]</a>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-3 col-md-push-4">
              <input class="form-control" type="text" name="captcha_code" maxlength="6" 
                value="<?= $_SESSION['post']['captcha_code'];?>" required>
            </div>
            <div class="col-md-8 col-md-push-4">
              <p class="help-block">Isikan kode di gambar</p>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8 col-md-push-4">
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12"><blockquote>Gunakan bahasa yang santun dan Komentar baru terbit setelah disetujui Admin</blockquote></div>
          </div>

        </form>
      </div>
    </div>
  <?php } //end if boleh komentar?>
</div>
<?php } else {//end if ada artikel ?>
  <div class="card-simple bs-callout bs-callout-danger">
    <h4>Maaf, data tidak ditemukan</h4>
    <p>Anda telah terdampar di halaman yang datanya tidak ada lagi di web ini. Mohon periksa kembali, atau laporkan kepada kami.</p>
  </div>

<?php } //else jika artikel tidak ada?>