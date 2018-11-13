<h3>Form Ubah Detail Memo</h3>
<?php
	//print_r($user);
	foreach ($nolog as $act){
		$noa=$act->no_aksi;
		$idismo=$act->id_ismo;
		$usr=$act->id_pelaku;
		$tgle=$act->tgl_aksi;
		$status=$act->aksi;
		//echo $usr;
		echo form_open('Admin/prosesubahdet/'.$noa.'');
?>
	
	Nomor Aksi
	<input type='text' name='no' value='<?php echo $noa;?>'>
	Id Memo
	<select name='idmemo' data-native-menu='false'>
		<?php 
			foreach($ismo as $im){
				$idm=$im->nomor_memo;
				if($idismo==$idm){
					echo"<option value=".$idm." selected>".$idm."</option>";
				}else{
					echo"<option value=".$idm.">".$idm."</option>";
				}
			}
		?>
	</select>
	Nama User
	<select name='user' data-native-menu='false'>
		<?php
			foreach($user as $us){
				$id=$us->id_user;
				$nm=$us->nama;
				if($usr==$id){
					echo"<option value=".$id." selected>".$nm."</option>";
				}else{
					echo"<option value=".$id.">".$nm."</option>";
				}
			}
		?>
	</select>
	Tanggal Aksi
	<input type='text' name='tgl' id='datepicker' value='<?php echo $tgle;?>'>
	Status Memo
	<select name='statusmemo' data-native-menu='false'>
		<?php
			foreach ($statmemo as $sm){
				$ids=$sm->id_status;
				$nms=$sm->nm_status_memo;
				if($ids==$status){
					echo"<option value=".$ids." selected>".$nms."</option>";
				}else{
					echo"<option value=".$ids.">".$nms."</option>";
				}
			}
		?>
	</select>
	
<?php
	}
	echo form_submit('mysubmit','Submit');
	//echo form_close();
?>
