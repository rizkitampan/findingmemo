<?php
	foreach ($mak as $akun) {
		$ida=$akun->id_akun;
		$uakun=$akun->uraian_akun;
		$ket=$akun->keterangan;
	
?>
<h3>Edit Mata Anggaran</h3>
<form method="post" action="<?php echo site_url('Administrator/prosesubahmak/'.$ida.'');?>" data-ajax="false">
	Id Akun
	<input type="text" name="id" value="<?php echo $ida;?>">
	Uraian Akun
	<input type="text" name="uraian" value="<?php echo $uakun;?>">
	Keterangan
	<input type="text" name="ket" value="<?php echo $ket;?>">
<?php
	}
	echo form_submit('mysubmit','Submit')
?>
</form>