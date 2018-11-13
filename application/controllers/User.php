<?php 
/*
    FINDING MEMO ver.02 2018
    Sasmita Liestyasari & Rizki Adi Nugroho
    Badan Pengkajian dan Penerapan Teknologi 
    Balai Teknologi Survei Kelautan
*/
    if (!defined('BASEPATH'))exit('No direct script access allowed');

    class User extends CI_Controller {
     public function __construct() {
      parent::__construct();
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->helper('email');
      $this->load->library('session');
      $this->load->model('Modeluser');
      $this->load->library('form_validation');
    }

    /*========================================================INDEX USER================================================================*/
    //Menampilkan halaman index user
    public function index()
    {
      $this->generaluser();           
    }

    function generaluser(){
      $this->load->view('generaluser');
    }
    /*========================================================END INDEX USER============================================================*/

    function umum(){
      $data['keteranganmemo']=$this->Modeluser->keteranganmemouser();
      $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
      $this->load->view('generaluser2',$data);
    }

    /*========================================================FUNGSI LOGIN =============================================================*/
    /*Menerima Input Username dan Password untuk kemudian diproses, jika username dan password benar maka akan masuk kedalam halaman beranda,
    jika username dan password salah maka tidak akan berganti halaman sampai username dan password benar*/
    function login(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $user = $this->Modeluser->cekuser($username, $password);
      if ($user == TRUE) {
        $data = array(
          'username' => $username,
          'password' => $password,
          'logged_in' => TRUE
        );
        $x=$this->session->set_userdata($data);
        $data['jenisperihal']=$this->Modeluser->keteranganperihal();
        $data['jenismemo']=$this->Modeluser->keteranganjenismemo();
        $data['statusmemo']=$this->Modeluser->keteranganstatusmemo();
        redirect('User/beranda',$data);
      }else{
        $this->session->set_flashdata('nama', $username);
        $this->session->set_flashdata('login_message', '<br/><div class="alert alert-danger" role="alert"><strong>Oh no!&nbsp;</strong>username atau password anda tidak sesuai</div>');
        redirect('User');
      }
    }
    /*========================================================END FUNGSI LOGIN============================================================*/
    /*========================================================FUNGSI BERANDA==============================================================*/
    /*Fungsi Beranda untuk menampilkan halaman berdasarkan masing-masing user yang terlibat dalam aplikasi findingmemo*/
    function beranda(){
      if(($this->session->userdata('username'))!=''){
        $nama=$this->session->userdata('username');
        $x=$this->Modeluser->cekidpegawai($nama);
        foreach($x as $idpeg){
         $id_pegawai=$idpeg->id_user;
       }
                if($id_pegawai==2){//HALAMAN USER
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemouser();
                  $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
                  $this->load->view('User/index',$data);
                }else if($id_pegawai==3){//HALAMAN KPA
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemouser();
                  $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
                  $this->load->view('User/kpa',$data);
                }else if($id_pegawai==4){//HALAMAN PPK
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemouser();
                  $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
                  $this->load->view('User/ppk',$data);
                }else if($id_pegawai==5){//Bendahara
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemouser();
                  $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
                  $this->load->view('User/bendahara',$data);
                }else if($id_pegawai==7){//Pengadaan
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemouser();
                  $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
                  $this->load->view('User/pengadaan',$data);
                }else if($id_pegawai==8){//Penerimaan
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemouser();
                  $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
                  $this->load->view('User/penerima',$data);
                }else if($id_pegawai==6){//spm
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemouser();
                  $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
                  $this->load->view('User/spm',$data);
                }elseif($id_pegawai==12){//sekretaris TU
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemouserumum();
                  $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
                  $this->load->view('User/sekretaristu',$data);
                }elseif($id_pegawai==13){//sugiyati
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemouserprogram();
                  $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
                  $this->load->view('User/sekretarisprogsur',$data);
                }elseif($id_pegawai==14){//wahyuni & Sarpras Kerekayasaan
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemousersarpras();
                  $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
                  $this->load->view('User/sekretarissarpras',$data);
                }elseif($id_pegawai==16){//Ira (NSTP dan Pengelolaan Data)
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemouserdata();
                  $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
                  $this->load->view('User/sekretariskegiatan',$data);
                }elseif(($id_pegawai==9)||($id_pegawai==10)||($id_pegawai==11)){
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemouser();
                  $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
                  $this->load->view('User/manajemen',$data);
                }else if($id_pegawai==19){//HALAMAN SPIP
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemouser();
                  $data['keteranganaksimemo']=$this->Modeluser->keteranganaksimemo();
                  $this->load->view('User/spip',$data);
                }
              }else{
                $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
                redirect('User');
              }
            }
            /*========================================================END BERANDA=================================================================*/

            /*========================================================FUNGSI ENTRI MEMO===========================================================*/
            /*Fungsi untuk memasukkan memo baru*/
            function entrimemo(){
              if(($this->session->userdata('username'))!=''){
                $data['jenisperihal']=$this->Modeluser->keteranganperihal();
                $data['jenismemo']=$this->Modeluser->keteranganjenismemo();
                $this->load->view('User/entrimemo',$data);
              }else{
                $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
                redirect('User');
              }
            }

            function entrimemoprogsur(){
              if(($this->session->userdata('username'))!=''){
                $data['jenisperihal']=$this->Modeluser->keteranganperihal();
                $data['jenismemo']=$this->Modeluser->keteranganjenismemo();
                $this->load->view('User/entrimemoprogsur',$data);
              }else{
                $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
                redirect('User');
              }
            }

            function entrimemotu(){
              if(($this->session->userdata('username'))!=''){
                $data['jenisperihal']=$this->Modeluser->keteranganperihal();
                $data['jenismemo']=$this->Modeluser->keteranganjenismemo();
                $this->load->view('User/entrimemotu',$data);
              }else{
                $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
                redirect('User');
              }
            }

            function entrimemosarpras(){
              if(($this->session->userdata('username'))!=''){
                $data['jenisperihal']=$this->Modeluser->keteranganperihal();
                $data['jenismemo']=$this->Modeluser->keteranganjenismemo();
                $this->load->view('User/entrimemosarpras',$data);
              }else{
                $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
                redirect('User');
              }
            }

            function entrimemorevisi(){//FUNGSI ENTRI MEMO USER REVISI
              if(($this->session->userdata('username'))!=''){
                $idmemo=$this->uri->segment(3);
                $data['jenisperihalawal']=$this->Modeluser->keteranganperihal();
                $data['jenisperihal']=$this->Modeluser->keteranganperihalrevisi($idmemo);
                $data['jenismemo']=$this->Modeluser->keteranganjenismemorevisi($idmemo);
                $this->load->view("User/entrimemorevisi",$data,'refresh');
              }else{
                $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
                redirect('User');
              }
            }
            /*===================================================END FUNGSI ENTRI MEMO===================================================================*/

            /*========================================================FUNGSI SUBMIT MEMO USER============================================================*/
            /*Fungsi untuk proses memasukkan isian variabel-variabel pada saat entri memo kedalam database*/
            function submitmemouser(){//FUNGSI SUBMIT MEMO USER
              if(($this->session->userdata('username'))!=''){
                $this->form_validation->set_rules('nomormemo1','Nomor Memo 1','required');
                $this->form_validation->set_rules('indukmemo','Indukmemo','required');
                $this->form_validation->set_rules('nomormemo2','Nomor Memo 2','required');
                $this->form_validation->set_rules('nomormemo3','Nomor Memo 3','required');
                $this->form_validation->set_rules('bulanmemo','Bulan Memo','required');
                $this->form_validation->set_rules('tahunmemo','Tahun Memo','required');
                $this->form_validation->set_rules('tanggalmemo','Tanggal Memo','required');
                $this->form_validation->set_rules('perihal','Perihal','required');
                $this->form_validation->set_rules('nominal','Nominal','required');
                $this->form_validation->set_rules('jenisperihal','Jenis Perihal','required');
                $this->form_validation->set_rules('jenismemo','Jenis Memo','required');
                $this->form_validation->set_rules('mataanggaran','Mata Anggaran','required');
                if($this->form_validation->run() != false){
                  $nama=$this->session->Userdata('username');
                  $x=$this->Modeluser->cekidpegawai($nama);
                  foreach($x as $idpeg){
                    $id_pegawai=$idpeg->id_jabatan;
                  }
                  $nomormemo1=$this->input->post('nomormemo1');
                  $indukmemo=$this->input->post('indukmemo');
                  $nomormemo2=$this->input->post('nomormemo2');
                  $nomormemo3=$this->input->post('nomormemo3');
                  $bulanmemo=$this->input->post('bulanmemo');
                  $tahunmemo=$this->input->post('tahunmemo');
                  $mataanggaran=$this->input->post('mataanggaran');
                  $akun=$this->input->post('akun');
                  $nomormemo=$nomormemo1.'/'.$indukmemo.'-'.$nomormemo2.'/'.$nomormemo3.'/'.$bulanmemo.'/'.$tahunmemo;
                  $ceknomormemo=$this->Modeluser->ceknomormemo($nomormemo);
                  if($ceknomormemo==TRUE){
                   echo "<script>alert('Data Sudah Ada didalam Database');history.go(-1);</script>";die();
                 }else{ 
                  $tanggalmemo=$this->input->post('tanggalmemo');
                  $perihal=$this->input->post('perihal');
                  $nominal=$this->input->post('nominal');
                  $idjenismemo=$this->input->post('jenismemo');
                  $idjenisperihal=$this->input->post('jenisperihal');
                  date_default_timezone_set("Asia/Jakarta");
                  $waktumemo=date("h:i:s a");
                  $kondisi=$this->uri->segment(3);
                  $this->Modeluser->insertmemouser($nomormemo,$tanggalmemo,$waktumemo,$perihal,$nominal,$id_pegawai,$idjenismemo,$idjenisperihal,$kondisi,$mataanggaran,$akun);
                  $data['keteranganmemo']=$this->Modeluser->keteranganmemo($id_pegawai);
                  $keteranganmemo=$this->Modeluser->keteranganmemo($id_pegawai);
                  foreach($keteranganmemo as $ket){
                    $idmemo=$ket->id_ismo;
                    $idpelaku=$ket->id_user;
                    $tanggalentri=$ket->tanggal_entri;
                  }
                  date_default_timezone_set("Asia/Jakarta");
                  $waktumemo=date("h:i:s a");
                  $this->Modeluser->insertmemouserlogaksi($idmemo,$idpelaku,$tanggalentri,$waktumemo);
                  $data['jenisperihal']=$this->Modeluser->keteranganperihal();
                  $data['jenismemo']=$this->Modeluser->keteranganjenismemo(); 
                  redirect("User/beranda",$data);
                }  
              }else{  
                $data['jenisperihal']=$this->Modeluser->keteranganperihal();
                $data['jenismemo']=$this->Modeluser->keteranganjenismemo();
                $this->load->view("User/entrimemo",$data); 
              }    
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');
            }
          }
          /*========================================================END FUNGSI SUBMIT MEMO============================================================*/

          /*===================================================SUBMIT MEMO REVISI ===================================================================*/
          /*Fungsi untuk proses masukkan memo revisi*/
          function submitmemorevisi(){//SUBMIT MEMO REVISI
            if(($this->session->userdata('username'))!=''){
              $this->form_validation->set_rules('nomormemo','Nomor Memo','required');
              $this->form_validation->set_rules('tanggalmemo','Tanggal Memo','required');
              $this->form_validation->set_rules('perihal','Perihal','required');
              $this->form_validation->set_rules('nominal','Nominal','required');
              $this->form_validation->set_rules('jenisperihal','Jenis Perihal','required');
              $this->form_validation->set_rules('jenismemo','Jenis Memo','required');
              $this->form_validation->set_rules('mataanggaran','Mata Anggaran','required');
              if($this->form_validation->run() != false){
                $nama=$this->session->Userdata('username');
                $x=$this->Modeluser->cekidpegawai($nama);
                foreach($x as $idpeg){
                  $id_pegawai=$idpeg->id_jabatan;
                }
                $idmemo=$this->uri->segment(3);
                $tanggalmemo=$this->input->post('tanggalmemo');
                $perihal=$this->input->post('perihal');
                $nominal=$this->input->post('nominal');
                $idjenismemo=$this->input->post('jenismemo');
                $idjenisperihal=$this->input->post('jenisperihal');
                $mataanggaran=$this->input->post('mataanggaran');
                $akun=$this->input->post('akun');
                date_default_timezone_set("Asia/Jakarta");
                $waktumemo=date("h:i:s a");
                $this->Modeluser->updateisimemorevisi($idmemo,$tanggalmemo,$waktumemo,$perihal,$nominal,$id_pegawai,$idjenismemo,$idjenisperihal,$mataanggaran,$akun);
                $keteranganmemo=$this->Modeluser->keteranganmemo($id_pegawai);
                foreach($keteranganmemo as $ket){
                  $idpelaku=$ket->id_user;
                  $tanggalentri=$ket->tanggal_entri;
                }
                date_default_timezone_set("Asia/Jakarta");
                $waktumemo=date("h:i:s a");
                $this->Modeluser->insertmemouserlogaksi($idmemo,$idpelaku,$tanggalentri,$waktumemo);
                redirect("User/beranda",$data);
              }else{
                $idmemo=$this->uri->segment(3);
                $data['jenisperihalawal']=$this->Modeluser->keteranganperihal();
                $data['jenisperihal']=$this->Modeluser->keteranganperihalrevisi($idmemo);
                $data['jenismemo']=$this->Modeluser->keteranganjenismemorevisi($idmemo);
                $this->load->view("User/entrimemorevisi",$data,'refresh'); 
              }
            }else{
             $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
             redirect('User');
           }
         }
         /*========================================================END FUNGSI SUBMIT MEMO REVISI============================================================*/

         /*===================================================UPDATE STATUS MEMO KPA========================================================================*/
          function updatestatusmemokpa(){//FUNGSI UPDATE STATUS MEMO KPA
            if(($this->session->userdata('username'))!=''){
              $this->load->helper('url');
              $idmemo=$this->uri->segment(3);
              $idstatusmemo=$this->uri->segment(4);
              $catatan=$this->input->post('catatan');
              $tanggal=date('Y-m-d');
              date_default_timezone_set("Asia/Jakarta");
              $waktumemo=date("h:i:s a");
                 if($idstatusmemo==1){//Dilanjutkan
                  $this->Modeluser->updatestatusmemokpa($idstatusmemo,$idmemo,$tanggal,$waktumemo);
                  redirect('User/beranda');
                  }elseif($idstatusmemo==2){//Direvisi
                    $this->Modeluser->revisitatusmemokpa($idstatusmemo,$idmemo,$tanggal,$waktumemo);
                    $this->Modeluser->revisistatusmemokpacat($idmemo,$catatan);
                    redirect('User/beranda','refresh');
                  }elseif($idstatusmemo==3){//Ditolak
                    $this->Modeluser->revisitatusmemokpa($idstatusmemo,$idmemo,$tanggal,$waktumemo);
                    $this->Modeluser->revisistatusmemokpacat($idmemo,$catatan);
                    redirect('User/beranda');
                  }
                }else{
                  $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
                  redirect('User');     
                }
              }
              /*============================================================END UPDATE STATUS MEMO KPA===========================================================*/

              /*===================================================UPDATE STATUS MEMO PPK========================================================================*/
              function updatestatusmemoppk(){
                if(($this->session->userdata('username'))!=''){
                  $idmemo=$this->uri->segment(3);
                  $idstatusmemo=$this->uri->segment(4);
                  $catatan=$this->input->post('catatan');
                  $tanggal=date('Y-m-d');
                  $untuk=$this->input->post('kepada');
                  $kondisi=$this->uri->segment(5);
                  date_default_timezone_set("Asia/Jakarta");
                  $waktumemo=date("h:i:s a");
              if($idstatusmemo==1){//Dilanjutkan
                $this->Modeluser->updatedisposisi($idmemo,$untuk);
                $this->Modeluser->updatestatusmemoppkkondisi($idmemo,$kondisi);
                $this->Modeluser->updatestatusmemoppk($idstatusmemo,$idmemo,$tanggal,$waktumemo);
                redirect('User/beranda');
              }else if($idstatusmemo==2){//Direvisi
                $this->Modeluser->revisitatusmemoppk($idstatusmemo,$idmemo,$tanggal,$waktumemo);
                $this->Modeluser->revisistatusmemoppkcat($idmemo,$catatan);
                redirect('User/beranda');
              }elseif($idstatusmemo==3){//Ditolak
                $this->Modeluser->revisitatusmemoppk($idstatusmemo,$idmemo,$tanggal,$waktumemo);
                $this->Modeluser->revisistatusmemoppkcat($idmemo,$catatan);
                redirect('User/beranda');
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');        
            }
          }
          /*============================================================END UPDATE STATUS MEMO PPK============================================================*/

          /*===================================================UPDATE STATUS MEMO BENDAHARA===================================================================*/
          function updatestatusmemobendahara(){
            if(($this->session->userdata('username'))!=''){
              $idmemo=$this->uri->segment(3);
              $idstatusmemo=$this->uri->segment(4);
              $kondisi=$this->uri->segment(5);
              $tanggal=date('Y-m-d');
              date_default_timezone_set("Asia/Jakarta");
              $waktumemo=date("h:i:s a");
              if($idstatusmemo==1){//Verifikasi
                $this->Modeluser->revisitatusmemobendahara($idstatusmemo,$idmemo,$tanggal,$waktumemo);
                $this->Modeluser->revisistatusmemobendaharacat($idmemo,$kondisi);
                redirect('User/beranda');
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');        
            }
          }
          /*============================================================END UPDATE STATUS MEMO BENDAHARA===========================================================*/

          /*===================================================UPDATE STATUS MEMO BENDAHARA AKHIR==================================================================*/
          function updatestatusmemobendaharaakhir(){
            if(($this->session->userdata('username'))!=''){
              $idmemo=$this->uri->segment(3);
              $idstatusmemo=$this->uri->segment(4);
              $kondisi=$this->uri->segment(5);
              $tanggal=date('Y-m-d');
              date_default_timezone_set("Asia/Jakarta");
              $waktumemo=date("h:i:s a");
              if($idstatusmemo==1){//Verifikasi
                $this->Modeluser->revisitatusmemobendahara($idstatusmemo,$idmemo,$tanggal,$waktumemo);
                $this->Modeluser->revisistatusmemobendaharacat($idmemo,$kondisi);
                redirect('User/beranda');
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');        
            }
          }
          /*============================================================END UPDATE STATUS MEMO BENDAHARAAKHIR=========================================================*/

          /*============================================================END UPDATE STATUS MEMO PENGADAAN=============================================================*/
          function updatestatusmemopengadaan(){
            if(($this->session->userdata('username'))!=''){
              $idmemo=$this->uri->segment(3);
              $idstatusmemo=$this->uri->segment(4);
              $catatan=$this->input->post('catatan');
              $tanggal=date('Y-m-d');
              date_default_timezone_set("Asia/Jakarta");
              $waktumemo=date("h:i:s a");
              if($idstatusmemo==1){//Dilanjutkan
                $this->Modeluser->updatestatusmemopengadaan($idstatusmemo,$idmemo,$tanggal,$waktumemo);
                redirect('User/beranda');
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');        
            }
          }
          /*============================================================END UPDATE STATUS MEMO PENGADAAN=============================================================*/

          /*================================================================ UPDATE STATUS MEMO PENERIMA=============================================================*/
          function updatestatusmemopenerima(){
            if(($this->session->userdata('username'))!=''){
              $idmemo=$this->uri->segment(3);
              $idstatusmemo=$this->uri->segment(4);
              $catatan=$this->input->post('catatan');
              $tanggal=date('Y-m-d');
              date_default_timezone_set("Asia/Jakarta");
              $waktumemo=date("h:i:s a");
              if($idstatusmemo==1){//Dilanjutkan
                $this->Modeluser->updatestatusmemopenerimaan($idstatusmemo,$idmemo,$tanggal,$waktumemo);
                redirect('User/beranda');
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');        
            }
          }
          /*============================================================END UPDATE STATUS MEMO PENERIMA===================================================================*/
          
          /*================================================================ UPDATE STATUS MEMO PENERIMA AKHIR=============================================================*/
          function updatestatusmemospmakhir(){
            if(($this->session->userdata('username'))!=''){
              $idmemo=$this->uri->segment(3);
              $idstatusmemo=$this->uri->segment(4);
              $statusterakhir=99;
              $catatan='';
              $tanggal=date('Y-m-d');
              date_default_timezone_set("Asia/Jakarta");
              $waktumemo=date("h:i:s a");
              if($idstatusmemo==1){//Dilanjutkan
                $this->Modeluser->updatestatusmemospm($idstatusmemo,$idmemo,$tanggal,$waktumemo,$catatan);
                $this->Modeluser->kosongcatatanakhir($idmemo,$catatan,$statusterakhir);
                redirect('User/beranda');
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');        
            }
          }
          /*============================================================END UPDATE STATUS MEMO PENERIMA AKHIR===============================================================*/

          /*================================================================ UPDATE STATUS MEMO SPM TENGAH==================================================================*/
          function updatestatusmemospmtengah(){
            if(($this->session->userdata('username'))!=''){
              $idmemo=$this->uri->segment(3);
              $idstatusmemo=$this->uri->segment(4);
              $statusterakhir=97;
              $catatan='';
              $tanggal=date('Y-m-d');
              date_default_timezone_set("Asia/Jakarta");
              $waktumemo=date("h:i:s a");
              if($idstatusmemo==1){//Dilanjutkan
                $this->Modeluser->updatestatusmemospm($idstatusmemo,$idmemo,$tanggal,$waktumemo,$catatan);
                $this->Modeluser->kosongcatatanakhir($idmemo,$catatan,$statusterakhir);
                redirect('User/beranda');
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');        
            }
          }
          /*============================================================END UPDATE STATUS MEMO SPM TENGAH===============================================================*/

          /*==============================================================FUNGSI ALUR MEMO===============================================================================*/
          function alurmemo(){//Alur Memo untuk semuanya
            if(($this->session->userdata('username'))!=''){
              $this->load->view('User/alurmemo.php');
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');   
            }
          }

          function alurmemotu(){//Alur Memo untuk tata usaha
            if(($this->session->userdata('username'))!=''){
              $this->load->view('User/alurmemotu.php');
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');   
            }
          }

          function alurmemosarpras(){//Alur Memo untuk sarpras
            if(($this->session->userdata('username'))!=''){
              $this->load->view('User/alurmemosarpras.php');
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');   
            }
          }

          function alurmemoprogsur(){//Alur Memo untuk progsur
            if(($this->session->userdata('username'))!=''){
              $this->load->view('User/alurmemoprogsur.php');
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');   
            }
          }
          /*============================================================END FUNGSI ALUR MEMO=============================================================================*/

          /*========================================================FUNGSI LOGOUT========================================================================================*/
          function logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('password');
            $this->session->unset_userdata('logged_in');
            redirect('User');
          }
          /*========================================================END FUNGSI LOGOUT====================================================================================*/

          /*========================================================REVISI NOMINAL BENDAHARA=============================================================================*/
          function revisinominalbendahara(){
            if(($this->session->userdata('username'))!=''){
              $id=$this->uri->segment(3);
              $nominal=$this->input->post("nominal");
              $x=str_replace(".","",$nominal);
              if(empty($nominal)){
                redirect('User/beranda');    
              }else{
                //$this->Modeluser->revisinominalbendahara($id,$nominal);
                //redirect('User/beranda');
                if($x>50000000){
                  echo "<script>alert('Ini adalah memo dengan nominal maksimal 50 juta. Masukkan nominal dibawah 50 juta');history.go(-1);</script>";die();
                }else{
                  $this->Modeluser->revisinominalbendahara($id,$nominal);
                  redirect('User/beranda');
                }
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');   
            }
          }

          function revisinominalbendahara200juta(){
            if(($this->session->userdata('username'))!=''){
              $id=$this->uri->segment(3);
              $nominal=$this->input->post("nominal");
              $x=str_replace(".","",$nominal);
              if(empty($nominal)){
                redirect('User/beranda');    
              }else{
                if($x<=200000000){
                  echo "<script>alert('Ini adalah memo dengan nominal diatas 200 juta jangan masukkan dibawah 50 juta');history.go(-1);</script>";die();
                }else{
                  $this->Modeluser->revisinominalpengadaan($id,$nominal);
                  redirect('User/beranda');
                }
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');   
            }
          }
          /*========================================================END REVISI NOMINAL BENDAHARA==========================================================================*/

          /*========================================================REVISI NOMINAL PENGADAAN 50 juta======================================================================*/
          function revisinominalpengadaan50jt(){
            if(($this->session->userdata('username'))!=''){
              $id=$this->uri->segment(3);
              $nominal=$this->input->post("nominal");
              $x=str_replace(".","",$nominal);
              if(empty($nominal)){
                redirect('User/beranda');    
              }else{
                if($x>50000000){
                  echo "<script>alert('Ini adalah memo dengan nominal maksimal 50 juta. Masukkan nominal dibawah 50 juta');history.go(-1);</script>";die();
                }else{
                  $this->Modeluser->revisinominalpengadaan($id,$nominal);
                  redirect('User/beranda');
                }
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');   
            }
          }
          /*========================================================REVISI NOMINAL PENGADAAN 50 juta=======================================================================*/

          /*========================================================END REVISI NOMINAL PENGADAAN ANTARA====================================================================*/
          function revisinominalpengadaanantara(){
            if(($this->session->userdata('username'))!=''){
              $id=$this->uri->segment(3);
              $nominal=$this->input->post("nominal");
              //echo $nominal;die();
              $x=str_replace(".","",$nominal);
              if(empty($nominal)){
                redirect('User/beranda');    
              }else{
                if(($x<50000000)||($x>=200000000)){
                  echo "<script>alert('Ini adalah memo dengan nominal diatas 50 juta dan kurang dari 200 juta. Masukkan nominal yang sesuai');history.go(-1);</script>";die();
                }else{
                  $this->Modeluser->revisinominalpengadaan($id,$nominal);
                  redirect('User/beranda');
                }
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');   
            }
          }
          /*========================================================REVISI NOMINAL PENGADAAN ANTARA=========================================================================*/

          /*========================================================REVISI NOMINAL PENERIMA 50 juta=========================================================================*/
          function revisinominalpenerima50jt(){
            if(($this->session->userdata('username'))!=''){
              $id=$this->uri->segment(3);
              $nominal=$this->input->post("nominal");
              $x=str_replace(".","",$nominal);
              if(empty($nominal)){
                redirect('User/beranda');    
              }else{
                if($x>50000000){
                  echo "<script>alert('Ini adalah memo dengan nominal maksimal 50 juta. Masukkan nominal dibawah 50 juta');history.go(-1);</script>";die();
                }else{
                  $this->Modeluser->revisinominalpengadaan($id,$nominal);
                  redirect('User/beranda');
                }
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');   
            }
          }
          /*========================================================END REVISI NOMINAL PENGADAAN 50 juta====================================================================*/

          /*========================================================REVISI NOMINAL PENERIMA ANTARA==========================================================================*/
          function revisinominalpenerimaantara(){
            if(($this->session->userdata('username'))!=''){
              $id=$this->uri->segment(3);
              $nominal=$this->input->post("nominal");
              $x=str_replace(".","",$nominal);
              if(empty($nominal)){
                redirect('User/beranda');    
              }else{
                if(($x<50000000)||($x>=200000000)){
                  echo "<script>alert('Ini adalah memo dengan nominal diatas 50 juta dan kurang dari 200 juta. Masukkan nominal yang sesuai');history.go(-1);</script>";die();
                }else{
                  $this->Modeluser->revisinominalpengadaan($id,$nominal);
                  redirect('User/beranda');
                }
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');   
            }
          }
          /*========================================================END REVISI NOMINAL PENERIMA ANTARA========================================================================*/

          /*========================================================REVISI NOMINAL REVISI BERKAS SPM==========================================================================*/
          function revisiberkasspm(){
            if(($this->session->userdata('username'))!=''){
              $id=$this->uri->segment(3);
              $catatan=$this->input->post("catatan");
              if(empty($catatan)){
                redirect('User/beranda');    
              }else{
                $this->Modeluser->revisiberkasspm($id,$catatan);
                redirect('User/beranda');
              }
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');   
            }
          }
          /*========================================================END REVISI NOMINAL BERKAS SPM================================================================================*/   

          /*==============================================REKAP MEMO ============================================================================================================*/
          function rekapmemo(){
            if(($this->session->userdata('username'))!=''){
              $data['rekap']=$this->Modeluser->tampilrekap();  
            //print_r($data['rekap']);die();
              $this->load->view('User/rekapmemo',$data);
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');
            }
          }

          function rekapmemospesifik(){
            if(($this->session->userdata('username'))!=''){
              $keyword=$this->uri->segment(3);
              $data['rekap']=$this->Modeluser->tampilrekapspesifik($keyword); 
              $this->load->view('User/rekapmemospesifik',$data);
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');
            }
          }

          function rekapmemospip(){
            if(($this->session->userdata('username'))!=''){
              $keyword=$this->uri->segment(3);
              $data['rekap']=$this->Modeluser->tampilrekapspesifik($keyword); 
              $this->load->view('User/rekapmemospesifik',$data);
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');
            }
          }

          function rekapmemodobeldata(){
            if(($this->session->userdata('username'))!=''){
              $keyword1=$this->uri->segment(3);
              $keyword2=$this->uri->segment(4);
              $data['rekap']=$this->Modeluser->tampilrekapspesifikdobel($keyword1,$keyword2); 
              $this->load->view('User/rekapmemospesifik',$data);
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');
            }
          } 
          /*====================================================END REKAP MEMO =====================================================================================================*/
          /*=====================================================EXPORT EXCELL =====================================================================================================*/
          function exportexcel(){
            if(($this->session->userdata('username'))!=''){
              $data['rekap']=$this->Modeluser->tampilrekap();
              $this->load->view('User/rekapmemoexcell',$data);
            }else{
              $this->session->set_flashdata('login_message', '<div class="error"><font color=red>Maaf Anda Harus Login Terlebih Dahulu</font></div>');
              redirect('User');   
            }
          }
          /*=================================================== END EXPORT EXCELL ===================================================================================================*/      
        }
        ?>