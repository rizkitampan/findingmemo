<h3>Form Tambah Jabatan</h3>
<form method="post" action="<?php echo site_url('Administrator/prosestambahjabatan');?>" data-ajax="false">
<?php
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
</form>