<h3>Form Tambah Status Memo</h3>
<form method="post" action="<?php echo site_url('Administrator/prosestambahsmemo');?>" data-ajax="false">
<?php
	//echo form_open('Admin/prosestambahsmemo');
	foreach($gidsmemo as $dtsm){
		$id=$dtsm->idmax;
		$ids=$id+1;
?>
	Id Status Memo
	<input type='text' name='id_status' value='<?php echo $ids;?>' disabled>
	Nama Status Memo
	<input type='text' name='statmemo'>
	Keterangan
	<textarea name='keterangan'></textarea>

<?php
	}
	echo form_submit('mysubmit','Submit');
?>
</form>