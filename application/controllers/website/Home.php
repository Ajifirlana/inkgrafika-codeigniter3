<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Home extends CI_Controller {
	function __construct()
    {
        parent::__construct();

                require APPPATH.'libraries/phpmailer/src/Exception.php';
                require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
                require APPPATH.'libraries/phpmailer/src/SMTP.php';
                        $this->load->model('Home_model');
        $this->load->library('form_validation');
    }
	public function tambahdata_cus_aktif()
	{
		$nama_lengkap = htmlspecialchars($this->input->post('nama_lengkap'));

		$id_cabang = htmlspecialchars($this->input->post('id_cabang'));

		$jk_aktif = htmlspecialchars($this->input->post('jk_aktif'));
		$alamat = htmlspecialchars($this->input->post('alamat'));
		$jenis_pinjaman =htmlspecialchars($this->input->post('jenis_pinjaman'));
		$keterangan =  htmlspecialchars($this->input->post('keterangan'));
		$no_hp = htmlspecialchars($this->input->post('no_hp'));
		$tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir'));
        $email =  htmlspecialchars($this->input->post('email'));
		$gaji_saat_ini = htmlspecialchars($this->input->post('gaji_saat_ini'));
		$jangka_pinjam_max = $this->input->post('jangka_pinjam_max');
        if($email == null){
                 redirect(base_url('/id/'));
        }
		$data  = array('nama_lengkap' =>$nama_lengkap,'id_cabang' =>$id_cabang,'jk_aktif' =>$jk_aktif,'alamat' =>$alamat ,'jenis_pinjaman' =>$jenis_pinjaman ,'keterangan' =>$keterangan ,
		'no_hp' =>$no_hp,'tgl_lahir' =>$tgl_lahir,'gaji_saat_ini' =>$gaji_saat_ini,'jangka_pinjam_max' =>$jangka_pinjam_max, );
		
		// PHPMailer object
                     $response = false;
                     $mail = new PHPMailer();
                   
             // $mail->isSMTP();
            //         $mail->Host     = 'gaweit.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
            //         $mail->SMTPAuth = true;
            //         $mail->Username = 'danapati@project.gaweit.com'; // user email
            //         $mail->Password = 'danapati1234'; // password email
            //         $mail->SMTPSecure = 'ssl';
            //         $mail->Port     = 465;
// $mail->setFrom('danapati@project.gaweit.com', ''); 
//                     $mail->addReplyTo('danapati@project.gaweit.com', '');
                    // SMTP configuration
                    $mail->isSMTP();
                    $mail->Host     = 'kreditpnsdanpensiun.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
                    $mail->SMTPAuth = true;
                    $mail->Username = 'mail@kreditpnsdanpensiun.com'; // user email
                    $mail->Password = '*#12345abcDE#*'; // password email
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port     = 465;

                    $mail->Timeout = 60; // timeout pengiriman (dalam detik)
                    $mail->SMTPKeepAlive = true; 
            
                    $mail->setFrom('mail@kreditpnsdanpensiun.com', ''); // user email
                    $mail->addReplyTo('mail@kreditpnsdanpensiun.com', ''); //user email
            
                    // Add a recipient
                    $mail->addAddress($email); //email tujuan pengiriman email
            
                    // Email subject
                    $mail->Subject = 'PT.DANAPATI JAYA MANDIRI'; //subject email
            
                    // Set email format to HTML
                    $mail->isHTML(true);
            
                    // Email body content
                    $mailContent = "
                    <h1>Terimakasih Sudah Melakukan Simulasi Kredit</h1>
                    <h3>Anda akan segera di hubungi oleh Petugas kami 
                    <h4>Berikut Ini Simulasi Yang Anda Ajukan</h4>" 
                    // isi email
                    .$nama_lengkap
                    .$no_hp 
                    .$alamat 
                    .$gaji_saat_ini 
                    .$jangka_pinjam_max 
                    .$jenis_pinjaman ; 
                    // isi email
                    $mail->Body = $mailContent;
            
                    // Send email
                    if(!$mail->send()){
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    }else{
                        echo 'Silahkan Cek Email Anda';
                     
                    }
		      $this->Home_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');

            redirect(base_url('/id/'));

	}
	
}
