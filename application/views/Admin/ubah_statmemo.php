<h3>Ubah Status Memo</h3>
<?php
	foreach($statmemo as $sm){
		$idsm=$sm->id_status;
		$nmstat=$sm->nm_status_memo;
		$ket=$sm->keterangan;
		//echo form_open('Admin/prosesubahsmemo/'.$idsm.'');
?>
	<form method="post" action="<?php echo site_url('Administrator/prosesubahsmemo/'.$idsm.'');?>"" data-ajax="false">
	Status Memo
	<input type='text' name='nmstat' value='<?php echo $nmstat;?>'>
	Keterangan
	<input type='text' name='ket' value='<?php echo $ket;?>'>
<?php
	}
	echo form_submit('mysubmit','Submit');
?>
	</form>