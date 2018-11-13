<h3>Jenis Perihal</h3>
<table data-mode='reflow'>
	<tr>
		<td>No</td>
		<td>Jenis Perihal</td>
		<td>Keterangan</td>
		<td>Aksi</td>
	</tr>
	<?php
		$no=1;
		foreach($jenal as $jp){
			$id=$jp->id_jenhal;
			$nm=$jp->nm_jenis_perihal;
			$ket=$jp->keterangan;
	?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $nm;?></td>
		<td><?php echo $ket?></td>
		<td><a href="<?php echo base_url();?>index.php/admin/frmubahjenishal/<?php echo $id;?>"><button>Ubah</button></a>
			  <a href="<?php echo base_url();?>index.php/admin/getidhapusjenhal/<?php echo $id;?>"><button onclick="return confirm('Apakah Anda yakin menghapus data <?php echo $nm;?>')">Hapus</button></a>
		</td>
	</tr>
	<?php
		}
	?>
</table>
<a href="<?php echo base_url();?>index.php/admin/frmtambahjenhal"><button>Tambah</button></a>