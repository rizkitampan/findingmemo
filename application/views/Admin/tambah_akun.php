<h3>Form Tambah Jenis Mata Anggaran</h3>
<form method="post" action="<?php echo site_url('Administrator/prosestambahmak');?>" data-ajax="false">
	Id Akun
	<input type="text" name="idak">
	Uraian Akun
	<input type="text" name="uraiakun">
	Keterangan
	<input type="text" name="keterangan">
<?php
	echo form_submit('mysubmit','Submit');
?>
</form>