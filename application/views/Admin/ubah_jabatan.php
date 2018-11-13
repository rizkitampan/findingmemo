<h3>Form Ubah Jabatan</h3>

<?php
	foreach($jabatan as $jbt){
		$idj=$jbt->id_jabatan;
		$nmj=$jbt->nm_jabatan;
		$ket=$jbt->keterangan;
		//echo form_open(''.$idj.'');
?>
<form method="post" action="<?php echo site_url('Administrator/prosesubahjbt/'.$idj.'');?>" data-ajax="false">
	Nama Jabatan
	<input type='text' name='nmj' value='<?php echo $nmj;?>'>
	Keterangan
	<textarea name='ket' ><?php echo $ket;?></textarea>

<?php
	}
	echo form_submit('mysubmit','Submit');
?>
</form>