<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

	class Administrator extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('form');
       		$this->load->helper('url');
      		$this->load->helper('email');
      		$this->load->helper('html');
			$this->load->library('session','form_validation');
			$this->load->database();
			$this->load->model('Modeladmin');
		}
		
		public function index(){
			$this->load->view('Admin/index');
		}
		
		function clogin(){
			$user=$this->input->post('username');
			$pass=$this->input->post('password');
			$x=$this->Modeladmin->login($user,$pass);
			if($x==true){
			$data = array(
				'username'=> $user,
				'password'=> $pass,
				'logged_in' => TRUE
			);
				$this->session->set_userdata($data);
				redirect('Administrator/homeAdmin',$data);
			}else{
				$this->session->set_flashdata('username',$user);
				$this->session->set_flashdata('error_message','<div><font color=black>Mohon cek kembali username dan password Anda</font></div>');
				redirect('Administrator');
			}	
		}
		
		function homeAdmin(){
			if(($this->session->userdata('username'))!=''){
				$this->load->view('Admin/header');
				$this->load->view('Admin/homeadmin');
				$this->load->view('Admin/footer');
			}else{
            $this->session->set_flashdata('error_message', '<div class="error"><font color=black>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
            redirect('Administrator');
        	}
		}
		
		function isimemo(){
			if(($this->session->userdata('username'))!=''){
				$this->load->view('Admin/header');
				$data['ismo']=$this->Modeladmin->getismemo();
				$this->load->view('Admin/isimemo',$data);
				$this->load->view('Admin/footer');
			}else{
            $this->session->set_flashdata('error_message', '<div class="error"><font color=black>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
            redirect('Administrator');
        	}
		}
		function jenismemo(){
			if(($this->session->userdata('username'))!=''){
				$this->load->view('Admin/header');
				$data['jmemo']=$this->Modeladmin->getjmemo();
				$this->load->view('Admin/jenismemo',$data);
				$this->load->view('Admin/footer');
			}else{
            $this->session->set_flashdata('error_message', '<div class="error"><font color=black>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
            redirect('Administrator');
        	}
		}
		function statusmemo(){
			if(($this->session->userdata('username'))!=''){
				$this->load->view('Admin/header');
				$data['statmemo']=$this->Modeladmin->getstatmemo();
				$this->load->view('Admin/statusmemo',$data);
				$this->load->view('Admin/footer');
			}else{
            $this->session->set_flashdata('error_message', '<div class="error"><font color=black>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
            redirect('Administrator');
        	}
		}
		function user(){
			if(($this->session->userdata('username'))!=''){
				$data['user']=$this->Modeladmin->getuser();
				$this->load->view('Admin/user',$data);
			}else{
            $this->session->set_flashdata('error_message', '<div class="error"><font color=black>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
            redirect('Administrator');
        	}
		}
		function jabatan(){
			if(($this->session->userdata('username'))!=''){
				$this->load->view('Admin/header');
				$data['jabatan']=$this->Modeladmin->getjabatan();
				$this->load->view('Admin/jabatan',$data);
				$this->load->view('Admin/footer');
			}else{
            $this->session->set_flashdata('error_message', '<div class="error"><font color=black>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
            redirect('Administrator');
        	}
		}
		function jenishal(){
			if(($this->session->userdata('username'))!=''){
				$this->load->view('Admin/header');
				$data['jenal']=$this->Modeladmin->getjenal();
				$this->load->view('Admin/jenishal',$data);
				$this->load->view('Admin/footer');
			}else{
            $this->session->set_flashdata('error_message', '<div class="error"><font color=black>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
            redirect('Administrator');
        	}
		}
		function akun(){
			if(($this->session->userdata('username'))!=''){
				$this->load->view('Admin/header');
				$data['akun']=$this->Modeladmin->getakun();
				$this->load->view('Admin/akun',$data);
				$this->load->view('Admin/footer');
			}else{
            $this->session->set_flashdata('error_message', '<div class="error"><font color=black>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
            redirect('Administrator');
        	}
		
		}
		function mak(){
			if(($this->session->userdata('username'))!=''){
				$this->load->view('Admin/header');
				$data['mak']=$this->Modeladmin->getmak();
				$this->load->view('Admin/mak',$data);
				$this->load->view('Admin/footer');
			}else{
				$this->session->set_flashdata('error_message', '<div class="error"><font color=black>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
            	redirect('Administrator');
			}
		}
		function revisi(){
			if(($this->session->userdata('username'))!=''){
				$this->load->view('Admin/header');
				$data['revisi']=$this->Modeladmin->getrevisi();
				$this->load->view('Admin/revisi',$data);
				$this->load->view('Admin/footer');
			}else{
				$this->session->set_flashdata('error_message', '<div class="error"><font color=black>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
				redirect('Administrator');
			}
		}
		//FUNGSI HAPUS
		function getidhapusjmemo($idjm){
			$idjm=$this->uri->segment(3);
			$this->Modeladmin->deljmemo($idjm);
			redirect('Administrator/jenismemo');
		}
		function getidhapusstatmemo($idsm){
			$idsm=$this->uri->segment(3);
			$this->Modeladmin->delsmemo($idsm);
			redirect('Administrator/statusmemo');
		}
		function getidhapusjbt(){
			$idj=$this->uri->segment(3);
			$this->Modeladmin->deljabatan($idj);
			redirect('Administrator/jabatan');
		}
		function getidhapususer(){
			$iduser=$this->uri->segment(3);
			$this->Modeladmin->deluser($iduser);
			redirect('Administrator/user');
		}
		function getidhapusjenhal(){
			$idh=$this->uri->segment(3);
			$this->Modeladmin->deljenhal($idh);
			redirect('Administrator/jenishal');
		}
		function getidhapusismo(){
			$idi=$this->uri->segment(3);
			$this->Modeladmin->delismo($idi);
			redirect('Administrator/isimemo');
		}
		function getidhapusakun(){
			$idak=$this->uri->segment(3);
			$this->Modeladmin->delakun($idak);
			redirect('Administrator/akun');
		}
		function getidhapusmak(){
			$idm=$this->uri->segment(3);
			$this->Modeladmin->delmak($idm);
			redirect('Administrator/mak');
		}
		//FUNGSI TAMBAH
		function frmtambahjmemo(){
			$this->load->view('Admin/header');
			$data['gidjmemo']=$this->Modeladmin->getidjmemo();
			$this->load->view('Admin/tambah_jemo',$data);
			$this->load->view('Admin/footer');
		}
		function prosestambahjemo(){
			$id_jemo=$this->input->post('id_jemo');
			$jemo=$this->input->post('jemo');
			$ket=$this->input->post('ket');
			$this->Modeladmin->tambahjemo($id_jemo,$jemo,$ket);
			redirect('Administrator/jenismemo');
		}
		function frmtambahsmemo(){
			$this->load->view('Admin/header');
			$data['gidsmemo']=$this->Modeladmin->getidsmemo();
			$this->load->view('Admin/tambah_smemo',$data);
			$this->load->view('Admin/footer');
		}
		function prosestambahsmemo(){
			$id_smemo=$this->input->post('id_status');
			$nmstat=$this->input->post('statmemo');
			$ket=$this->input->post('keterangan');
			$this->Modeladmin->tambahstatmemo($id_smemo,$nmstat,$ket);
			redirect('Administrator/statusmemo');
		}
		function frmtambahjabatan(){
			$this->load->view('Admin/header');
			$data['gidj']=$this->Modeladmin->getidjabatan();
			$this->load->view('Admin/tambah_jabatan',$data);
			$this->load->view('Admin/footer');
		}
		function prosestambahjabatan(){
			$idj=$this->input->post('idj');
			$nmj=$this->input->post('nmj');
			$ket=$this->input->post('ket');
			$this->Modeladmin->tambahjabatan($idj,$nmj,$ket);
			redirect('Administrator/jabatan');
		}
		function frmtambahuser(){
			$this->load->view('Admin/header');
			$data['idusr']=$this->Modeladmin->getiduser();
			$data['jabatan']=$this->Modeladmin->getjabatan();
			$this->load->view('Admin/tambah_user',$data);
			$this->load->view('Admin/footer');
		}
		function prosestambahuser(){
			$idu=$this->input->post('idusr');
			$nama=$this->input->post('nama');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$idjbt=$this->input->post('jabatan');
			$ket=$this->input->post('ket');
			$this->Modeladmin->tambahuser($idu,$nama,$username,$password,$idjbt,$ket);
			redirect('Administrator/user');
			//redirect('Admin/user', 'location', 301);
		} 
		function frmtambahjenhal(){
			$this->load->view('Admin/header');
			$data['jhal']=$this->Modeladmin->getidjhal();
			$this->load->view('Admin/tambah_jenishal',$data);
			$this->load->view('Admin/footer');
		}
		function prosestambahjenhal(){
			$idh=$this->input->post('idh');
			$nmh=$this->input->post('nmh');
			$ket=$this->input->post('ket');
			$this->Modeladmin->tambahjhal($idh,$nmh,$ket);
			//print_r($s);
			//echo '$s';
			redirect('Administrator/jenishal');
		}
		function frmtambahakun(){
			$this->load->view('Admin/header');
			$data['akun']=$this->Modeladmin->getakun();
			$this->load->view('Admin/tambah_akun',$data);
			$this->load->view('Admin/footer');
		}
		function prosestambahakun(){
			$idak=$this->input->post('idak');
			$uraiak=$this->input->post('uraiakun');
			$ket=$this->input->post('keterangan');
			$this->Modeladmin->tambahakun($idak,$uraiak,$ket);
			redirect('Administrator/akun');
		}
		function frmtambhaismo(){
			$this->load->view('Admin/header');
			$data['jemo']=$this->Modeladmin->getjmemo();
			$data['jhal']=$this->Modeladmin->getjenal();
			$data['user']=$this->Modeladmin->getuser();
			$data['statmemo']=$this->Modeladmin->getstatmemo();
			$data['akun']=$this->Modeladmin->getakun();
			$data['jabatan']=$this->Modeladmin->getjbtdppk();
			$data['ismo']=$this->Modeladmin->getidismo();
			$this->load->view('Admin/tambah_isimemo',$data);
			$this->load->view('Admin/footer');
		}
		function prosestambahismo(){
			$id=$this->input->post('id');
			$nmo=$this->input->post('nmo');
			$tgle=$this->input->post('tgle');
			date_default_timezone_set('Asia/Jakarta');
			$wkt=date('h:i:s');
			$mak=$this->input->post('mak');
			$akun=$this->input->post('akun');
			$hal=$this->input->post('perihal');
			$jp=$this->input->post('jhal');
			$nilai=$this->input->post('nilai');
			$jemo=$this->input->post('jmemo');
			$user=$this->input->post('user');
			$ppk=$this->input->post('dppk');
			$cttn=$this->input->post('ctt');
			$smemo=$this->input->post('smemo');
			$a=$this->Modeladmin->tambahismo($id,$nmo,$tgle,$wkt,$mak,$akun,$hal,$jp,$nilai,$jemo,$user,$ppk,$cttn,$smemo);
			//print_r($a);
			redirect('Administrator/isimemo');
		}
		function frmtambahmak(){
			$this->load->view('Admin/header');
			//$data['mak']=$this->Modeladmin->getmak();
			$this->load->view('Admin/tambah_mak');
			$this->load->view('Admin/footer');
		}
		function prosestambahmak(){
			$idm=$this->input->post('idmak');
			$um=$this->input->post('uraianmak');
			$ket=$this->input->post('keterangan');
			$this->Modeladmin->tambahmak($idm,$um,$ket);
			redirect('Administrator/mak');
		}
		function frmtambahrev(){
			$this->load->view('Admin/header');
			$this->load->view('Admin/tambah_rev');
			$this->load->view('Admin/footer');
		}
		//FUNGSI UBAH
		function frmubahjmemo(){
			$idjm=$this->uri->segment(3);
			$this->load->view('Admin/header');
			$data['gidjmemo']=$this->Modeladmin->getidjmemo();
			$data['jemo']=$this->Modeladmin->getjmemoid($idjm);
			$this->load->view('Admin/ubah_jemo',$data);
			$this->load->view('Admin/footer');
		}
		
		function prosesubahjmemo(){
			$id_jemo=$this->uri->segment(3);
			$jemo=$this->input->post('jemo');
			$ket=$this->input->post('ket');
			$this->Modeladmin->ubahjemo($id_jemo,$jemo,$ket);
			redirect('Administrator/jenismemo');
		}
		
		function frmubahsmemo(){
			$idsm=$this->uri->segment(3);
			$this->load->view('Admin/header');
			$data['statmemo']=$this->Modeladmin->getstatmemoid($idsm);
			$this->load->view('Admin/ubah_statmemo',$data);
			$this->load->view('Admin/footer');
		}
		
		function prosesubahsmemo(){
			$idsm=$this->uri->segment(3);
			$nmstat=$this->input->post('nmstat');
			$ket=$this->input->post('ket');
			$this->Modeladmin->ubahsmemo($idsm,$nmstat,$ket);
			redirect('Administrator/statusmemo');
		}
		function frmubahjabatan(){
			$idj=$this->uri->segment(3);
			$this->load->view('Admin/header');
			$data['jabatan']=$this->Modeladmin->getjabid($idj);
			$this->load->view('Admin/ubah_jabatan',$data);
			$this->load->view('Admin/footer');
		}
		function prosesubahjbt(){
			$idjb=$this->uri->segment(3);
			$nmj=$this->input->post('nmj');
			$ket=$this->input->post('ket');
			$this->Modeladmin->ubahjabatan($idjb,$nmj,$ket);
			redirect('Administrator/jabatan');
		}
		function frmubahuser(){
			$idu=$this->uri->segment(3);
			$data['usr']=$this->Modeladmin->getuserid($idu);
			$data['jabatan']=$this->Modeladmin->getjabatan();
			$this->load->view('Admin/header');
			$this->load->view('Admin/ubah_user',$data);
			$this->load->view('Admin/footer');
		}
		function prosesubahuser(){
			$idu=$this->uri->segment(3);
			$nama=$this->input->post('nama');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$ket=$this->input->post('ket');
			$idjb=$this->input->post('jabatan');
			$this->Modeladmin->ubahuser($idu,$nama,$username,$password,$ket,$idjb);
			redirect('Administrator/user');
		}
		function frmubahjenishal(){
			$idh=$this->uri->segment(3);
			$this->load->view('Admin/header');
			$data['jhal']=$this->Modeladmin->getjhid($idh);
			$this->load->view('Admin/ubah_jenishal',$data);
			$this->load->view('Admin/footer');
		}
	
		function prosesubahjenhal(){
			$idh=$this->uri->segment(3);
			$nm=$this->input->post('nmh');
			$ket=$this->input->post('ket');
			$this->Modeladmin->ubahjenhal($idh,$nm,$ket);
			redirect('Administrator/jenishal');
		}
		function frmubahismo(){
			$idi=$this->uri->segment(3);
			$this->load->view('Admin/header');
			$data['getismoid']=$this->Modeladmin->getismoid($idi);
			$data['jemo']=$this->Modeladmin->getjmemo();
			$data['jhal']=$this->Modeladmin->getjenal();
			$data['user']=$this->Modeladmin->getuser();
			$data['jabatan']=$this->Modeladmin->getjbtdppk();
			$data['statmemo']=$this->Modeladmin->getstatmemo();
			$this->load->view('Admin/ubah_isimemo',$data);
			$this->load->view('Admin/footer');
		}
		function prosesubahismo(){
			$idi=$this->uri->segment(3);
			$nmo=$this->input->post('nmo');
			$mak=$this->input->post('mak');
			$akun=$this->input->post('akun');
			$tgl=$this->input->post('tgl');
			date_default_timezone_set('Asia/Jakarta');
			$wkt=date('h:i:s');
			$perihal=$this->input->post('perihal');
			$jhal=$this->input->post('jhal');
			$nilai=$this->input->post('nilai');
			$jemo=$this->input->post('jmemo');
			$user=$this->input->post('user');
			$dppk=$this->input->post('dppk');
			$cttn=$this->input->post('catatan');
			$this->Modeladmin->ubahisimemo($idi,$nmo,$mak,$akun,$tgl,$wkt,$perihal,$jhal,$nilai,$jemo,$user,$dppk,$cttn);
			redirect('Administrator/isimemo');
		}
		function frmubahakun(){
			$ida=$this->uri->segment(3);
			$this->load->view('Admin/header');
			$data['akun']=$this->Modeladmin->getidakun($ida);
			$this->load->view('Admin/ubah_akun',$data);
			$this->load->view('Admin/footer');
		}
		function prosesubahakun(){
			$ida=$this->uri->segment(3);
			$ua=$this->input->post('uraian');
			$ket=$this->input->post('ket');
			$this->Modeladmin->ubahakun($ida,$ua,$ket);
			redirect('Administrator/akun');
		}
		function frmubahmak(){
			$idm=$this->uri->segment(3);
			$this->load->view('Admin/header');
			$data['mak']=$this->Modeladmin->getidmak($idm);
			$this->load->view('Admin/ubah_mak',$data);
			$this->load->view('Admin/footer');
		}
		function prosesubahmak(){
			$idm=$this->uri->segment(3);
			$um=$this->input->post('um');
			$ket=$this->input->post('ket');
			$this->Modeladmin->ubahmak($idm,$um,$ket);
			redirect('Administrator/mak');

		}

		//FUNGSI LOGOUT
		function logout(){
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('password');
			$this->session->unset_userdata('logged_in');
			redirect('Administrator');
		}
	}
?>