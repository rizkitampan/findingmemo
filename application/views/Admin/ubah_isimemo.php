<?php
	foreach($getismoid as $im){
		$idi=$im->id_ismo;
		$nmo=$im->nomor_memo;
		$mak=$im->mak;
		$ak=$im->akun;
		$tgle=$im->tanggal_entri;
		$perihal=$im->perihal;
		$idjp=$im->id_jenis_perihal;
		$jmi=$im->id_jemo;
		$nilai=$im->nilai;
		$userid=$im->id_user;
		$dppk=$im->disposisippk;
		$ctt=$im->catatan;
		$kond=$im->kondisi;
		//echo form_open('Admin/prosesubahismo/'.$idi.'');
?>
<h3>Form Ubah Isi Memo</h3>

<form method="post" action="<?php echo site_url('Administrator/prosesubahismo/'.$idi.'');?>" data-ajax="false">
	Nomor Memo
	<input type='text' name='nmo' value='<?php echo $nmo;?>'>
	MAK
	<input type="text" name="mak" value="<?php echo $mak;?>">
	Akun
	<input type="text" name="akun" value="<?php echo $ak;?>">
	Tanggal Entri
	<input type="text" name="tgl" value="<?php echo $tgle;?>" id='datepicker'>
	Perihal
	<input type='text' name='perihal' value='<?php echo $perihal;?>'>
	Jenis Perihal
	<select name='jhal' data-native-menu='false'>
	<?php
		foreach($jhal as $jh){
			$idjh=$jh->id_jenhal;
			$nmjh=$jh->nm_jenis_perihal;
			if($idjp==$idjh){
				echo"<option value=".$idjh." selected>".$nmjh."</option>";
			}else{
				echo"<option value=".$idjh.">".$nmjh."</option>";
			}
		}
	?>
	</select>
	Nilai
	<input type='text' name='nilai' value='<?php echo $nilai;?>'>
	Jenis Memo
	<select name='jmemo' data-native-menu='false'>
	<?php
		foreach($jemo as $jm){
			$idjm=$jm->id_jemo;
			$nmj=$jm->nm_jemo;
			
			if($jmi==$idjm){
				echo"<option value=".$idjm." selected>".$nmj."</option>";
			}else{
				echo"<option value=".$idjm.">".$nmj."</option>";
			}
		}	
	?>
	</select>
	User
	<select name='user' data-native-menu='false'>
		<?php
			foreach($user as $us){
				$idu=$us->id_user;
				$nm=$us->nama; 
				if($userid==$idu){
					echo"<option value=".$idu." selected>".$nm."</option>";
				}else{
					echo"<option value=".$idu.">".$nm."</option>";
				}
			}
		?>
	</select>
	Disposisi PPK
	<select name="dppk" data-native-menu="false">
		<?php
			foreach ($jabatan as $key) {
				$id=$key->id_jabatan;
				$jbt=$key->nm_jabatan;
				if($dppk==$jbt){
					echo"<option value=".$id." selected>".$jbt."</option>";
				}else{
					echo "<option value=".$id.">".$jbt."</option>";
				}			
			}
		?>
	</select>
	Catatan
	<input type='text' name='catatan' value='<?php echo $ctt;?>'>

<?php
	}
	echo form_submit('mysubmit','Ubah');
?>
</form>