<h3>Form Ubah Jabatan</h3>
<?php
	foreach($jabatan as $jbt){
		$idj=$jbt->id_jabatan;
		$nmj=$jbt->nm_jabatan;
		$ket=$jbt->keterangan;
		echo form_open('Admin/prosesubahjbt/'.$idj.'');
?>
Nama Jabatan
<input type='text' name='nmj' value='<?php echo $nmj;?>'>
Keterangan
<textarea name='ket' ><?php echo $ket;?></textarea>

<?php
	}
	echo form_submit('mysubmit','Submit');
?>
