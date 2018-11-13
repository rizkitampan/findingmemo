 <div class="content-wrapper">
 	<div class="container-fluid">
 		<!-- Breadcrumbs-->
 		<ol class="breadcrumb">
 			<li class="breadcrumb-item">
 				<?php 
 				$x=$this->session->userdata('username');
 				if($x=='vira'){
 					$x='sekretaris tata usaha';
 				}elseif($x=='yuni'){
 					$x='sekretaris sarana dan prasarana';
 				}elseif($x=='sugi'){
 					$x='sekretaris program dan operasi survei';
 				}elseif($x=='ira'){
 					$x='sekretaris kegiatan';
 				}
 				?>
 				<a href="<?php echo base_url();?>User/beranda"><?php echo $x;?></a>
 			</li>
 			<li class="breadcrumb-item active">Alur memo</li>
 		</ol>