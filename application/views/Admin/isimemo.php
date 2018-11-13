<h3>Isi Memo</h3>
<input data-type='search' id='filtertableinput' placeholder='Cari' data-children='div ul li' >
<?php 
	foreach ($ismo as $im){
		$idm=$im->id_ismo;
		$nmo=$im->nomor_memo;
		$tgle=$im->tanggal_entri;
		$wkt=$im->waktu_entri;
		$hal=$im->perihal;
		$nilai=$im->nilai;
		$jhal=$im->nm_jenis_perihal;
		$jm=$im->nm_jemo;
		$us=$im->nama;
		$dppk=$im->disposisippk;
		$ctt=$im->catatan;
		$kond=$im->nm_status_memo;
?>

<div data-role='collapsible' data-filter='true' data-inset='true' data-input='#filtertableinput' data-collapsed-icon='carat-d' data-expanded-icon='carat-u'>
	<h4><?php echo $hal;?></h4>
	<ul data-role='listview' data-inset='true'  class='ui-responsive'>
		<li>Nomor Memo :<?php echo $nmo;?></li>
		<li>Tanggal Entry : <?php echo $tgle;?></li>
		<li>Waktu Entry : <?php echo $wkt;?></li>
		<li>Perihal : <?php echo $hal;?></li>
		<li>Nilai : <?php echo $nilai;?></li>
		<li>Jenis Perihal : <?php echo $jhal;?></li>
		<li>Jenis Memo : <?php echo $jm;?></li>
		<li>User : <?php echo $us;?></li>
		<li>Disposisi PPK : <?php echo $dppk;?></li>
		<li>Catatan : <?php echo $ctt;?></li>
		<li>Kondisi : <?php echo $kond;?></li>
		
	</ul>
		<a href='<?php echo site_url('Administrator/frmubahismo/'.$idm.'');?>'><button>Ubah</button></a>
		<a href='<?php echo site_url('Administrator/getidhapusismo/'.$idm.'');?>' data-ajax="false"><button onclick="return confirm('Apakah Anda yakin menghapus data <?php echo $hal;?>')">Hapus</button></a>
</div>
	
<?php
	}
?>
<a href='<?php echo site_url('Administrator/frmtambhaismo');?>'><button>Tambah</button></a>

