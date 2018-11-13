<h3>Form Tambah Isi Memo</h3>
<form method="post" action="<?php echo site_url('Administrator/prosestambahismo');?>" data-ajax="false">
	<?php
		foreach ($ismo as $key) {
			$id=$key->idmax;
			$idi=$id+1;
		
	?>
	Id Memo
	<input type="text" name="id" value="<?php echo $idi;?>">
	<?php
		}
	?>
	Nomor Memo
	<input type='text' name='nmo'>
	Tanggal entri
	<input type='text' name='tgle' id='datepicker'>
	Mata Anggaran
	<input type='text' name='mak'>
	Akun
	<select name="akun" data-native-menu="false">
	<?php 
		foreach($akun as $ia) {
			$ida=$ia->id_akun;
			$ket=$ia->uraian_akun;
	?>
		<option value="<?php echo $ida;?>"><?php echo $ida;?></option>
	<?php
		}
	?>
	</select>
	Perihal
	<input type='text' name='perihal'>

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
	Nilai
	<input type='text' name='nilai'>
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

	Disposisi PPK
	<select name='dppk' data-native-menu='false'>
	<?php
		foreach($jabatan as $smj){
			$id=$smj->id_jabatan;
			$nm=$smj->nm_jabatan;
	?>
		<option value='<?php echo $id;?>'><?php echo $nm;?></option>
	<?php
		}
	?>
	</select>
	Catatan
	<input type='text' name='ctt'>

	Kondisi
	<select name='smemo' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$idsm=$sm->id_status;
			$nmsm=$sm->nm_status_memo;
	?>
		<option value='<?php echo $idsm;?>'><?php echo $nmsm;?></option>
	<?php
		}
	?>
	</select>

	<?php
		echo form_submit('mysubmit','Tambah');
		//echo form_close();
	?>
</form>