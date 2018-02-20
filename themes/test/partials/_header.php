<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <button type="button" 
            class="navbar-toggle collapsed" 
            data-toggle="collapse" data-target="#navbar-collapse" 
            aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <?php foreach($menu_atas as $data){?>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $data['link']?>"><?php echo $data['nama']; if(count($data['submenu'])>0) { echo "<span class='caret'></span>"; } ?></a>
                        <?php if(count($data['submenu'])>0): ?>
                            <ul class="dropdown-menu">
                                <?php foreach($data['submenu'] as $submenu): ?>
                                    <li>
                                        <a href="<?php echo $submenu['link']?>"><?php echo $submenu['nama']?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>

<div class="big-header">
  <div class="container">
    <div id="site-logo" class="big-header__logo">
      <a href="<?php echo site_url(); ?>first/">
        <img class="img-fit" src="<?php echo LogoDesa($desa['logo']);?>"
          alt="<?php echo $desa['nama_desa']?>"/>
      </a>
    </div>
    <div id="site-title" class="big-header__desa">
        <h1 class="desa__nama">
            <span id="header_sebutan_desa">
                <?php echo ucwords($this->setting->sebutan_desa." ")?>
            </span>
            <?php echo ucwords($desa['nama_desa'])?>
        </h1>
        <h2 class="desa__kecamatan"><?php echo ucwords($this->setting->sebutan_kecamatan." ".$desa['nama_kecamatan'])?><br />
        <?php echo ucwords($this->setting->sebutan_kabupaten." ".$desa['nama_kabupaten'])?></h2>
        <h3 class="desa__alamat"><?php echo $desa['alamat_kantor']?></h3>
    </div>
  </div>
</div>