<h3>Form Ubah Jenis Perihal</h3>
<?php
	foreach($jhal as $jh){
		$idh=$jh->id_jenhal;
		$nmh=$jh->nm_jenis_perihal;
		$ket=$jh->keterangan;
?>
	<form method="post" action="<?php echo site_url('Administrator/prosesubahjenhal/'.$idh.'');?>" data-ajax="false">
	Nama Jenis Perihal
	<input type='text' name='nmh' value='<?php echo $nmh;?>'>
	Keterangan
	<textarea name='ket'><?php echo $ket;?></textarea>
<?php
	}
	echo form_submit('mysubmit','Simpan');
?>
</form>