<?php
	foreach($jemo as $dtjm){
		$idjm=$dtjm->id_jemo;
		$jemo=$dtjm->nm_jemo;
		$ket=$dtjm->keterangan;
		echo form_open('Admin/prosesubahjmemo/'.$idjm.'');
		//echo $ket;
?>
<h3>Edit Jenis Memo</h3>
Jenis Memo
<input type='text' name='jemo' value='<?php echo $jemo;?>'>
Keterangan
<input type='text' name='ket' value='<?php echo $ket;?>'>

<?php
}
echo form_submit('mysubmit','Submit');
?>