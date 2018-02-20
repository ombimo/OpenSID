<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="card-simple">
  <div class="card-simple__title"><span>Data Demografi Berdasar <?= $heading;?></span></div>
  <div class="card-simple__body">
    <?php if(empty($main)) { ?>
      <p>Belum ada data</p>
    <?php } else { //if empty main ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Dusun</th>
            <th>Nama Kepala Dusun</th>
            <th>Jumlah RT</th>
            <th>Jumlah KK</th>
            <th>Jiwa</th>
            <th class="head-plus-icon"><i class="fa fa-male"></i>Lk</th>
            <th class="head-plus-icon"><i class="fa fa-female"></i>Pr</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($main as $data) { ?>
            <tr>
              <td><?= $data['no']; ?></td>
              <td><?= strtoupper(unpenetration(ununderscore($data['dusun']))); ?></td>
              <td><?= strtoupper(unpenetration($data['nama_kadus'])); ?></td>
              <td class="angka"><?= $data['jumlah_rt']; ?></td>
              <td class="angka"><?= $data['jumlah_kk']; ?></td>
              <td class="angka"><?= $data['jumlah_warga']; ?></td>
              <td class="angka"><?= $data['jumlah_warga_l']; ?></td>
              <td class="angka"><?= $data['jumlah_warga_p']; ?></td>
          </tr>
        <?php }//end foreach main ?>
        </tbody>
        <tfooter>
          <tr>
            <th colspan="3" class="angka">TOTAL</th>
            <th class="angka"><?= $total['total_rt']; ?></th>
            <th class="angka"><?= $total['total_kk']; ?></th>
            <th class="angka"><?= $total['total_warga']; ?></th>
            <th class="angka"><?= $total['total_warga_l']; ?></th>
            <th class="angka"><?= $total['total_warga_p']; ?></th>
          </tr>
      </tfooter>
      </table>
    <?php }//else empty main ?>
  </div>
</div>