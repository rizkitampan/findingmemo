<?php $this->load->view('Admin/header');?>
<h3>Tambah User</h3>
<?php 
	echo form_open('Admin/prosestambahuser');
	foreach($idusr as $id){
		$idu=$id->idmax;
		$idus=$idu+1;
	}
?>
Id User<input type='text' name='idusr' value='<?php echo $idus;?>'>
Nama<input type='text' name='nama'>
Username<input type='text' name='username'>
Password<input type='text' name='password'>Keterangan
<textarea name='ket'></textarea>

<div class='ui-field-content'>
	Jabatan<br/>
		<select name='jabatan' data-native-menu='false'>
			<option value='pilih1' data-placeholder='true'>Pilih Jabatan</option>
			<?php 
				
				foreach($jabatan as $jbt){
					$idj=$jbt->id_jabatan;
					$nmj=$jbt->nm_jabatan;
			?>
			<option value='<?php echo $idj;?>'><?php echo $nmj;?></option>
			<?php
			}
			?>
		</select>
</div>

<?php 
	echo form_submit('mysubmit','Submit');
	echo form_close();
?>
<?php $this->load->view('Admin/footer');?>