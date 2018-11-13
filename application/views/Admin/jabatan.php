<table data-mode="reflow" data-ajax="false">
	<tr>
		<td>No</td>
		<td>Nama Jabatan</td>
		<td>Keterangan</td>
		<td>Aksi</td>
	</tr>
		<?php
			$no=1;
			foreach($jabatan as $jbt){
				$id=$jbt->id_jabatan;
				$nm=$jbt->nm_jabatan;
				$ket=$jbt->keterangan;

		?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $nm;?></td>
		<td><?php echo $ket;?></td>
		<td><a href="<?php echo base_url();?>Administrator/frmubahjabatan/<?php echo $id;?>"><button>Ubah</button></a>
			<a href="<?php echo base_url();?>Administrator/getidhapusjbt/<?php echo $id;?>" data-ajax="false"><button onclick="return confirm('Apakah Anda yakin menghapus data <?php echo $nm;?> ?')">Hapus</button></a>
		</td>
		
	</tr>
		<?php
			}
		?>
</table>
<a href="<?php echo base_url();?>Administrator/frmtambahjabatan"><button>Tambah</button></a>
