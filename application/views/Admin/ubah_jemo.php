<?php
	foreach($jemo as $dtjm){
		$idjm=$dtjm->id_jemo;
		$jemo=$dtjm->nm_jemo;
		$ket=$dtjm->keterangan;
?>
<h3>Edit Jenis Memo</h3>
<form method="post" action="<?php echo site_url('Administrator/prosesubahjmemo/'.$idjm.'');?>" data-ajax="false">
	Jenis Memo
	<input type='text' name='jemo' value='<?php echo $jemo;?>'>
	Keterangan
	<input type='text' name='ket' value='<?php echo $ket;?>'>


</form>
<?php
	}
	echo form_submit('mysubmit','Submit');
?>