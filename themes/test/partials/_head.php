<title><?php
        echo $this->setting->website_title
            . ' ' . ucwords($this->setting->sebutan_desa)
            . (($desa['nama_desa']) ? ' ' . $desa['nama_desa'] : '')
            . get_dynamic_title_page_from_path();
    ?></title>
    <meta content="utf-8" http-equiv="encoding">
    <meta name="keywords" content="OpenSID,opensid,sid,SID,SID CRI,SID-CRI,sid cri,sid-cri,Sistem Informasi Desa,sistem informasi desa, desa <?php echo $desa['nama_desa'];?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:site_name" content="<?php echo $desa['nama_desa'];?>"/>
<meta property="og:type" content="article"/>
    <?php if(isset($single_artikel)): ?>
    <meta property="og:title" content="<?php echo $single_artikel["judul"];?>"/>
    <meta property="og:url" content="<?php echo base_url()?>index.php/first/artikel/<?php echo $single_artikel['id'];?>"/>
    <meta property="og:image" content="<?php echo base_url()?><?php echo LOKASI_FOTO_ARTIKEL?>sedang_<?php echo $single_artikel['gambar'];?>"/>
    <meta property="og:description" content="<?php echo potong_teks($single_artikel['isi'], 300)?> ..."/>
        <meta name="description" content="<?php echo potong_teks($single_artikel['isi'], 300)?> ..."/>
  <?php else: ?>
        <meta name="description" content="Website <?php echo ucwords($this->setting->sebutan_desa).' '.$desa['nama_desa'];?>"/>
    <?php endif; ?>
    <?php if(is_file(LOKASI_LOGO_DESA . "favicon.ico")): ?>
        <link rel="shortcut icon" href="<?php echo base_url()?><?php echo LOKASI_LOGO_DESA?>favicon.ico" />
    <?php else: ?>
        <link rel="shortcut icon" href="<?php echo base_url()?>favicon.ico" />
    <?php endif; ?>

    <?php //load boostrap ?>

<link rel='Stylesheet' type='text/css' 
    href="<?php echo base_url()?>themes/test/vendor/bootstrap/css/bootstrap.min.css"  />

  <link type='text/css' href="<?php echo base_url()?>assets/front/css/first.css" rel='Stylesheet' />

  <!-- Styles untuk tema dan penyesuaiannya di folder desa -->
  <link type='text/css' href="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/css/first.css'?>" rel='Stylesheet' />
    <?php if(is_file("desa/css/".$this->theme."/desa-web.css")): ?>
        <link type='text/css' href="<?php echo base_url()?>desa/css/<?php echo $this->theme ?>/desa-web.css" rel='Stylesheet' />
    <?php endif; ?>

    <link type='text/css' href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel='Stylesheet' />
    <link rel='Stylesheet' type='text/css' 
    href="<?= base_url()?>themes/test/vendor/jssocials/jssocials.css"  />
    <link rel='Stylesheet' type='text/css' 
    href="<?= base_url()?>themes/test/vendor/jssocials/jssocials-theme-flat.css"  />

    <script src="<?php echo base_url()?>themes/test/vendor/jquery/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url()?>themes/test/vendor/bootstrap/js/bootstrap.min.js"></script>