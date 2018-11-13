<h3>Isi Memo</h3>
<input data-type='search' id='filtertableinput' placeholder='Cari' data-children='div ul li' >
<?php 
	foreach ($ismo as $im){
		$idm=$im->id_ismo;
		$nmo=$im->nomor_memo;
		$tgle=$im->tanggal_entri;
		$hal=$im->perihal;
		$nilai=$im->nilai;
		$jhal=$im->nm_jenis_perihal;
		$jm=$im->nm_jemo;
		$us=$im->nama;
		$skpa=$im->status_kpa;
		$tkpa=$im->tgl_kpa;
		$sbend=$im->status_bendahara;
		$tbend=$im->tgl_bendahara;
		$sppk=$im->status_ppk;
		$tppk=$im->tgl_ppk;
		$sspm=$im->status_spm;
		$tspm=$im->tgl_spm;
		$sada=$im->status_pengadaan;
		$tada=$im->tgl_pengadaan;
		$sterima=$im->status_penerima;
		$tterima=$im->tgl_penerima;
		$sprogsur=$im->status_progsur;
		$tprogsur=$im->tgl_progsur;
		$ssarpras=$im->status_sarpras;
		$tsarpras=$im->tgl_sarpras;
		$sumum=$im->status_umum;
		$tumum=$im->tgl_umum;
		$skpa2=$im->status_kpa2;
		$tkpa2=$im->tgl_kpa2;
		$sbend2=$im->status_bendahara2;
		$tbend2=$im->tgl_bendahara2;
		$sppk2=$im->status_ppk2;
		$tppk2=$im->tgl_ppk2;
		$sada2=$im->status_pengadaan2;
		$tada2=$im->tgl_pengadaan2;
		$idsdetail=$im->id_status_detail;
?>

<div data-role='collapsible' data-filter='true' data-inset='true' data-input='#filtertableinput' data-collapsed-icon='carat-d' data-expanded-icon='carat-u'>
	<h4><?php echo $hal;?></h4>
	<ul data-role='listview' data-inset='true'  class='ui-responsive'>
		<li>Nomor Memo :<?php echo $nmo;?></li>
		<li>Tanggal Entry : <?php echo $tgle;?></li>
		<li>Perihal : <?php echo $hal;?></li>
		<li>Nilai : <?php echo $nilai;?></li>
		<li>Jenis Perihal : <?php echo $jhal;?></li>
		<li>Jenis Memo : <?php echo $jm;?></li>
		<li>User : <?php echo $us;?></li>
		<li>Status KPA : <?php echo $skpa;?></li>
		<li>Tanggal KPA : <?php echo $tkpa;?></li>
		<li>Status PPK : <?php echo $sppk;?></li>
		<li>Tanggal PPK : <?php echo $tppk;?></li>
		<li>Disposisi PPK : <?php echo $idsdetail;?></li>
		<li>Status Bendahara : <?php echo $sbend;?></li>
		<li>Tanggal Bendahara : <?php echo $tbend;?></li>
		<li>Status Pengadaan : <?php echo $sada;?></li>
		<li>Tanggal Pengadaan : <?php echo $tada;?></li>
		<li>Status Penerima : <?php echo $sterima;?></li>
		<li>Tanggal Penerima : <?php echo $tterima;?></li>
		<li>Status SPM : <?php echo $sspm;?></li>
		<li>Tanggal SPM : <?php echo $tspm;?></li>
		<li>Status PPK 2 : <?php echo $sppk2;?></li>
		<li>Tanggal PPK 2 : <?php echo $tppk2;?></li>
		<li>Status KPA 2 : <?php echo $skpa2;?></li>
		<li>Tanggal KPA 2: <?php echo $tkpa2;?></li>
		<li>Status Bendahara 2: <?php echo $sbend2;?></li>
		<li>Tanggal Bendahara 2: <?php echo $tbend2;?></li>
		<li>Status Kasie Program dan Survei : <?php echo $sprogsur;?></li>
		<li>Tanggal Kasie Program dan Survei : <?php echo $tprogsur;?></li>
		<li>Status Kasie Sarana dan Prasarana: <?php echo $ssarpras;?></li>
		<li>Tanggal Kasie Sarana dan Prasarana : <?php echo $tsarpras;?></li>
		<li>Status Kabag TU : <?php echo $sumum;?></li>
		<li>Tanggal Kabag TU : <?php echo $tumum;?></li>
		<li>Status Pengadaan 2 : <?php echo $sada2;?></li>
		<li>Tanggal Pengadaan 2 : <?php echo $tada2;?></li>
		
	</ul><a href='<?php echo base_url();?>index.php/Admin/frmubahismo/<?php echo $idm;?>'><button>Ubah</button></a>
		<a href='<?php echo base_url();?>index.php/Admin/getidhapusismo/<?php echo $idm;?>'><button onclick="return confirm('Apakah Anda yakin menghapus data <?php echo $hal;?>')">Hapus</button></a>
</div>
	
<?php
	}
?>
<a href='<?php echo base_url();?>index.php/admin/frmtambhaismo'><button>Tambah</button></a>

