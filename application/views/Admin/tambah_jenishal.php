<h3>Form Tambah Jenis Hal</h3>
<form method="post" action="<?php echo site_url('Administrator/prosestambahjenhal');?>" data-ajax="false">
<?php
	foreach($jhal as $jh){
		$id=$jh->idmax;
		$idh=$id+1;
?>
	Id Jenis Perihal
	<input type='text' name='idh' value='<?php echo $idh;?>' >
	Nama Jenis Perihal
	<input type='text' name='nmh'><br>
	Keterangan
	<textarea name='ket'></textarea>

<?php 
	}
	echo form_submit('mysubmit','Tambah');
?>
</form>