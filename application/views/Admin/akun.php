<table data-mode="reflow" data-ajax="false">
	<tr>
		<td>No</td>
		<td>Kode Akun</td>
		<td>Uraian Akun</td>
		<td>Keterangan</td>
		<td>Aksi</td>
	</tr>
	<?php
		$no=1;
		foreach ($akun as $ak) {
			$ida=$ak->id_akun;
			$jna=$ak->uraian_akun;
			$ket=$ak->keterangan;
	?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $ida;?></td>
		<td><?php echo $jna;?></td>
		<td><?php echo $ket;?></td>
		<td><a href="<?php echo site_url('Administrator/frmubahmak/'.$ida.'');?>"><button class="ui-btn ui-corner-all ui-btn-icon-left ui-icon-edit">Ubah</button></a><a href="<?php echo site_url('Administrator/getidhapusmak/'.$ida.'');?>" data-ajax="false"><button onclick="return confirm('Apakah Anda yakin menghapus data <?php echo $ida;?>')" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-delete">Hapus</button></a></td>
	</tr>
	<?php
		}
	?>
</table>
<a href="<?php echo site_url('Administrator/frmtambahmak');?>"><button class="ui-btn ui-corner-all ui-btn-icon-left ui-icon-plus">Tambah</button></a>