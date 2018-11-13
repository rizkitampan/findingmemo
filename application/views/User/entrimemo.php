<?php $this->load->view('User/header');?>
<?php $this->load->view('User/nav');?>
<?php $this->load->view('User/breadcumbsentrimemo');?>
<div class="row">
	<div class="col-12">
		<!--<h3>Blank</h3>
			<p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>-->
			<form action="<?php echo base_url()?>User/submitmemouser/98" method="post">
				<div class="form-row">
					<div class="form-group col-md-2">
						<label for="input1">Nomor 1</label>
						<input type="text" name="nomormemo1" class="form-control" id="input1" placeholder="1">
						<font color="RED"><?php echo form_error('nomormemo1'); ?></font>
					</div>
					<div class="form-group col-md-2">
						<label for="inputState">Nomor 2</label>
						<select name ="indukmemo" id="inputState" class="form-control">
							<option selected>Choose...</option>
							<option value="Teksurla.01">Teksurla.01 - Kasubbag Tata Usaha</option>
							<option value="Teksurla.02">Teksurla.02 - Kasie Program dan Operasi Survei</option>
							<option value="Teksurla.03">Teksurla.03 - Kasie Sarana dan Prasarana (Kegiatan)</option>
							<option value="Teksurla.03A">Teksurla.03A - Kasie Sarana dan Prasarana</option>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="input2">Nomor 3</label>
						<input type="text" name="nomormemo2" class="form-control" id="input2" placeholder="TPSA/ND">
						<font color="RED"><?php echo form_error('nomormemo2'); ?></font>
					</div>
					<div class="form-group col-md-2">
						<label for="input3">Nomor 4</label>
						<input type="text" name="nomormemo3" class="form-control" id="input3" placeholder="RT.001">
						<font color="RED"><?php echo form_error('nomormemo3'); ?></font>
					</div>
					<div class="form-group col-md-2">
						<label for="inputState">Nomor 5</label>
						<select id="inputState" name="bulanmemo" class="form-control">
							<option selected>Choose...</option>
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="inputState">Nomor 6</label>
						<select id="inputState" name="tahunmemo" class="form-control">
							<option selected>Choose...</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="mataanggaran">Mata Anggaran</label>
					<input type="text" name="mataanggaran" class="form-control" id="mataanggaran" placeholder="3473....">
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
					<input class="form-control" name="tanggalmemo" type="text" id="datepicker">
					<font color="RED"><?php echo form_error('tanggalmemo'); ?></font>
				</div>
				<div class="form-group col-md-2">
					<label for="perihal">Perihal</label>
					<input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal....">
					<font color="RED"><?php echo form_error('perihal'); ?></font>
				</div>
				<div class="form-group col-md-2">
					<label for="nominal">Nominal</label>
					<input type="text" class="form-control" name="nominal" id="nominal" data-mini="false" onkeyup="FormatCurrency(this)" placeholder="Isikan Nominal" >
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
							<?php foreach($jenisperihal as $keteranganperihal){
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