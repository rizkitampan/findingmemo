<h3>Jenis Perihal</h3>
<table data-mode='reflow' data-ajax='false'>
	<tr>
		<td>No</td>
		<td>Jenis Perihal</td>
		<td>Keterangan</td>
		<td>Aksi</td>
	</tr>
	<?php
		//$no=1;
		foreach($jenal as $jp){
			$id=$jp->id_jenhal;
			$nm=$jp->nm_jenis_perihal;
			$ket=$jp->keterangan;
	?>
	<tr>
		<td><?php echo $id;?></td>
		<td><?php echo $nm;?></td>
		<td><?php echo $ket?></td>
		<td><a href="<?php echo site_url();?>Administrator/frmubahjenishal/<?php echo $id;?>"><button>Ubah</button></a>
			  <a href="<?php echo site_url();?>Administrator/getidhapusjenhal/<?php echo $id;?>" data-ajax="false"><button onclick="return confirm('Apakah Anda yakin menghapus data <?php echo $nm;?>')">Hapus</button></a>
		</td>
	</tr>
	<?php
		}
	?>
</table>
<a href="<?php echo site_url();?>Administrator/frmtambahjenhal"><button>Tambah</button></a>