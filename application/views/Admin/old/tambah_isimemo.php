<?php
	echo form_open('Admin/prosestambahismo');
?>
<h3>Form Tambah Isi Memo</h3>


Id Isi Memo
<input type='text' name='idismo'>
Nomor Memo
<input type='text' name='nmo' >
Jenis Memo
<select name='jmemo' data-native-menu='false'>
<?php
	foreach($jemo as $jm){
		$idjm=$jm->id_jemo;
		$nmj=$jm->nm_jemo;
?>
	<option value='<?php echo $idjm;?>'><?php echo $nmj;?></option>
<?php
	}
?>
</select>
Tanggal entri
<input type='text' name='tgle' id='datepicker'>
Jenis Perihal
<select name='jhal' data-native-menu='false'>
<?php
	foreach($jhal as $jh){
		$idjh=$jh->id_jenhal;
		$nmj=$jh->nm_jenis_perihal;
?>
	<option value='<?php echo $idjh;?>'><?php echo $nmj;?></option>
<?php
	}
?>
</select>
Perihal
<input type='text' name='perihal' >

Nilai
<input type='text' name='nilai'>
User
<select name='user' data-native-menu='false'>
	<?php
		foreach($user as $us){
			$idu=$us->id_user;
			$nm=$us->nama;
	?>
	<option value='<?php echo $idu;?>'><?php echo $nm;?></option>
	<?php
		}
	?>
</select>
Status KPA
<select name='skpa' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>

Tanggal KPA
<input type='text' name='tkpa' id='datekpa'>
Status Bendahara
<select name='sbend' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>
Tanggal Bendahara
<input type='text' name='tbend' id='datebend'>

Status PPK
<select name='sppk' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>
Tanggal PPK
<input type='text' name='tppk' id='dateppk'>
Status SPM
<select name='sspm' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>
Tanggal SPM
<input type='text' name='tspm' id='datespm'>
Status Pengadaan
<select name='sada' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>
Tanggal Pengadaan
<input type='text' name='tada' id='dateada'>
Status Penerima
<select name='strima' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>
Tanggal Penerima
<input type='text' name='ttrima' id='datetrima'>
Status Kasie Program dan Survei
<select name='sprogsur' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>
Tanggal Kasie Program Survei
<input type='text' name='tprogsur' id='dateprogsur'>

Status Kasie Sarana & Prasarana
<select name='ssarpras' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>
Tanggal Sarana & Prasarana
<input type='text' name='tsarpras' id='datesarpras'>
Status Kabag TU
<select name='sumum' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>
Tanggal Kabag TU
<input type='text' name='tumum' id='datetu'>

Status KPA 2
<select name='skpa2' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>
Tanggal KPA 2
<input type='text' name='tkpa2' id='datekpa2'>
Status Bendahara 2
<select name='sbend2' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>
Tanggal Bendahara 2
<input type='text' name='tbend2' id='datebend2'>

Status PPK 2
<select name='sppk2' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>
Tanggal PPK 2
<input type='text' name='tppk2' id='dateppk2'>
Status Pengadaan 2
<select name='sada2' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select>
Tanggal Pengadaan 2
<input type='text' name='tada2' id='dateada2'>

<?php
	
/* 
Disposisi PPK
<select name='status_detail' data-native-menu='false'>
	<?php
		foreach($user as $us){
			$ids=$us->id_user;
			$nms=$us->nama;
	?>
	<option  value='<?php echo $ids;?>'><?php echo $nms;?></option>
	<?php
		}
	?>
</select> */
	echo form_submit('mysubmit','Tambah');
?>
