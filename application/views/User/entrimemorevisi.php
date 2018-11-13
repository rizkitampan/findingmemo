<?php $this->load->view('User/header');?>
<?php $this->load->view('User/nav');?>
<?php $this->load->view('User/breadcumbsentrimemo');?>
<div class="row">
	<div class="col-12">
		<!--<h3>Blank</h3>
			<p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>-->
			<?php foreach ($jenisperihal as $keteranganstatus){
				$idmemo=$keteranganstatus->id_ismo;
				$nomormemo=$keteranganstatus->nomor_memo;
				$tanggalmemo=$keteranganstatus->tanggal_entri;
				$perihal=$keteranganstatus->perihal;
				$idjemo=$keteranganstatus->id_jemo;
				$idjenisperihal=$keteranganstatus->id_jenis_perihal;
				$nominal=$keteranganstatus->nilai;
				$tanggalentri=$keteranganstatus->tanggal_entri;
				$waktuentri=$keteranganstatus->waktu_entri;
				$catatan=$keteranganstatus->catatan;
				$mak=$keteranganstatus->mak;
				$akun=$keteranganstatus->akun;
			}
			?>
			<form action="<?php echo base_url()?>User/submitmemorevisi/<?php echo $idmemo;?>" method="post">
				<div class="form-group">
					<label for="nomormemo">Nomor Memo</label>
					<input type="text" name="nomormemo" id="nomormemo" class="form-control" data-mini="false" value="<?php 
					if (isset($_POST['nomormemo'])) {
						$nomormemo=$_POST['nomormemo'];
						echo $nomormemo; 
					}else{
						echo $nomormemo;  
					}
					?>">
					<br/> 
					<font color="RED"><?php echo form_error('nomormemo1'); ?></font>
				</div>
				<div class="form-group">
					<label for="mataanggaran">Mata Anggaran</label>
					<input type="text" name="mataanggaran" class="form-control" id="mataanggaran" value="<?php 
					if (isset($_POST['mak'])) {
						$mak=$_POST['mak'];
						echo $mak; 
					}else{
						echo $mak;  
					}
					?>">
					<font color="RED"><?php echo form_error('mataanggaran'); ?></font>
				</div>
				<div class="form-group">
					<label for="inputState">Kode Akun</label>
					<select id="inputState" name="akun" class="form-control">
						<?php
						$servername = "localhost";
						$username = "root";
						$password = "bj123";
						$dbname = "findingmemo2018";

                  		// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
                  		// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} 

						$sql = "SELECT * from akun";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								?>
								<option value="<?php echo $row["id_akun"]?>"><?php echo $row["id_akun"]?>-<?php echo $row["uraian_akun"]?></option>
								<?php
							}
						} 
						$conn->close();                
						?>
					</select>
				</select>
			</div>
			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="inputCity">Tanggal</label>
					<input class="form-control" name="tanggalmemo" type="text" id="datepicker" value="<?php 
					if (isset($_POST['tanggalmemo'])) {
						$tanggalmemo=$_POST['tanggalmemo'];
						echo $tanggalmemo; 
					}else{
						echo $tanggalmemo;
					}
					?>">
					<font color="RED"><?php echo form_error('tanggalmemo'); ?></font>
				</div>
				<div class="form-group col-md-2">
					<label for="perihal">Perihal</label>
					<input type="text" class="form-control" name="perihal" id="perihal"  value="<?php 
					if (isset($_POST['perihal'])) {
						$perihal=$_POST['perihal'];
						echo $perihal; 
					}else{
						echo $perihal; 
					} 
					?>">
					<font color="RED"><?php echo form_error('perihal'); ?></font>
				</div>
				<div class="form-group col-md-2">
					<label for="nominal">Nominal</label>
					<input type="text" class="form-control" name="nominal" id="nominal" data-mini="false" onkeyup="FormatCurrency(this)" value="<?php 
					if (isset($_POST['nominal'])) {
						$nominal=$_POST['nominal'];
						echo $nominal; 
					}else{
						echo $nominal;
					}
					?>" >
					<font color="RED"><?php echo form_error('nominal'); ?></font>
				</div>
				<div class="form-group col-md-3">
					<label for="jenismemo">Jenis Memo</label>
					<select id="jenismemo" name="jenismemo" class="form-control">
						<?php foreach($jenismemo as $keteranganjenismemo){
							$idjenismemo=$keteranganjenismemo->id_jemo;
							$namajenismemo=$keteranganjenismemo->nm_jemo;
							?>
							<option value="<?php echo $idjenismemo?>"><?php echo $namajenismemo; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label for="perihalmemo">Perihal Memo</label>
						<select id="perihalmemo" name="jenisperihal" class="form-control">
							<?php foreach($jenisperihalawal as $keteranganperihal){
								$idperihal=$keteranganperihal->id_jenhal;
								$namajenisperihal=$keteranganperihal->nm_jenis_perihal;
								?>
								<option value="<?php echo $idperihal?>"><?php echo $namajenisperihal; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<!--<div class="form-group">
						<div class="form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox"> Check me out
							</label>
						</div>
					</div>-->
					<button type="submit" class="btn btn-primary">Submit Memo</button>
				</form>
			</div>
		</div>
		<?php $this->load->view('User/footerentri');?>   