<table data-mode="reflow" data-ajax="false">
	<tr>
		<td>No</td>
		<td>Nama Status Memo</td>
		<td>Keterangan</td>
		<td>Aksi</td>
	</tr>

<?php
	$no=1;
	foreach($statmemo as $sm){
		$idsm=$sm->id_status;
		$nmsm=$sm->nm_status_memo;
		$ket=$sm->keterangan;	
?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $nmsm;?></td>
		<td><?php echo $ket;?></td>
		<td><a href="<?php echo site_url('Administrator/frmubahsmemo/'.$idsm.'');?>"><button class="ui-btn ui-corner-all ui-btn-icon-left ui-icon-edit">Ubah</button></a><a href="<?php echo site_url('Administrator/getidhapusstatmemo/'.$idsm.'');?>" data-ajax="false"><button onclick="return confirm('Apakah Anda yakin menghapus data <?php echo $nmsm;?>')" class="ui-btn ui-corner-all ui-btn-icon-left ui-icon-delete">Hapus</button></a></td>
	</tr>
<?php
	}
?>
</table>
<a href="<?php echo base_url();?>Administrator/frmtambahsmemo"><button class="ui-btn ui-corner-all ui-btn-icon-left ui-icon-plus">Tambah</button></a>