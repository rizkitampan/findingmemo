<?php
  // Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 // Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=findingmemo-export.xls");
?>
<table border="1">
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
   			}elseif($idpelaku==13){
   				$idpelaku='Sekretaris Progsur';
   			}elseif($idpelaku==14){
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
      	<td><?php echo $nomormemo;?></td>
      	<td><?php echo $tanggalentri;?></td>
      	<td><?php if(isset($indukmemo)){
                     echo $indukmemo;
                  }else{
                     $indukmemo='NULL';
                  }
         ?></td>
      	<td><?php echo $perihal;?></td>
      	<td><?php echo 'Rp&nbsp;'.number_format($nilai,2);?></td>
      	<td><b><?php echo $aksi;?>&nbsp;oleh&nbsp;<?php echo $idpelaku;?></b></td>
         <td><?php echo $kondisi;?></td>
      </tr>
     <?php $jumlah=$jumlah+$nilai;?>
     <?php }?>
     <tr class="sum">
        <th colspan="5">Total</th>
        <td align="right" colspan="" class="sum"><?php echo 'Rp&nbsp;'.number_format($jumlah,2);?></td>
        <td colspan="2"></td>
     </tr>
</table>
<?php
/* This will give an error. Note the output
 * above, which is before the header() call */
header('<?php echo base_url()?>User/rekapmemo');
exit;
?>