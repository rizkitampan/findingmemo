<?php $this->load->view('User/header');?>
<?php $this->load->view('User/navspip');?>
<?php $this->load->view('User/breadcumbs');?>
<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i>Tabel Memo</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Nomor Memo</th>
							<th>Perihal</th>
							<th>Nominal</th>
							<th>Waktu</th>
							<th>Posisi</th>
							<th>Keterangan</th>
							<th>Status</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Nomor Memo</th>
							<th>Perihal</th>
							<th>Nominal</th>
							<th>Waktu</th>
							<th>Posisi</th>
							<th>Keterangan</th>
							<th>Status</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($keteranganmemo as $keteranganstatus){ 
							$idmemo=$keteranganstatus->id_ismo;
							$nomormemo=$keteranganstatus->nomor_memo;
							$tanggalmemo=$keteranganstatus->tanggal_entri;
							$perihal=$keteranganstatus->perihal;
							$idjemo=$keteranganstatus->id_jemo;
							$idjenisperihal=$keteranganstatus->id_jenis_perihal;
							$nilai=$keteranganstatus->nilai;
							$str=str_replace(".", "", $nilai);
							$tanggalentri=$keteranganstatus->tanggal_entri;
							$waktuentri=$keteranganstatus->waktu_entri;
							$catatan=$keteranganstatus->catatan;
							$mak=$keteranganstatus->mak;
							$akun=$keteranganstatus->akun;
							$kondisi=$keteranganstatus->kondisi;
							foreach($keteranganaksimemo as $keteranganaksi){//START FOREACH AKSI 
								$idaksimemo=$keteranganaksi->id_ismo;
								$idpelaku=$keteranganaksi->id_pelaku;
								$tglaksi=$keteranganaksi->tgl_aksi;
								$aksi=$keteranganaksi->aksi;
								$waktu=$keteranganaksi->waktu_entri;
          						//KETERANGAN USER
								if(($idpelaku==1)||($idpelaku==2)){
									$idpelaku='User';
								}elseif($idpelaku==3){
									$idpelaku='KPA';
								}elseif($idpelaku==4){
									$idpelaku='PPK';
								}elseif($idpelaku==5){
									$idpelaku='Bendahara';
								}elseif($idpelaku==6){
									$idpelaku='SPM';
								}elseif($idpelaku==7){
									$idpelaku='Pengadaan';
								}elseif($idpelaku==8){
									$idpelaku='Penerima';
								}elseif($idpelaku==11){
									$idpelaku='Sekertaris TU';
								}elseif($idpelaku==14){
									$idpelaku='Sekertaris Progsur';
								}elseif($idpelaku==16){
									$idpelaku='Sekertaris OFS';
								}elseif($idpelaku==17){
									$idpelaku='Sekertaris Data';
								}elseif($idpelaku==13){
									$idpelaku='Sekertaris Sarpras';
								}
          						//KETERANGAN AKSI
								if($aksi==1){
									$aksi='Verifikasi';
								}elseif($aksi==4){
									$aksi='Insert';
								}elseif($aksi==2){
									$aksi='Revisi';
								}elseif($aksi==3){
									$aksi='Tolak';
								}elseif($aksi==NULL){
									$aksi= '___';
								}
          						//TANGGAL AKSI
								if($tglaksi==NULL){
									$tglaksi='___';
								}
          						//JIKA ID SAMA
								if($idmemo==$idaksimemo){
									$x=$aksi;
									$y=$idpelaku;
									$z=$waktu;
									$tg=$tglaksi;
								}
							}
							?>
							<tr>
								<th><?php echo $nomormemo;?></th>
								<th><?php echo $perihal;?></th>
								<th><?php echo $nilai;?></th>
								<td><?php echo $tg;?></td>
								<td><?php echo $z;?></td>
								<th>
									<!--Jika Revisi langsung entri Memo Revisi-->
									<?php if($x=='Revisi'){ ?>
									<a class="btn btn-warning" href="<?php echo base_url()?>User/entrimemorevisi/<?php echo $idmemo;?>"><?php echo $y;?>&nbsp;Revisi</a>
									<!--Jika Insert memberikan informasi berupa keterangan pelaku dan aksi-->
									<?php }elseif($x=='Insert'){ ?>
									<button type="button" class="btn btn-success"><?php echo $y;?>&nbsp;Insert</button>
									<!--Jika Verifikasi memberikan informasi berupa keterangan pelaku dan aksi-->
									<?php }elseif($x=='Verifikasi'){ ?>
									<button type="button" class="btn btn-info"><?php echo $y;?>&nbsp;Verifikasi</button>
									<!--Jika Tolak memberikan informasi berupa keterangan pelaku dan aksi-->
									<?php }elseif($x=='Tolak'){ ?>
									<a class="btn btn-danger" href="<?php echo base_url()?>User/entrimemo">Ditolak&nbsp;<?php echo $y;?></a>
									<?php }?>
								</th>
								<!--Selengkapnya memberikan informasi tentang detail/history dari log aksi (perjalanan memo)-->
								<th><button data-toggle="modal" data-target="#selengkapnyaModal<?php echo $idmemo;?>" type="button" class="btn btn-primary">Selengkapnya</button></th>
								<th><?php 
								if($kondisi==99){?>
								<button type="button" class="btn btn-success">Sukses</button><!--Jika kondisi 99 maka menampilkan button sukses-->
								<?php }elseif(($kondisi==97)||($kondisi==98)){?>
								<button type="button" class="btn btn-danger">Belum</button><!--Jika kondisi 97/98 maka menampilkan button belum-->
								<?php }elseif($kondisi==''){?>
								<button type="button" class="btn btn-warning">Belum Ada Aksi</button><!--Jika kondisi '' maka menampilkan button  belum ada aksi-->
								<?php }?>
							</th>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
		<?php foreach ($keteranganmemo as $keteranganstatus){ 
			$idmemo=$keteranganstatus->id_ismo;
			$nomormemo=$keteranganstatus->nomor_memo;
			$tanggalmemo=$keteranganstatus->tanggal_entri;
			$perihal=$keteranganstatus->perihal;
			$idjemo=$keteranganstatus->id_jemo;
			$idjenisperihal=$keteranganstatus->id_jenis_perihal;
			$nilai=$keteranganstatus->nilai;
			$str=str_replace(".", "", $nilai);
			$tanggalentri=$keteranganstatus->tanggal_entri;
			$waktuentri=$keteranganstatus->waktu_entri;
			$catatan=$keteranganstatus->catatan;
			$mak=$keteranganstatus->mak;
			$akun=$keteranganstatus->akun;
			$kondisi=$keteranganstatus->kondisi;
							foreach($keteranganaksimemo as $keteranganaksi){//START FOREACH AKSI 
								$idaksimemo=$keteranganaksi->id_ismo;
								$idpelaku=$keteranganaksi->id_pelaku;
								$tglaksi=$keteranganaksi->tgl_aksi;
								$aksi=$keteranganaksi->aksi;
								$waktu=$keteranganaksi->waktu_entri;
          						//KETERANGAN USER
								if($idpelaku==1){
									$idpelaku='User';
								}elseif($idpelaku==3){
									$idpelaku='KPA';
								}elseif($idpelaku==4){
									$idpelaku='PPK';
								}elseif($idpelaku==5){
									$idpelaku='Bendahara';
								}elseif($idpelaku==6){
									$idpelaku='SPM';
								}elseif($idpelaku==7){
									$idpelaku='Pengadaan';
								}elseif($idpelaku==8){
									$idpelaku='Penerima';
								}elseif($idpelaku==11){
									$idpelaku='Sekertaris TU';
								}elseif($idpelaku==14){
									$idpelaku='Sekertaris Progsur';
								}elseif($idpelaku==16){
									$idpelaku='Sekertaris OFS';
								}elseif($idpelaku==17){
									$idpelaku='Sekertaris Data';
								}elseif($idpelaku==13){
									$idpelaku='Sekertaris Sarpras';
								}
          						//KETERANGAN AKSI
								if($aksi==1){
									$aksi='Verifikasi';
								}elseif($aksi==4){
									$aksi='Insert';
								}elseif($aksi==2){
									$aksi='Revisi';
								}elseif($aksi==3){
									$aksi='Tolak';
								}elseif($aksi==NULL){
									$aksi= '___';
								}
          						//TANGGAL AKSI
								if(empty($tglaksi)){
									$tglaksi='';
								}
								//echo $tglaksi;die();
          						//JIKA ID SAMA
								if($idmemo==$idaksimemo){
									$x=$aksi;
									$y=$idpelaku;
									$z=$waktu;
									$tg=$tglaksi;
								}
							}?>
							<?php }?>
							<?php if(isset($tg)){?>
								<div class="card-footer small text-muted">Aksi Terakhir pada <?php echo $tg;?>&nbsp;&nbsp;<?php echo $z;?></div>
							<?php }else{?>
								<div class="card-footer small text-muted">Aksi Terakhir pada .........</div>
							<?php }?>
	</div>
</div>     
<?php //$this->load->view('User/footer');?>
<footer class="sticky-footer">
	<div class="container">
		<div class="text-center">
			<small>Copyright © BJDaval2018-Findingmemo</small>
		</div>
	</div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal, isian tampilan pop up saat logout telah diklik(ditekan)-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Anda Yakin Mau Keluar Aplikasi Ini?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Pilih "Logout" jika anda mau mengakhiri sesi anda.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?php echo base_url()?>User/logout">Logout</a>
			</div>
		</div>
	</div>
</div>
<!-- Selengkapnya Modal, isian tampilan selengkapnya jika diklik(ditekan)-->
<?php foreach ($keteranganmemo as $keteranganstatus){ 
	$idmemo=$keteranganstatus->id_ismo;
	?>
	<div class="modal fade" id="selengkapnyaModal<?php echo $idmemo;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Balai Teksurla Memo</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
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
								$sql = "SELECT * FROM isi_memo where id_ismo='$idmemo'";
								//echo $sql;
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {

										if(($row['id_user']==1)||($row['id_user']==2)){
											$row['id_user']='User';
										}

										if($row['id_jenis_perihal']==1){
											$row['id_jenis_perihal']='Pengadaan';
										}elseif($row['id_jenis_perihal']==2){
											$row['id_jenis_perihal']='Non Pengadaan';
										}
										?>

										<tr><th colspan="1">User</th><th colspan="3"><?php echo $row['id_user'];?></th></tr>
										<tr><th colspan="1">Nomor Memo</th><th colspan="3"><?php echo $row['nomor_memo'];?></th></tr>
										<tr><th colspan="1">Nominal</th><th colspan="3"><?php echo $row['nilai'];?></th></tr>
										<tr><th colspan="1">Perihal</th><th colspan="3"><?php echo $row['perihal'];?></th></tr>
										<tr><th colspan="1">Jenis Memo</th><th colspan="3"><?php echo $row['id_jenis_perihal'];?></th></tr>
										
										<?php	
									}
								} else {
									echo "0 results";
								}
								$conn->close();
								?>	
							</thead>
							<thead>
								<tr>
									<th>User</th>
									<th>Tanggal</th>
									<th>Waktu</th>
									<th>Aksi</th>	
								</tr>
							</thead>
							<tbody>
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
								$sql = "SELECT * FROM log_aksi,isi_memo where log_aksi.id_ismo='$idmemo' AND isi_memo.id_ismo=log_aksi.id_ismo";
									//echo $sql;
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										?>
										<tr>
											<th>
												<?php 
												if(($row['id_pelaku']==1)||($row['id_pelaku']==2)){
													$row['id_pelaku']='User';
												}elseif($row['id_pelaku']==13){
													$row['id_pelaku']='SEKRETARIS SARPRAS';
												}elseif($row['id_pelaku']==17){
													$row['id_pelaku']='SEKRETARIS DATA';
												}elseif($row['id_pelaku']==3){
													$row['id_pelaku']='KPA';
												}elseif($row['id_pelaku']==13){
													$row['id_pelaku']='SEKRETARIS SARPRAS';
												}elseif($row['id_pelaku']==4){
													$row['id_pelaku']='PPK';
												}elseif($row['id_pelaku']==5){
													$row['id_pelaku']='BENDAHARA';
												}elseif($row['id_pelaku']==6){
													$row['id_pelaku']='SPM';
												}elseif($row['id_pelaku']==7){
													$row['id_pelaku']='PENGADAAN';
												}elseif($row['id_pelaku']==8){
													$row['id_pelaku']='PENERIMA';
												}elseif($row['id_pelaku']==11){
													$row['id_pelaku']='SEKRETARIS TU';
												}elseif($row['id_pelaku']==14){
													$row['id_pelaku']='SEKRETARIS PROGSUR';
												}elseif($row['id_pelaku']==16){
													$row['id_pelaku']='SEKRETARIS OFS';
												}

												if($row['aksi']==1){
													$row['aksi']='verifikasi';
												}elseif($row['aksi']==4){
													$row['aksi']='insert';
												}elseif($row['aksi']==2){
													$row['aksi']='revisi';
												}elseif($row['aksi']==3){
													$row['aksi']='tolak';
												}
												echo $row['id_pelaku'];
												?>		
											</th>
											<th><?php echo $row['tgl_aksi'];?></th>
											<th><?php echo $row['waktu_entri'];?></th>
											<th><?php echo $row['aksi'];?></th>
										</tr>
										<?php	
									}
								} else {
									echo "0 results";
								}
								$conn->close();
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php }?>
	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Page level plugin JavaScript-->
	<script src="<?php echo base_url()?>assets/vendor/chart.js/Chart.min.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/datatables/jquery.dataTables.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url()?>assets/js/sb-admin.min.js"></script>
	<!-- Custom scripts for this page-->
	<script src="<?php echo base_url()?>assets/js/sb-admin-datatables.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/sb-admin-charts.min.js"></script>
</div>
</body>
</html>