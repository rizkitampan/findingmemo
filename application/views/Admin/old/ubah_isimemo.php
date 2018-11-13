<?php
	foreach($getismoid as $im){
		$idi=$im->id_ismo;
		$nmo=$im->nomor_memo;
		$jmi=$im->id_jemo;
		$tgle=$im->tanggal_entri;
		$idjp=$im->id_jenis_perihal;
		$perihal=$im->perihal;
		$nilai=$im->nilai;
		$userid=$im->id_user;
		$iskpa=$im->id_status_kpa;
		$tkpa=$im->tgl_kpa;
		$isbend=$im->id_status_bendahara;
		$tbend=$im->tgl_bendahara;
		$isppk=$im->id_status_ppk;
		$tppk=$im->tgl_ppk;
		$isspm=$im->id_status_spm;
		$tspm=$im->tgl_spm;
		$isada=$im->id_status_pengadaan;
		$tada=$im->tgl_pengadaan;
		$istrima=$im->id_status_penerima;
		$ttrima=$im->tgl_penerima;
		$isprogsur=$im->id_status_progsur;
		$tprogsur=$im->tgl_progsur;
		$issarpras=$im->id_status_sarpras;
		$tsarpras=$im->tgl_sarpras;
		$isumum=$im->id_status_umum;
		$tumum=$im->tgl_umum;
		$iskpa2=$im->id_status_kpa2;
		$tkpa2=$im->tgl_kpa2;
		$isbend2=$im->id_status_bendahara2;
		$tbend2=$im->tgl_bendahara2;
		$isppk2=$im->id_status_ppk2;
		$tppk2=$im->tgl_ppk2;
		$isada2=$im->id_status_pengadaan2;
		$tada2=$im->tgl_pengadaan2;
		echo form_open('Admin/prosesubahismo/'.$idi.'');
?>
<h3>Form Ubah Isi Memo</h3>


Nomor Memo
<input type='text' name='nmo' value='<?php echo $nmo;?>'>
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
Tanggal entri
<input type='text' name='tgle' id='datepicker' value='<?php echo $tgle;?>'>
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
Perihal
<input type='text' name='perihal' value='<?php echo $perihal;?>'>

Nilai
<input type='text' name='nilai' value='<?php echo $nilai;?>'>
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
Status KPA
<select name='skpa' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
			if($iskpa==$ids){
				echo"<option value=".$ids." selected>".$nms."</option>";
			}else{
				echo "<option value=".$ids.">".$nms."</option>";
			}
		}
	?>
</select>

Tanggal KPA
<input type='text' name='tkpa' id='datekpa' value='<?php echo $tkpa;?>'>

Status Bendahara
<select name='sbend' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
			if($isbend==$ids){
				echo"<option value=".$ids." selected>".$nms."</option>";
			}else{
				echo "<option value=".$ids.">".$nms."</option>";
			}
		}
	?>
</select>
Tanggal Bendahara
<input type='text' name='tbend' id='datebend' value='<?php echo $tbend;?>'>
Status PPK
<select name='sppk' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
			if($isppk==$ids){
				echo"<option value=".$ids." selected>".$nms."</option>";
			}else{
				echo "<option value=".$ids.">".$nms."</option>";
			}
		}
	?>
</select>
Tanggal PPK
<input type='text' name='tppk' id='dateppk' value='<?php echo $tppk;?>'>
Status SPM
<select name='sspm' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
			if($isbend==$ids){
				echo"<option value=".$ids." selected>".$nms."</option>";
			}else{
				echo "<option value=".$ids.">".$nms."</option>";
			}
		}
	?>
</select>
Tanggal SPM
<input type='text' name='tspm' id='datespm' value='<?php echo $tspm;?>'>

Status Pengadaan
<select name='sada' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
			if($isada==$ids){
				echo"<option value=".$ids." selected>".$nms."</option>";
			}else{
				echo "<option value=".$ids.">".$nms."</option>";
			}
		}
	?>
</select>
Tanggal Pengadaan
<input type='text' name='tada' id='dateada' value='<?php echo $tada;?>'>

Status Penerima
<select name='strima' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
			if($istrima==$ids){
				echo"<option value=".$ids." selected>".$nms."</option>";
			}else{
				echo "<option value=".$ids.">".$nms."</option>";
			}
		}
	?>
</select>
Tanggal Penerima
<input type='text' name='ttrima' id='datetrima' value='<?php echo $ttrima;?>'>

Status Kasie Program Survei
<select name='sprogsur' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
			if($isprogsur==$ids){
				echo"<option value=".$ids." selected>".$nms."</option>";
			}else{
				echo "<option value=".$ids.">".$nms."</option>";
			}
		}
	?>
</select>
Tanggal Kasie Program Survei
<input type='text' name='tprogsur' id='dateprogsur' value='<?php echo $tprogsur;?>'>

Status Sarana & Prasarana
<select name='ssarpras' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
			if($issarpras==$ids){
				echo"<option value=".$ids." selected>".$nms."</option>";
			}else{
				echo "<option value=".$ids.">".$nms."</option>";
			}
		}
	?>
</select>
Tanggal Sarana & Prasarana
<input type='text' name='tsarpras' id='datesarpras' value='<?php echo $tsarpras;?>'>

Status Kabag TU 
<select name='sumum' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
			if($isumum==$ids){
				echo"<option value=".$ids." selected>".$nms."</option>";
			}else{
				echo "<option value=".$ids.">".$nms."</option>";
			}
		}
	?>
</select>
Tanggal Kabag TU
<input type='text' name='tumum' id='datetu' value='<?php echo $tumum;?>'>

Status KPA 2
<select name='skpa2' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
			if($iskpa2==$ids){
				echo"<option value=".$ids." selected>".$nms."</option>";
			}else{
				echo "<option value=".$ids.">".$nms."</option>";
			}
		}
	?>
</select>

Tanggal KPA 2
<input type='text' name='tkpa2' id='datekpa2' value='<?php echo $tkpa2;?>'>

Status Bendahara 2
<select name='sbend2' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
			if($isbend2==$ids){
				echo"<option value=".$ids." selected>".$nms."</option>";
			}else{
				echo "<option value=".$ids.">".$nms."</option>";
			}
		}
	?>
</select>
Tanggal Bendahara 2
<input type='text' name='tbend2' id='datebend2' value='<?php echo $tbend2;?>'>

Status PPK 2
<select name='sppk2' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
			if($isppk2==$ids){
				echo"<option value=".$ids." selected>".$nms."</option>";
			}else{
				echo "<option value=".$ids.">".$nms."</option>";
			}
		}
	?>
</select>
Tanggal PPK 2
<input type='text' name='tppk2' id='dateppk2' value='<?php echo $tppk2;?>'>

Status Pengadaan 2
<select name='sada2' data-native-menu='false'>
	<?php
		foreach($statmemo as $sm){
			$ids=$sm->id_status;
			$nms=$sm->nm_status_memo;
			if($isada2==$ids){
				echo"<option value=".$ids." selected>".$nms."</option>";
			}else{
				echo "<option value=".$ids.">".$nms."</option>";
			}
		}
	?>
</select>
Tanggal Pengadaan 2
<input type='text' name='tada2' id='dateada2' value='<?php echo $tada2;?>'>

<?php
	}
	echo form_submit('mysubmit','Ubah');
?>