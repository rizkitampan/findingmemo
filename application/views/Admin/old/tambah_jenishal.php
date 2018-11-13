<h3>Form Tambah Jenis Hal</h3>
<?php
	echo form_open('Admin/prosestambahjenhal');
	foreach($jhal as $jh){
		$id=$jh->idmax;
		$idh=$id+1;
?>

Id Jenis Perihal
<input type='text' name='idh' value='<?php echo $idh;?>' disabled>
Nama Jenis Perihal
<input type='text' name='nmh'>
Keterangan
<textarea name='ket'></textarea>

<?php 
	}
	echo form_submit('mysubmit','Tambah');
?>