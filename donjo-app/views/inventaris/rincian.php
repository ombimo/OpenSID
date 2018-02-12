<script>
	$(function() {
		var keyword = <?php echo $keyword?> ;
		$( "#cari" ).autocomplete({
			source: keyword
		});
	});
</script>

<div id="pageC">
<table class="inner">
<tr style="vertical-align:top">

		<td class="side-menu">
		<?php
		$this->load->view('inventaris/menu_kiri.php')
		?>
		</td>
	<td style="background:#fff;padding:0px;">
		<div id="contentpane">
			<form id="mainform" name="mainform" action="" method="post">
		    <div class="ui-layout-north panel">
					<div class="content">
						<h3>Mutasi Inventaris > Jenis Barang: <?php echo $jenis['nama']?></h3>
					</div>
		      <div class="left">
		        <div class="uibutton-group">
		          <a href='<?php echo site_url("{$this->controller}/form/$jenis[id]/$p/$o")?>' class="uibutton tipsy south" title="Tambah Data" ><span class="fa fa-plus-square">&nbsp;</span>Tambah Mutasi Inventaris</a>
		        </div>
		      </div>
		    </div>
		    <div class="ui-layout-center" id="maincontent" style="padding: 5px;">
		      <div class="table-panel top">
		        <div class="right">
		          <input name="cari" id="cari" type="text" class="inputbox help tipped" size="20" value="<?php echo $cari?>" title="Cari.." onkeypress="if (event.keyCode == 13) {$('#'+'mainform').attr('action','<?php echo site_url("$this->controller/search")?>');$('#'+'mainform').submit();}" />
		          <button type="button" onclick="$('#'+'mainform').attr('action','<?php echo site_url("$this->controller/search")?>');$('#'+'mainform').submit();" class="uibutton tipsy south"  title="Cari Data"><span class="fa fa-search">&nbsp;</span>Cari</button>
		        </div>
		      </div>
		      <table class="list">
						<thead>
		          <tr>
		            <th rowspan="3" class="nostretch">No</th>
		            <th rowspan="3" class="nostretch">Aksi</th>
						 		<?php  if($o==2) {$icon_sort = 'fa-sort-asc'; $kode_sort = 1;}
						 					 elseif ($o==1) {$icon_sort = 'fa-sort-desc'; $kode_sort = 2;}
						 					 else {$icon_sort = 'fa-sort'; $kode_sort = 1;}
						 		?>
						 		<th rowspan="3">
									<a href="<?php echo site_url("{$this->controller}/index/$p/$kode_sort")?>">Tanggal Mutasi <span class="fa <?php echo $icon_sort;?> fa-sm">&nbsp;</span></a>
								<th rowspan="3">
									<a href="<?php echo site_url("{$this->controller}/index/$p/$kode_sort")?>">Jenis Mutasi <span class="fa <?php echo $icon_sort;?> fa-sm">&nbsp;</span></a>
								<th rowspan="3">Keterangan</th>
								</th>
								<th colspan="5">Asal Barang</th>
								<th colspan="3">Penghapusan</th>
						 		<?php  if($o==4) {$icon_sort = 'fa-sort-asc'; $kode_sort = 3;}
						 					 elseif ($o==3) {$icon_sort = 'fa-sort-desc'; $kode_sort = 4;}
						 					 else {$icon_sort = 'fa-sort'; $kode_sort = 3;}
						 		?>
							<tr>
								<th rowspan="2">Dibeli Sendiri</th>
								<th colspan="3">Bantuan</th>
								<th rowspan="2">Sumbangan</th>
								<th rowspan="2">Rusak</th>
								<th rowspan="2">Dijual</th>
								<th rowspan="2">Disumbang</th>
							</tr>
							<tr>
								<th>Pemerintah</th>
								<th>Provinsi</th>
								<th>Kabupaten</th>
							</tr>
						</thead>
						<tbody>
					    <?php $i = 0;
					    	foreach($main as $data){
					    		$i++; ?>
								<tr>
									<td align="center" width="2"><?php echo $i+$paging->offset?></td>
									<td>
										<div class="uibutton-group" style="display: flex;">
											<a href="<?php echo site_url("{$this->controller}/form/$jenis[id]/$p/$o/$data[id]")?>" class="uibutton tipsy south fa-tipis" title="Ubah Data"><span class="fa fa-edit fa-tipis"></span> Ubah</a>
											<a href="<?php echo site_url("{$this->controller}/delete/$jenis[id]/$p/$o/$data[id]")?>" class="uibutton tipsy south" title="Hapus Data" target="confirm" message="Apakah Anda Yakin?" header="Hapus Data"><span class="fa fa-trash"><span></a>
										</div>
								  </td>
								  <td><?php echo tgl_indo($data['tanggal_mutasi'])?></td>
								  <td><?php echo $data['jenis_mutasi']?></td>
								  <td><?php echo $data['keterangan']?></td>
								  <td><?php echo $data['asal_sendiri']?></td>
								  <td><?php echo $data['asal_pemerintah']?></td>
								  <td><?php echo $data['asal_provinsi']?></td>
								  <td><?php echo $data['asal_sumbangan']?></td>
								  <td><?php echo $data['asal_kab']?></td>
								  <td><?php echo $data['hapus_rusak']?></td>
								  <td><?php echo $data['hapus_dijual']?></td>
								  <td><?php echo $data['hapus_sumbangkan']?></td>
								</tr>
					    <?php }?>
						</tbody>
			    </table>
		    </div>
			</form>
		  <div class="ui-layout-south panel bottom">
		    <div class="left">
					<div class="table-info">
		        <form id="paging" action="<?php echo site_url($this->controller.'/index/')?>" method="post">
						  <label>Tampilkan</label>
		          <select name="per_page" onchange="$('#paging').submit()" >
		            <option value="20" <?php  selected($per_page,20); ?> >20</option>
		            <option value="50" <?php  selected($per_page,50); ?> >50</option>
		            <option value="100" <?php  selected($per_page,100); ?> >100</option>
		          </select>
		          <label>Dari</label>
		          <label><strong><?php echo $paging->num_rows?></strong></label>
		          <label>Total Data</label>
		        </form>
		      </div>
		    </div>
		    <div class="right">
		      <div class="uibutton-group">
		        <?php  if($paging->start_link): ?>
							<a href="<?php echo site_url("{$this->controller}/index/$paging->start_link/$o")?>" class="uibutton"  ><span class="fa fa-fast-backward"></span> Awal</a>
						<?php  endif; ?>
						<?php  if($paging->prev): ?>
							<a href="<?php echo site_url("{$this->controller}/index/$paging->prev/$o")?>" class="uibutton"  ><span class="fa fa-step-backward"></span> Prev</a>
						<?php  endif; ?>
		      </div>
		      <div class="uibutton-group">

						<?php  for($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
							<a href="<?php echo site_url("{$this->controller}/index/$i/$o")?>" <?php  jecho($p,$i,"class='uibutton special'")?> class="uibutton"><?php echo $i?></a>
						<?php  endfor; ?>
		      </div>
		      <div class="uibutton-group">
					<?php  if($paging->next): ?>
						<a href="<?php echo site_url("{$this->controller}/index/$paging->next/$o")?>" class="uibutton">Next <span class="fa fa-step-forward"></span></a>
					<?php  endif; ?>
					<?php  if($paging->end_link): ?>
		        <a href="<?php echo site_url("{$this->controller}/index/$paging->end_link/$o")?>" class="uibutton">Akhir <span class="fa fa-fast-forward"></span></a>
					<?php  endif; ?>
		    </div>
		  </div>
		</div>
	</td>
</tr>
</table>
</div>
