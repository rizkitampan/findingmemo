<?php
	echo form_open('Admin/prosestambahdetmemo');
?>
<h3>Form Tambah Detail Status Memo</h3>

Id Memo
<select name='idmemo' data-native-menu='false'>
	<?php 
		foreach($ismo as $im){
			$idm=$im->nomor_memo;
		
	?>
	<option value='<?php echo $idm?>'><?php echo $idm;?></option>
	<?php
	}
	?>
</select>
Nama User
<select name='user' data-native-menu='false'>
	<?php
		foreach($user as $us){
			$id=$us->id_user;
			$nm=$us->nama;
		
	?>
	<option value='<?php echo $id;?>'><?php echo $nm;?></option>
	<?php
		}
	?>
</select>
Tanggal Aksi
<input type='text' name='tgl' id='datepicker'>
Status Memo
<select name='statusmemo' data-native-menu='false'>
	<?php
		foreach ($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
		
	?>
	<option value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>
<?php
	echo form_submit('mysubmit','Tambah');
	echo form_close();
?>
