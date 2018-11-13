<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Modeluser extends CI_model{

	function __construct(){
		parent::__construct();
		$this->load->library('Session');
	}

		//FUNGSI UNTUK CEK LOGIN DARI USER
	function cekuser($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query=  $this->db->get('user');
		if($query->num_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

		//FUNGSI CEK NOMOR MEMO
	function ceknomormemo($x){
		$query=$this->db->get_where('isi_memo', array('nomor_memo' => $x),0,1);
		if($query->num_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

		//FUNGSI CEK ID PEGAWAI
	function cekidpegawai($x){
		$query=$this->db->get_where('user', array('username' => $x),0,1);
		return $query->result();
	}

		//FUNGSI CEK ID JENISMEMO
	function cekidjenismemo($x){
		$query=$this->db->get_where('jenis_memo', array('nm_jemo' => $x),0,1);
		return $query->result();
	}

		//FUNGSI CEK ID JENIS PERIHAL
	function cekidjenisperihal($x){
		$query=$this->db->get_where('jenis_perihal', array('nm_jenis_perihal' => $x),0,1);
		return $query->result();
	}

		//FUNGSI MENAMPILKAN KETERANGAN PERIHAL
	function keteranganperihal(){
		$query=$this->db->get('jenis_perihal');	
		return $query->result();
	}

		//FUNGSI KETERANGANJENISMEMO
	function keteranganjenismemo(){
		$query=$this->db->get('jenis_memo');	
		return $query->result();	
	}

		//FUNGSI KETERANGAN MEMO
	function keteranganmemo($id_pegawai){
		$query=$this->db->get_where('isi_memo', array('id_user' => $id_pegawai));
		return $query->result();
	}

		//FUNGSI KETERANGAN MEMOBARU
	function keteranganmemobaru($idmemo){
		$query=$this->db->get_where('isi_memo', array('id_ismo' => $idmemo));
		return $query->result();
	}

		//FUNGSI KETERANGAN MEMOPPK
	function keteranganmemoppk($id_pegawai){
		$query=$this->db->get_where('isi_memo', array('id_status_ppk' => $id_pegawai));
		return $query->result();
	}

		//FUNGSI KETERANGANMEMOUSER
	function keteranganmemouser(){
		$query=$this->db->get_where('isi_memo');
		return $query->result();
	}

		//FUNGSI KETERANGANSTATUSMEMO
	function keteranganstatusmemo(){
		$query=$this->db->get_where('status_memo');
		return $query->result();
	}

	function keteranganaksimemo(){
		$query = $this->db->query("select * from log_aksi");
		return $query->result();
	}

	function keteranganperihalrevisi($idmemo){
		$query=$this->db->get_where('isi_memo', array('id_ismo' => $idmemo));
		return $query->result();
	}

	function keteranganjenismemorevisi(){
		$query=$this->db->get('jenis_memo');	
		return $query->result();	
	}
		//END KETERANGANSTATUSMEMO

		//FUNGSI UNTUK MEMASUKKAN MEMO DARI USER
	function insertmemouser($nomormemo,$tanggalmemo,$waktumemo,$perihal,$nominal,$id_pegawai,$idjenismemo,$idjenisperihal,$kondisi,$mataanggaran,$akun){
		$data=array(
			'nomor_memo' => $nomormemo,
			'tanggal_entri' => $tanggalmemo,
			'waktu_entri'=> $waktumemo,
			'perihal'=>$perihal,
			'nilai'=>$nominal,
			'id_user'=>$id_pegawai,
			'id_jemo'=>$idjenismemo,
			'id_jenis_perihal'=>$idjenisperihal,
			'kondisi'=>$kondisi,
			'mak'=>$mataanggaran,
			'akun'=>$akun
		);
		$this->db->insert('isi_memo', $data);
	}

	function insertmemouserlogaksi($idmemo,$idpelaku,$tanggalentri,$waktumemo){
		$data=array(
			'id_ismo'=>$idmemo,
			'id_pelaku'=>$idpelaku,
			'tgl_aksi'=>$tanggalentri,
			'waktu_entri'=>$waktumemo,
			'aksi'=>'4'
		);
		$this->db->insert('log_aksi', $data);	
	}
		//END INSERT MEMO USER

	function updateisimemorevisi($idmemo,$tanggalmemo,$waktumemo,$perihal,$nominal,$id_pegawai,$idjenismemo,$idjenisperihal,$mataanggaran,$akun){
		$data = array(
			'tanggal_entri' => $tanggalmemo,
			'waktu_entri'=> $waktumemo,
			'perihal'=>$perihal,
			'nilai'=>$nominal,
			'id_user'=>$id_pegawai,
			'id_jemo'=>$idjenismemo,
			'id_jenis_perihal'=>$idjenisperihal,
			'catatan'=>NULL,
			'mak'=>$mataanggaran,
			'akun'=>$akun
		);
		$this->db->where('id_ismo', $idmemo);
		$this->db->update('isi_memo', $data); 
	}

	function deletelogaksirevisi($idmemo){
		$this->db->where('id_ismo', $idmemo);
		$this->db->delete('log_aksi');
	}

		//KPA
	/*INSERT KPA*/
	function updatestatusmemokpa($idstatusmemo,$idmemo,$tanggal,$waktumemo){
		$data=array(
			'id_ismo'=>$idmemo,
			'id_pelaku'=>'3',
			'tgl_aksi'=>$tanggal,
			'waktu_entri'=>$waktumemo,
			'aksi'=>$idstatusmemo
		);
		$this->db->insert('log_aksi', $data);		
	}

	function updatestatusmemokpaakhir($idstatusmemo,$idmemo,$tanggal,$waktumemo){
		$data=array(
			'id_ismo'=>$idmemo,
			'id_pelaku'=>'3',
			'tgl_aksi'=>$tanggal,
			'waktu_entri'=>$waktumemo,
			'aksi'=>$idstatusmemo
		);
		$this->db->insert('log_aksi', $data);		
	}

	function updatestatusmemokpaawal($idmemo,$kondisimemo){
		$this->db->set('kondisi',$kondisimemo);
		$this->db->where('id_ismo',$idmemo);
		$this->db->update('isi_memo');
	}

	function updatestatusmemokpatengah($idmemo,$kondisimemo){
		$this->db->set('kondisi',$kondisimemo);
		$this->db->where('id_ismo',$idmemo);
		$this->db->update('isi_memo');
	}

	/*REVISI KPA*/
	function revisitatusmemokpa($idstatusmemo,$idmemo,$tanggal,$waktumemo){
		$data=array(
			'id_ismo'=>$idmemo,
			'id_pelaku'=>'3',
			'tgl_aksi'=>$tanggal,
			'waktu_entri'=>$waktumemo,
			'aksi'=>$idstatusmemo
		);
		$this->db->insert('log_aksi', $data);		
	}

	function revisistatusmemokpacat($idmemo,$catatan){
		$this->db->set('catatan',$catatan);
		$this->db->where('id_ismo',$idmemo);
		$this->db->update('isi_memo');
	}

	function revisistatusmemokpaakhir($idmemo,$kondisi){
		$this->db->set('kondisi',$kondisi);
		$this->db->where('id_ismo',$idmemo);
		$this->db->update('isi_memo');
	}
	/*END REVISI KPA*/

		//END OF KPA

		//PPK
	function revisitatusmemoppk($idstatusmemo,$idmemo,$tanggal,$waktumemo){
		$data=array(
			'id_ismo'=>$idmemo,
			'id_pelaku'=>'4',
			'tgl_aksi'=>$tanggal,
			'waktu_entri'=>$waktumemo,
			'aksi'=>$idstatusmemo
		);
		$this->db->insert('log_aksi', $data);		
	}

	function revisistatusmemoppkcat($idmemo,$catatan){
		$this->db->set('catatan',$catatan);
		$this->db->where('id_ismo',$idmemo);
		$this->db->update('isi_memo');
	}
	function updatedisposisi($idmemo,$untuk){
		$this->db->set('disposisippk',$untuk);
		$this->db->where('id_ismo',$idmemo);
		$this->db->update('isi_memo');	
	}

	function updatestatusmemoppkkondisi($idmemo,$kondisimemo){
		$this->db->set('kondisi',$kondisimemo);
		$this->db->where('id_ismo',$idmemo);
		$this->db->update('isi_memo');
	}


		//END OF PPK

		//BENDAHARA
	function revisitatusmemobendahara($idstatusmemo,$idmemo,$tanggal,$waktumemo){
		$data=array(
			'id_ismo'=>$idmemo,
			'id_pelaku'=>'5',
			'tgl_aksi'=>$tanggal,
			'waktu_entri'=>$waktumemo,
			'aksi'=>$idstatusmemo
		);
		$this->db->insert('log_aksi', $data);		
	}

	function revisistatusmemobendaharacat($idmemo,$kondisi){
		$this->db->set('kondisi',$kondisi);
		$this->db->where('id_ismo',$idmemo);
		$this->db->update('isi_memo');
	}

	function updatestatusmemobendahara($idstatusmemo,$idmemo,$tanggal,$waktumemo){
		$data=array(
			'id_ismo'=>$idmemo,
			'id_pelaku'=>'5',
			'tgl_aksi'=>$tanggal,
			'waktu_entri'=>$waktumemo,
			'aksi'=>$idstatusmemo
		);
		$this->db->insert('log_aksi', $data);		
	}

	function updatestatusmemobendaharaakhir($idmemo,$kondisimemo){
		$this->db->set('kondisi',$kondisimemo);
		$this->db->where('id_ismo',$idmemo);
		$this->db->update('isi_memo');
	}

	function updatestatusmemobendaharatengah($idmemo,$kondisimemo){
		$this->db->set('kondisi',$kondisimemo);
		$this->db->where('id_ismo',$idmemo);
		$this->db->update('isi_memo');
	}
		//END OF BENDAHARA

	function updatestatusmemoppk($idstatusmemo,$idmemo,$tanggal,$waktumemo){
		$data=array(
			'id_ismo'=>$idmemo,
			'id_pelaku'=>'4',
			'tgl_aksi'=>$tanggal,
			'waktu_entri'=>$waktumemo,
			'aksi'=>$idstatusmemo
		);
		$this->db->insert('log_aksi', $data);		
	}



	function updatestatusmemopenerimaan($idstatusmemo,$idmemo,$tanggal,$waktumemo){
		$data=array(
			'id_ismo'=>$idmemo,
			'id_pelaku'=>'8',
			'tgl_aksi'=>$tanggal,
			'waktu_entri'=>$waktumemo,
			'aksi'=>$idstatusmemo
		);
		$this->db->insert('log_aksi', $data);		
	}

	function updatestatusmemospm($idstatusmemo,$idmemo,$tanggal,$waktumemo){
		$data=array(
			'id_ismo'=>$idmemo,
			'id_pelaku'=>'6',
			'tgl_aksi'=>$tanggal,
			'waktu_entri'=>$waktumemo,
			'aksi'=>$idstatusmemo
		);
		$this->db->insert('log_aksi', $data);		
	}

	function updatestatusmemopengadaan($idstatusmemo,$idmemo,$tanggal,$waktumemo){
		$data=array(
			'id_ismo'=>$idmemo,
			'id_pelaku'=>'7',
			'tgl_aksi'=>$tanggal,
			'waktu_entri'=>$waktumemo,
			'aksi'=>$idstatusmemo
		);
		$this->db->insert('log_aksi', $data);		
	}

		//FUNGSI PENCARIAN MEMO
	function carimemo($idmemo){
		$query = $this->db->get_where('isi_memo', array('id_ismo' => $idmemo));
		return $query->result();
	}

	function carimemo2($idmemo){
		$query = $this->db->get_where('log_aksi', array('id_ismo' => $idmemo));
		return $query->result();
	}

	function jumlahcari($idmemo){
		$query=$this->db->query("SELECT COUNT(*) as jumlahdata FROM isi_memo where id_ismo=$idmemo");
		return $query->result();
	}
		//END PENCARIAN MEMO

	function tampilrekap(){
		$query=$this->db->query("SELECT * from isi_memo");
		return $query->result();
	}

	function tampilrekapspesifik($keyword){
		$query=$this->db->query("SELECT * from isi_memo where nomor_memo like '%$keyword%'");
		return $query->result();
	}

	function tampilrekapspesifikdobel($keyword1,$keyword2){
		$query=$this->db->query("SELECT * from isi_memo where nomor_memo like '%$keyword1%' OR nomor_memo like '%keyword2%'");
		return $query->result();
	}

	function detaillog($id){
		$query=$this->db->query("SELECT * from log_aksi where id_ismo='$id'");
		return $query->result();
	}

		//UMUM DAN SEISMIK
	function keteranganmemouserumum(){
		$query=$this->db->query("SELECT * FROM `isi_memo` where nomor_memo like '%Teksurla.01%' 
			OR nomor_memo like '%Teksurla.04%'");
		return $query->result();
	}

		//SARPRAS DAN KEREKAYASAAN SARPRAS
	function keteranganmemousersarpras(){
		$query=$this->db->query("SELECT * FROM `isi_memo` where nomor_memo like '%Teksurla.03%'
			OR nomor_memo like '%Teksurla.07%'");
		return $query->result();
	}

		//PROGRAM
	function keteranganmemouserprogram(){
		$query=$this->db->query("SELECT * FROM `isi_memo` where nomor_memo like '%Teksurla.02%'");
		return $query->result();
	}

		//OFS
	function keteranganmemouserofs(){
		$query=$this->db->query("SELECT * FROM `isi_memo` where nomor_memo like '%Teksurla.05%'");
		return $query->result();
	}

		//NSTP&PENGELOLAANDATA
	function keteranganmemouserdata(){
		$query=$this->db->query("SELECT * FROM `isi_memo` where nomor_memo like '%Teksurla.06%'
			OR nomor_memo like '%Teksurla.08%'");
		return $query->result();
	}

	function revisinominalpengadaan($id,$nominal){
		$this->db->set('nilai',$nominal);
		$this->db->where('id_ismo',$id);
		$this->db->update('isi_memo');
	}

	function revisiberkasspm($id,$catatan){
		$this->db->set('catatan',$catatan);
		$this->db->where('id_ismo',$id);
		$this->db->update('isi_memo');
	}

	function kosongcatatan($idmemo,$catatan){
		$this->db->set('catatan',$catatan);
		$this->db->where('id_ismo',$idmemo);
		$this->db->update('isi_memo');	
	}

	function kosongcatatanakhir($idmemo,$catatan,$statusmemo){
		$this->db->set('catatan',$catatan);
		$this->db->set('kondisi',$statusmemo);
		$this->db->where('id_ismo',$idmemo);
		$this->db->update('isi_memo');	
	}

	function revisinominalbendahara($id,$nominal){
		$this->db->set('nilai',$nominal);
		$this->db->where('id_ismo',$id);
		$this->db->update('isi_memo');
	}

}
?>