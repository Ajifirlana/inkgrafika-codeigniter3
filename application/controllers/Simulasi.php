<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulasi extends CI_Controller {
 	function __construct()
    {
        parent::__construct();
        
        $this->load->model('Cabang_model');

        $this->load->model('Persen_model');
        $this->load->library('form_validation');
    }

         

	public function index()
    {
      //12.25
      
$tgl_lahir = $this->input->post('tgl_lahir');

$email = $this->input->post('email');
$tanggal = new DateTime($tgl_lahir);
$today = new DateTime('today');
$y = $today->diff($tanggal)->y;

                $jumlah_p = str_replace('.','',$this->input->post('plafond')) ;
                  $tempo =$this->input->post('jangka_pinjam_max');
                 $jenis_pinjaman = $this->input->post('jenis_pinjaman');
                  $row = $this->Persen_model->get_persen($jenis_pinjaman);

if (empty($row)) {
 
            $this->session->set_flashdata('message', 'Jenis Pinjaman Tidak Ada');
        redirect(base_url('/'));
}else{
   if ($jenis_pinjaman == $row->jenis) {
  
function rupiah($angka)
{
  $jadi     = number_format($angka,2,',','.');
  return $jadi; 
}
                   
  $bunga_bulan      = ($row->persen/12)/100;
  $pembagi          = 1-(1/pow(1+$bunga_bulan,$tempo));
  $hasil                = $jumlah_p/($pembagi/$bunga_bulan);
               
$ang_bunga = $jumlah_p*(($row->persen/12)/100);

$ang_pokok = $hasil-$ang_bunga;

$hasil = $ang_bunga+$ang_pokok;
      $ang_bulan_rupiah = rupiah($hasil);
     
      } 
}
                
       if($jumlah_p && $tempo == null){
       redirect(base_url('/'));

       }
       if ($jumlah_p < 10000000) {

            $this->session->set_flashdata('message', 'Plafon Hanya bisa lebih Dari 10 Juta');
        redirect(base_url('/'));
       }
        $data = array(
          'jumlah_p'=>$jumlah_p,
          'hitung'=> $ang_bulan_rupiah,
          'tempo'=> $tempo,
          'hasil'=>$hasil,
            'nama_lengkap'=> $this->input->post('nama_lengkap'),
            'email'=> $email,


            'gaji_saat_ini'=> str_replace('.','',$this->input->post('gaji_saat_ini')) ,
             'jk_aktif'=> $this->input->post('jk_aktif'),
           'id_cabang' => $this->input->post('id_cabang'),
'alamat' => $this->input->post('alamat'),
           'nama_cabang' => $this->Cabang_model->get_by_id('id_cabang'),
           'tgl_lahir' => $this->input->post('tgl_lahir'),
            'umur' => $y,
           'jenis_pinjaman' => $this->input->post('jenis_pinjaman'),
           'no_hp'=> $this->input->post('no_hp'),
            'plafond'=> $this->input->post('plafond'),
            'jangka_pinjam_max'=> $this->input->post('jangka_pinjam_max'),
          
        'action' => base_url('website/home/tambahdata_cus_aktif'),
            'title' => 'Danapati Jaya Mandiri'
        );


        $this->load->view('website/simulasi/simulasi.php',$data);
    }
    
}