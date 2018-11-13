<h3>Form Tambah Jenis Memo</h3>
<form method="post" action="<?php echo site_url('Administrator/prosestambahjemo');?>" data-ajax="false">
<?php
	foreach($gidjmemo as $idjemo){
		$id=$idjemo->idmax;
		$idj=$id+1;
?>

	Id Jenis Memo<br>
	<input type='text' name='id_jemo' value='<?php echo $idj;?>' disabled>
	Jenis Memo<br>
	<input type='text' name='jemo' >
	Keterangan
	<textarea name='ket'></textarea>

<?php
	}
	echo form_submit('mysubmit','Submit');
?>
</form>