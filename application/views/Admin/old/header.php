<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/jquery/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
	<script src="<?php echo base_url();?>assets/jquery/jquery-2.1.4.js"></script>
	<script src="<?php echo base_url();?>assets/jquery/jquery.mobile-1.4.5.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
	<script src="<?php echo base_url();?>assets/jquery/jquery-1.11.3.js"></script>
	<script src="<?php echo base_url();?>assets/jquery/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#datepicker,#datekpa,#datebend,#dateppk,#datespm,#dateada,#datetrima,#dateprogsur,#datesarpras,#datetu,#datekpa2,#datebend2,#dateppk2,#dateada2").datepicker({dateFormat:'yy-mm-dd'});
			
		});
	</script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		/* header('Last-Modified:'.  gmdate('D, d M Y H:i:s').'GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); */
	?>
</head>
<body>
	 <section id="hal1" data-role="page" data-theme="b" data-title="Administrator">
            <div data-role="header" data-position="fixed">
				<h1>Finding Memo</h1>
				<a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
            </div>
			<div data-role="panel" data-display="push" data-position-fixed="true" id="nav-panel">
				<ul data-role="listview" >
					<li data-icon="delete">
						<a href="#" data-rel="close">Tutup Menu</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>index.php/Admin/homeadmin">Beranda</a>
					</li>
					<li data-role="collapsible" data-iconpos="right" data-inset="false">
						<h2>Memo</h2>
						<ul data-role="listview" data-theme="a">
							<li><a href="<?php echo base_url();?>index.php/Admin/isimemo">Isi Memo</a></li>
							<li><a href="<?php echo base_url();?>index.php/Admin/jenismemo">Jenis Memo</a></li>
							<li><a href="<?php echo base_url();?>index.php/Admin/statusmemo">Status Memo</a></li>
						</ul>
					</li>
					<li>
						<a href="<?php echo base_url();?>index.php/Admin/user">User</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>index.php/Admin/jabatan">Jabatan</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>index.php/Admin/jenishal">Jenis Perihal</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>index.php/Admin/logout">Logout</a>
					</li>
				</ul>
		 </div>
<div role="main" class="ui-content jqm-content jqm-fullwidth">
