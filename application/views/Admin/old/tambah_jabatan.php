<h3>Form Tambah Jabatan</h3>
<?php echo form_open('Admin/prosestambahjabatan');

	foreach($gidj as $id){
		$idj=$id->idmax;
		$idjbt=$idj+1;
?>

Id Jabatan
<input type='text' name='idj' value='<?php echo $idjbt?>' disabled>
Nama Jabatan
<input type='text' name='nmj'>
Keterangan
<textarea name='ket'></textarea>

<?php
	}
	echo form_submit('mysubmit','Submit');
?>