<h3>Detail Isi Memo</h3>
<input data-type='search' id='filtertableinput' placeholder='Cari' data-children='div ul li'>
<?php
	//print_r($logaksi);
	foreach($logaksi as $aksi){
		$noaksi=$aksi->no_aksi;
		$idm=$aksi->id_ismo;
		$nm=$aksi->nama;
		$tgl=$aksi->tgl_aksi;
		$sm=$aksi->nm_status_memo;
	//}
?>
	<div   data-role='collapsible' data-filter='true' data-inset='true' data-input='#filtertableinput' data-collapsed-icon='carat-d' data-expanded-icon='carat-u'>
	<h4><?php echo $idm;?></h4>

	<ul data-role='listview' data-inset='true' class='ui-responsive'>
		<li>Nomor : <?php echo $noaksi;?></li>
		<li>User : <?php echo $nm;?></li>
		<li>Tanggal : <?php echo $tgl;?></li>
		<li>Status Memo : <?php echo $sm;?></li>
	</ul>
		<a href='<?php echo base_url();?>index.php/Admin/frmubahdetmemo/<?php echo $noaksi;?>'><button>Ubah</button></a>
		<a href='<?php echo base_url();?>index.php/Admin/getidhapusdetmemo/<?php echo $noaksi;?>'><button onclick="return confirm('Apakah Anda yakin menghapus status log aksi dengan nomor <?php echo $noaksi;?>')">Hapus</button></a>
	</div>
<?php
	}
?>
<a href='<?php echo base_url();?>/index.php/Admin/frmtambahdet'><button>Tambah</button></a>


