<?php
	class Modeladmin extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function login($user,$pass){
			$query=$this->db->query("SELECT * FROM user where username='$user' and password='$pass' and id_jabatan=1");
			return $query->result();
		}
		//FUNGSI TAMPIL
		function getjmemo(){
			$query=$this->db->query("SELECT * FROM jenis_memo");
			return $query->result();
		}
		function getismemo(){
			$query=$this->db->query("SELECT id_ismo, nomor_memo,mak,akun,tanggal_entri,waktu_entri,perihal, nilai,nm_jenis_perihal,nm_jemo,nama,nm_jabatan as disposisippk,catatan,nm_status_memo
			FROM isi_memo i
			LEFT JOIN mata_anggaran ma ON i.akun=ma.id_akun
			LEFT JOIN jenis_perihal jp ON  i.id_jenis_perihal=jp.id_jenhal
			LEFT JOIN jenis_memo jm ON  i.id_jemo=jm.id_jemo
			LEFT JOIN jabatan jbt ON i.disposisippk=jbt.id_jabatan
			LEFT JOIN user u ON i.id_user=u.id_user
            LEFT JOIN status_memo sm ON i.kondisi=sm.id_status");
			return $query->result();
		}
		function getstatmemo(){
			$query=$this->db->query("SELECT * FROM status_memo");
			return $query->result();
		}
		function getuser(){
			$query=$this->db->query("SELECT u.id_user,u.nama,u.username,u.password, j.nm_jabatan, u.keterangan FROM user u, jabatan j 
			WHERE u.id_jabatan=j.id_jabatan");
			return $query->result();
		}
		function getjabatan(){
			$query=$this->db->query("SELECT * FROM jabatan");
			return $query->result();
		}

		//fungsi ambil jabatan yang disposisi PPK
		function getjbtdppk(){
			$query=$this->db->query("SELECT * FROM jabatan WHERE id_jabatan='3' OR id_jabatan='6'");
			return $query->result();
		}

		function getjenal(){
			$query=$this->db->query("SELECT * FROM jenis_perihal");
			return $query->result();
		}
		function getakun(){
			$query=$this->db->query("SELECT * FROM akun");
			return $query->result();
		}
		function getmak(){
			$query=$this->db->query("SELECT * FROM mata_anggaran");
			return $query->result();
		}
		function getrevisi(){
			$query=$this->db->query("SELECT * FROM revisi");
			return $query->result();
		}
		//FUNGSI GET LAST ID
		function getidjmemo(){
			$query=$this->db->query("SELECT max(id_jemo) as idmax FROM jenis_memo");
			return $query->result();
		}
		function getidsmemo(){
			$query=$this->db->query("SELECT max(id_status) as idmax FROM status_memo");
			return $query->result();
		}
		function getidjabatan(){
			$query=$this->db->query("SELECT max(id_jabatan) as idmax FROM jabatan");
			return $query->result();
		}
		function getiduser(){
			$query=$this->db->query("SELECT max(id_user) as idmax FROM user");
			return $query->result();
		}
		function getidjhal(){
			$query=$this->db->query("SELECT max(id_jenhal) as idmax FROM jenis_perihal");
			return $query->result();
		}
		function getidismo(){
			$query=$this->db->query("SELECT max(id_ismo) as idmax FROM isi_memo");
			return $query->result();
		}

		//FUNGSI GET ID
		function getjmemoid($idjm){
			$query=$this->db->query("SELECT * FROM jenis_memo WHERE id_jemo='$idjm'");
			return $query->result();
		}
		
		function getstatmemoid($idsm){
			$query=$this->db->query("SELECT * FROM status_memo WHERE id_status='$idsm'");
			return $query->result();
		}
		function getjabid($idj){
			$query=$this->db->query("SELECT * FROM jabatan WHERE id_jabatan='$idj'");
			return $query->result();
		}
		function getuserid($idu){
			$query=$this->db->query("SELECT * FROM user WHERE id_user='$idu'");
			return $query->result();
		}
		function getjhid($idh){
			$query=$this->db->query("SELECT * FROM jenis_perihal WHERE id_jenhal='$idh'");
			return $query->result();
		}
		function getismoid($idi){
			$query=$this->db->query("SELECT * FROM isi_memo WHERE id_ismo='$idi'");
			return $query->result();
		}
		function getidakun($idak){
			$query=$this->db->query("SELECT * FROM akun WHERE id_akun='$idak'");
			return $query->result();
		}
		function getidmak($idm){
			$query=$this->db->query("SELECT * FROM mata_anggaran WHERE id_mak='$idm'");
			return $query->result();
		}
		//FUNGSI TAMBAH
		function tambahjemo($id_jemo,$jemo,$ket){
			$query=$this->db->query("INSERT INTO jenis_memo(id_jemo,nm_jemo,keterangan) VALUES('$id_jemo','$jemo','$ket')");
		}
		function tambahstatmemo($idsm,$nmsm,$ket){
			$query=$this->db->query("INSERT INTO status_memo(id_status,nm_status_memo,keterangan) VALUES('$idsm','$nmsm','$ket')");
		}
		function tambahjabatan($idj,$nmj,$ket){
			$query=$this->db->query("INSERT INTO jabatan(id_jabatan,nm_jabatan,keterangan) VALUES('$idj','$nmj','$ket')");
		}
		function tambahuser($idu,$nama,$username,$password,$idjbt,$ket){
			$query=$this->db->query("INSERT INTO user(id_user,nama,username,password,id_jabatan,keterangan) 
													VALUES
									('$idu','$nama','$username','$password','$idjbt','$ket')");
		}
		function tambahjhal($idh,$nmh,$ket){
			$query=$this->db->query("INSERT INTO jenis_perihal(id_jenhal,nm_jenis_perihal,keterangan) VALUES('$idh','$nmh','$ket')");
			//echo $query;
		}
		function tambahakun($id,$urai,$ket){
			$query=$this->db->query("INSERT INTO akun(id_akun,uraian_akun,keterangan) VALUES('$id','$urai','$ket')");
		}
		function tambahismo($id,$nmo,$tgle,$wkt,$mak,$akun,$hal,$jp,$nilai,$jemo,$user,$ppk,$cttn,$smemo){
			$query=$this->db->query("INSERT INTO isi_memo(id_ismo,nomor_memo,mak,akun,tanggal_entri,waktu_entri,perihal,id_jenis_perihal,nilai,id_jemo,id_user,disposisippk,catatan,kondisi) 
			VALUES('$id','$nmo','$mak','$akun','$tgle','$wkt','$hal','$jp','$nilai','$jemo','$user','$ppk','$cttn','$smemo')");
		}
		function tambahmak($idm,$um,$ket){
			$query=$this->db->query("INSERT INTO mata_anggaran(id_mak,uraian_mak,keterangan) VALUES('$idm','$um','$ket')");
		}

		//FUNGSI HAPUS
		function deljmemo($id){
			$query=$this->db->query("DELETE FROM jenis_memo WHERE id_jemo='$id'");
		}
		function delsmemo($id){
			$query=$this->db->query("DELETE FROM status_memo WHERE id_status='$id'");
		}
		function deljabatan($id){
			$query=$this->db->query("DELETE FROM jabatan WHERE id_jabatan='$id'");
		}
		function deluser($id){
			$query=$this->db->query("DELETE FROM user WHERE id_user='$id'");
		}
		function deljenhal($id){
			$query=$this->db->query("DELETE FROM jenis_perihal WHERE id_jenhal='$id'");
		}
		function delismo($id){
			$query=$this->db->query("DELETE FROM isi_memo WHERE id_ismo='$id'");
		}
		function delakun($id){
			$query=$this->db->query("DELETE FROM akun WHERE id_akun='$id'");
		}
		function delmak($id){
			$query=$this->db->query("DELETE FROM mata_anggaran WHERE id_mak='$id'");
		}
		//FUNGSI UBAH
		function ubahjemo($id_jemo,$jemo,$ket){
			$query=$this->db->query("UPDATE jenis_memo SET nm_jemo='$jemo', keterangan='$ket' WHERE id_jemo='$id_jemo'");
		}
		function ubahsmemo($id_smemo,$nmstat,$ket){
			$query=$this->db->query("UPDATE status_memo SET nm_status_memo='$nmstat', keterangan='$ket' WHERE id_status='$id_smemo'");
		}
		function ubahjabatan($idj,$nmj,$ket){
			$query=$this->db->query("UPDATE jabatan SET nm_jabatan='$nmj', keterangan='$ket' WHERE id_jabatan='$idj'");
		}
		function ubahuser($idu,$nama,$username,$password,$ket,$idjb){
			$query=$this->db->query("UPDATE user SET nama='$nama', username='$username', password='$password', 
													keterangan='$ket', id_jabatan='$idjb' WHERE id_user='$idu'");
		}
		function ubahjenhal($idh,$nm,$ket){
			$query=$this->db->query("UPDATE jenis_perihal SET nm_jenis_perihal='$nm', keterangan='$ket' WHERE id_jenhal='$idh'");
		}
		function ubahisimemo($idi,$nmo,$mak,$akun,$tgl,$wkt,$perihal,$jhal,$nilai,$jemo,$user,$dppk,$cttn){
			$query=$this->db->query("UPDATE isi_memo SET nomor_memo='$nmo',mak='$mak',akun='$akun',tanggal_entri='$tgl',waktu_entri='$wkt',perihal='$perihal',id_jenis_perihal='$jhal',nilai='$nilai',
												id_jemo='$jemo',id_user='$user',disposisippk='$dppk',catatan='$cttn' WHERE id_ismo='$idi'");
		}
		function ubahakun($id,$ua,$ket){
			$query=$this->db->query("UPDATE akun SET uraian_akun='$ua', keterangan='$ket' WHERE id_akun='$id'");

		}
		function ubahmak($id,$um,$ket){
			$query=$this->db->query("UPDATE mata_anggaran SET uraian_mak='$um',keterangan='$ket' WHERE id_mak='$id'");

		}
	}
?>