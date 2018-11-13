<h3>Form Ubah Data User</h3>
<?php
	foreach($usr as $us){
		$id=$us->id_user;
		$nm=$us->nama;
		$username=$us->username;
		$password=$us->password;
		$ket=$us->keterangan;
		$idja=$us->id_jabatan;
		//echo form_open('Admin/prosesubahuser/'.$id.'');
?>
<form method="post" action="<?php echo site_url('Administrator/prosesubahuser/'.$id.'');?>" data-ajax="false">
	Nama
	<input type='text' name='nama' value='<?php echo $nm;?>'>
	Username
	<input type='text' name='username' value='<?php echo $username;?>'>
	Password
	<input type='text' name='password' value='<?php echo $password;?>'>
	Keterangan
	<textarea name='ket'><?php echo $ket;?></textarea>
	<label for='select-native-1'>Jabatan</label>
	<select name='jabatan' id='select-native-1' data-native-menu='false'>
	<?php
		foreach($jabatan as $jbt){
			$idjb=$jbt->id_jabatan;
			$nmj=$jbt->nm_jabatan;
			if($idja==$idjb){
				echo"<option value=".$idjb." selected>".$nmj."</option>";	
			}else{
				echo"<option value=".$idjb.">".$nmj."</option>";
			}
		}
	?>
	</select>
<?php
	}
	echo form_submit('mysubmit','Submit');
?>
</form>