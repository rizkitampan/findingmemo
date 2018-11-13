<?php $this->load->view('User/header');?>
<?php //$this->load->view('User/nav');?>
<?php $x=$this->session->userdata('username');
if($x=='vira'){ ?>
<?php $this->load->view('User/navsektu');?>
<?php }elseif($x=='yuni'){ ?>
<?php $this->load->view('User/navseksarpras');?>
<?php }elseif($x=='sugi'){ ?>
<?php $this->load->view('User/navsekprog');?>
<?php }elseif($x=='ira'){ ?>
<?php $this->load->view('User/navsekkegiatan');?>
<?php }?>
<?php $this->load->view('User/breadcumbsrekapmemo');?>
<script type="text/javascript">
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}

	window.onafterprint = function() {
		window.location.reload(true);
	}

	window.matchMedia('print').addListener(function (media) {
		if(media.matches){

		}
		else{
			window.location.reload(true);
		}
	});
</script>
<style type="text/css">
@media print {  
	@page {
		size: 297mm 210mm; /* landscape */
		/* you can also specify margins here: */
		margin: 25mm;
		margin-right: 45mm; /* for compatibility with both A4 and Letter */
	}
}
</style>
<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i>&nbsp;Aksi</div>
		<div class="card-body">
			<div class="table-responsive">
				<!--<button onclick="printDiv('printableArea')" class="btn btn-primary">Cetak</button>-->
				<a onclick="printDiv('printableArea')" class="btn btn-primary" data-ajax="false">
					<i class="fa fa-fw fa-print"></i>
					<span class="nav-link-text">Print</span>
				</a>
				<a href="<?php echo base_url()?>User/exportexcel" class="btn btn-success" data-ajax="false">
					<i class="fa fa-fw fa-file-excel-o"></i>
					<span class="nav-link-text">Export</span>
				</a>
			</div>
		</div>
	</div>
	<div class="card mb-3">
		<div class="card-header">
			<i class="fa fa-table"></i>&nbsp;Tabel Memo</div>
			<div class="card-body">
				<div class="table-responsive">
					<div id="printableArea">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>No Memo</th>
									<th>Tanggal Aksi</th>
									<th>Induk Memo</th>
									<th>Perihal</th>
									<th>Nominal</th>
									<th>Posisi</th>
									<th>Status</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th colspan="5" style="text-align:right">Total:</th>
									<th colspan="3"></th>
								</tr>
							</tfoot>
							<tbody>
								<?php $jumlah=0;?>
								<?php foreach ($rekap as $keteranganstatus){
									$idmemo=$keteranganstatus->id_ismo;
									$nomormemo=$keteranganstatus->nomor_memo;
									$perihal=$keteranganstatus->perihal;
									$nilai=$keteranganstatus->nilai;
									$nilai=str_replace(".", "", $nilai);
									$tanggalentri=$keteranganstatus->tanggal_entri;
									$kondisi=$keteranganstatus->kondisi;
									$querylog=$this->Modeluser->detaillog($idmemo);
									foreach($querylog as $isilog){
										$idpelaku=$isilog->id_pelaku;
										$aksi=$isilog->aksi;
									}

									if($aksi==1){
										$aksi = 'verifikasi';
									}elseif($aksi==2){
										$aksi = 'revisi';
									}elseif($aksi == 3){
										$aksi = 'tolak';
									}elseif($aksi == 4){
										$aksi = 'insert';
									}elseif($aksi == 98){
										$aksi = 'memo belum selesai';
									}elseif($aksi == 99){
										$aksi = 'memo selesai';
									}

									if($idpelaku==1){
										$idpelaku ='Admin 1';
									}elseif($idpelaku==2){
										$idpelaku ='Admin 2';
									}elseif($idpelaku==3){
										$idpelaku='KPA';
									}elseif($idpelaku==4){
										$idpelaku='PPK';
									}elseif($idpelaku==5){
										$idpelaku='Bendahara';
									}elseif($idpelaku==6){
										$idpelaku='PPSPM';
									}elseif($idpelaku==7){
										$idpelaku='Pengadaan';
									}elseif($idpelaku==8){
										$idpelaku='Penerima';
									}elseif($idpelaku==9){
										$idpelaku='Progsur';
									}elseif($idpelaku==10){
										$idpelaku='Sarpras';
									}elseif($idpelaku==11){
										$idpelaku='Umum';
									}elseif($idpelaku==12){
										$idpelaku='Sekretaris Umum';
									}elseif($idpelaku==14){
										$idpelaku='Sekretaris Progsur';
									}elseif($idpelaku==13){
										$idpelaku='Sekretaris Sarpras';
									}elseif($idpelaku==15){
										$idpelaku='Sekretaris Balai';
									}

									if($kondisi==98){
										$kondisi='Belum Selesai';
									}elseif($kondisi==99){
										$kondisi='Selesai';
									}elseif($kondisi==97){
										$kondisi='Tengah Jalan';
									}

									if(strstr($nomormemo,"Teksurla.01")){
										$indukmemo="Kasubbag Tata Usaha";
									}elseif(strstr($nomormemo,"Teksurla.02")){
										$indukmemo="Kasie Program dan Operasi Survei";
									}elseif(strstr($nomormemo,"Teksurla.03")){
										$indukmemo="Kasie Sarana dan Prasarana";
									}elseif(strstr($nomormemo,"Teksurla.04")){
										$indukmemo="Seismik";
									}elseif(strstr($nomormemo,"Teksurla.05")){
										$indukmemo="OFS";
									}elseif(strstr($nomormemo,"Teksurla.06")){
										$indukmemo="Pengelolaan Data Kelautan";
									}elseif(strstr($nomormemo,"Teksurla.07")){
										$indukmemo="Sarana dan Prasarana";
									}elseif(strstr($nomormemo,"Teksurla.08")){
										$indukmemo="NSTP";
									}
									?>
									<tr>
										<th><?php echo $idmemo;?></th>
										<th><?php echo $nomormemo;?></th>
										<th><?php echo $tanggalentri;?></th>
										<th><?php if(isset($indukmemo)){
											echo $indukmemo;
										}else{
											$indukmemo='NULL';
										}
										?></th>
										<th><?php echo $perihal;?></th>
										<th><?php echo 'Rp&nbsp;'.number_format($nilai,2);?></th>
										<th><?php echo $aksi;?>&nbsp;oleh&nbsp;<?php echo $idpelaku;?></th>
										<th><?php echo $kondisi;?></th>
									</tr>
									<?php $jumlah=$jumlah+$nilai;?>
									<?php }?>
									<!--<tr>
										<th colspan="2">Total</th>
										<th colspan="5"></th>
										<th><?php //echo 'Rp&nbsp;'.number_format($jumlah,2);?></th>
									</tr>-->

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
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
			<!-- Logout Modal-->
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