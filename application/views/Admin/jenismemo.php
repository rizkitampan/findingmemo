<table data-mode="reflow" data-ajax="false">
	<tr>
		<td>No</td>
		<td>Jenis Memo</td>
		<td>Keterangan</td>
		<td>Aksi</td>
	</tr>

<?php
	$no=1;
	foreach($jmemo as $jm){
		$idm=$jm->id_jemo;
		$jemo=$jm->nm_jemo;
		$ket=$jm->keterangan;
?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $jemo;?></td>
		<td><?php echo $ket;?></td>
		<td><a href="<?php echo site_url('Administrator/frmubahjmemo/'.$idm.'');?>"><button class="ui-btn ui-corner-all ui-btn-icon-left ui-icon-edit">Ubah</button></a>
		<a href="<?php echo site_url('Administrator/getidhapusjmemo/'.$idm.'');?>" data-ajax="false"><button onclick="return confirm('Apakah Anda yakin menghapus data <?php echo $jemo;?>')" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-delete">Hapus</button></a></td>
	</tr>
<?php
	}
?>
</table>
<a href="<?php echo site_url('Administrator/frmtambahjmemo');?>"><button class="ui-btn ui-corner-all ui-btn-icon-left ui-icon-plus">Tambah</button></a>

