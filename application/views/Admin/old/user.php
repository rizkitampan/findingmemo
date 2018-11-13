<?php $this->load->view('Admin/header');?>
<table data-mode="reflow">
	<tr>
		<td>No</td>
		<td>Nama</td>
		<td>Username</td>
		<td>Passsword</td>
		<td>Jabatan</td>
		<td>Keterangan</td>
		<td>Aksi</td>
	</tr>
	<?php
		$no=1;
		foreach($user as $us){
			$id=$us->id_user;
			$nama=$us->nama;
			$username=$us->username;
			$password=$us->password;
			$jabatan=$us->nm_jabatan;
			$ket=$us->keterangan;
	?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $nama;?></td>
		<td><?php echo $username;?></td>
		<td><?php echo $password;?></td>
		<td><?php echo $jabatan;?></td>
		<td><?php echo $ket;?></td>
		<td><a href="<?php echo base_url();?>index.php/Admin/frmubahuser/<?php echo $id;?>"><button>Ubah</button></a>
			<a href="<?php echo base_url();?>index.php/Admin/getidhapususer/<?php echo $id;?>"><button onclick="return confirm('Apakah Anda yakin menghapus data <?php echo $nama;?> ?')">Hapus</button></a>
		</td>
	</tr>
	<?php
		}
	?>
</table>
<a href="<?php echo base_url();?>Admin/frmtambahuser"><button>Tambah User</button></a>
<?php $this->load->view('Admin/footer');?>