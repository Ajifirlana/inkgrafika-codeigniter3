<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_kerja extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_kerja_model');
    $this->load->model('Karyawan_model');

        $this->load->model('Kantor_bank_model');

        $this->load->model('User_model');
        $this->load->model('Bank_model');
        $this->load->model('Cabang_model');
        
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $id_karyawan = $this->session->userdata('id_karyawan');
        $laporan_kerja = $this->Laporan_kerja_model->listing($id_user,$id_karyawan);

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan_kerja/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan_kerja/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan_kerja/index.html';
            $config['first_url'] = base_url() . 'laporan_kerja/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Laporan_kerja_model->total_rows($q);
       
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'laporan_kerja_data' => $laporan_kerja,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

            'title'      =>'Data Laporan Kerja',
            'isi'        =>'admin/laporan_kerja/laporan_kerja_list');
           $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    

                //Undduh File Laporan
    public function file_laporan($id_laporan_kerja){
        $file_laporan = $this->Laporan_kerja_model->detail($id_laporan_kerja);
        //Proses download
        $folder     = './file/laporan/';
        $file       = $file_laporan->file_laporan;
        force_download($folder.$file, NULL);
        }

    public function read($id) 
    {   
        $row = $this->Laporan_kerja_model->get_by_id($id);
        $getid = $this->Kantor_bank_model->join($row->alamat_instansi_d);
        $carinamaspv = $this->User_model->carinamaspv($row->nama_spv);
         $getidbank =  $this->Bank_model->get_by_id($row->bank);
if($getidbank== null){
$getidbank = 'kode tidak ada';
}else{
   $getidbank = $getidbank->nama_bank;
}
       
        if ($row) {
            $data = array(
        'id_laporan_kerja' => $row->id_laporan_kerja,
        'id_user' => $row->id_user,
        'id_karyawan' => $row->id_karyawan,
        'tanggal_lapor' => $row->tanggal_lapor,
        'file_laporan' => $row->file_laporan,
        'nama_cus' => $row->nama_cus,
        'no_ktp' => $row->no_ktp,
        'nip' => $row->nip,
        'no_rekening' => $row->no_rekening,
         'no_ld'=> $row->no_ld, 
         'alamat' => $row->alamat,
        'no_hp_debitur' => $row->no_hp_debitur,
         'plafon' => $row->plafon,
         'baki_debet_lama' => $row->baki_debet_lama,

         'ket' => $row->ket,
         'j_kredit' => $row->j_kredit,

         'alamat_instansi_d' =>  $getid->cabang_kantor ,
         'j_topup' => $row->j_topup,
         'j_pinjaman' => $row->j_pinjaman,

         'nett_disburse' => $row->nett_disburse,
         'nama_ao' => $row->nama_ao,
        'nama_spv' =>  $carinamaspv->nama,
        'nama_bank_pelunasan' => $row->nama_bank_pelunasan,
 'bank' => $getidbank,

        'tanggal_take_over' => $row->tanggal_take_over,

         'tanggal_realisasi' => $row->tanggal_realisasi,
                'status_laporan' => $row->status_laporan,
    'fee' => $row->fee,
'pajak' => $row->pajak,
'finalty' => $row->finalty,
'nett' => $row->nett,

        'title'      =>'Detail Laporan Kerja',
        'isi'        =>'admin/laporan_kerja/laporan_kerja_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/laporan_kerja'));
        }
    }

    public function create() 
    {
        $id_karyawan = $this->session->userdata('id_karyawan');
        $id_user     = $this->session->userdata('id_user');
        $data = array(
            'button' => 'Simpan',
            'kantorbank'=>$this->Kantor_bank_model->getall(),
            'action' => base_url('admin/laporan_kerja/create_action'),
        'id_laporan_kerja' => set_value('id_laporan_kerja'),
        'id_user' => set_value('id_user'),
        'id_karyawan' => set_value('id_karyawan'),
        'tanggal_lapor' => set_value('tanggal_lapor'),
        'file_laporan' =>set_value('file_laporan'),
        'nama_cus' => set_value('nama_cus'),
        'no_ktp'=> set_value('no_ktp'),
        'nip'=> set_value('nip'),
        'no_rekening'=> set_value('no_rekening'),

        'no_ld'=> set_value('no_ld'),
        'alamat'=> set_value('alamat'),
       'no_hp_debitur'=> set_value('no_hp_debitur'),
       'nama_pasangan'=> set_value('nama_pasangan'),
       'no_hp_pasangan'=> set_value('no_hp_pasangan'),
       'nama_ibu'=> set_value('nama_ibu'),
        'plafon'=>set_value('plafon'),
       'nama_instansi'=> set_value('nama_instansi'),
       'alamat_instansi_d'=> set_value('alamat_instansi_d'),
       'baki_debet_lama'=> set_value('baki_debet_lama'),
       'nett_disburse'=> set_value('nett_disburse'),
       'nama_ao'=> set_value('nama_ao'),
       'nama_spv'=> set_value('nama_spv'),

          'datakaryawan' => $this->Karyawan_model->listing(),  
       'nama_bank_pelunasan'=> set_value('nama_bank_pelunasan'),

       'bank'=> set_value('bank'),
        'databank' =>  $this->Bank_model->getall(),  
       'tanggal_take_over'=> set_value('tanggal_take_over'), 
    'j_topup'=>set_value('j_topup'), 
    'j_pinjaman'=>set_value('j_pinjaman'), 
    'j_kredit'=>set_value('j_kredit'),
    'ket'=>set_value('ket'),
        'status_laporan' => set_value('status_laporan'),
 'tanggal_realisasi' => set_value('tanggal_realisasi'),

       'title'            =>'Tambah Data Laporan Kerja',
        'id_karyawan'     => $id_karyawan,
        'user'            => $id_user,
       'isi'              =>'admin/laporan_kerja/laporan_kerja_form');

       $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    
    public function create_action() 
    {
        $date = date('Y-m-d');
        $hitung = str_replace('.','',$this->input->post('nett_disburse'));
    //   echo $hitung;
    //   exit;
       $postnettdsb = str_replace('.','',$this->input->post('nett_disburse'));
       
      $j_topup = $this->input->post('j_topup');
    $j_pinjaman = $this->input->post('j_pinjaman');
      $j_kredit = $this->input->post('j_kredit');
   
        $file_laporan = basename($_FILES['file_laporan']['name']);        
                 
        if($j_pinjaman == "PENSIUN" && $j_topup == "Top Up" ){

                    $hitung = ($hitung * 1.9/100);
                    $hitung_pajak = ($hitung * 2/100);
                    $hitung_finalty = ($postnettdsb * 0.36/100);
                    $hitung_nett = $hitung - $hitung_pajak;

        }
        if($j_pinjaman == "PENSIUN" && $j_topup == "New" ){

                    $hitung = ($hitung * 3.8/100);
                    $hitung_pajak = ($hitung * 2/100);
                    $hitung_finalty = ($postnettdsb * 0.36/100);
                    $hitung_nett = $hitung - $hitung_pajak;
                            
                    }
        elseif($j_pinjaman == "PRAPENSIUN" && $j_kredit == "Konsumtif"){
       
        $hitung = ($hitung * 2.45/100);
        $hitung_pajak = ($hitung * 2/100);
        $hitung_finalty = ($postnettdsb * 0.36/100);
        $hitung_nett = $hitung - $hitung_pajak;
       
        }elseif ($j_pinjaman == "KUR") {
   $plafon = str_replace('.','',$this->input->post('plafon'));

            $jumlah = $this->Laporan_kerja_model->hitungdata();
                      $hitung = ($hitung * 3.82/100);
             $hitung_pajak = ($hitung * 2/100);
            $e51 =  (10500000000 - $jumlah->plafon) * 0.36/100 ;
           $hitung_finalty = ($plafon  /$jumlah->plafon)* $e51 ;

           $hitung_nett = $hitung - $hitung_pajak;
       
        }elseif($j_pinjaman == "KPR PAYROL"){

             $hitung = ($hitung * 1.2/100);
             $hitung_pajak = ($hitung * 2/100);

        $hitung_finalty = ($postnettdsb * 0.36/100);
           $hitung_nett = $hitung - $hitung_pajak;
        
        }
        elseif($j_pinjaman == "PNS AKTIF"){

        if($j_kredit == "Konsumtif"){

        $hitung = ($hitung * 2.45/100);
         $hitung_pajak = ($hitung * 2/100);
        $hitung_finalty = ($postnettdsb * 0.36/100);
        $hitung_nett = $hitung - $hitung_pajak;  
        
        }elseif($j_kredit == "Produktif"){
        
        $hitung = ($hitung * 1.90/100);
         $hitung_pajak = ($hitung * 2/100);
        $hitung_finalty = ($postnettdsb * 0.36/100);

       $hitung_nett = $hitung - $hitung_pajak; 
       // $hitung_nett = $hitung - $hitung_pajak -  $hitung_finalty;   


    }

        }
        

           $nama_cus= $this->input->post('nama_cus',TRUE);
        $no_rekening = $this->input->post('no_rekening',TRUE);
            
    //   $cek = $this->Laporan_kerja_model->cek_rekening($no_rekening);
      
    //     if($cek > 0 ){

    //         $this->session->set_flashdata('sukses', 'Data Sudah Ada');
    //         redirect(base_url('admin/laporan_kerja'));
    //     }

         $file_laporan_null = 'no_file.jpg';
        if($j_topup == "New"){
         $tanggal_take_over = null;   
        }else{
            $tanggal_take_over = $this->input->post('tanggal_take_over'); 
        }
        if($file_laporan == ''){

       
        $data = array(
        'id_user' => $this->input->post('id_user',TRUE),
        'id_karyawan' => $this->input->post('id_karyawan',TRUE),
        'tanggal_lapor' => $date,
        'file_laporan' => $file_laporan_null,
        'nama_cus' => $this->input->post('nama_cus',TRUE),
        'no_ktp' => $this->input->post('no_ktp',TRUE),
        'nip' => $this->input->post('nip',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'no_hp_debitur' => $this->input->post('no_hp_debitur',TRUE),
        'no_hp_pasangan' => $this->input->post('no_hp_pasangan',TRUE),
        'no_rekening' => $no_rekening,
         'no_ld' => $this->input->post('no_ld',TRUE),
        'nama_ibu' => $this->input->post('nama_ibu',TRUE),
        'nama_pasangan' => $this->input->post('nama_pasangan',TRUE),
        'no_hp_pasangan' => $this->input->post('no_hp_pasangan',TRUE),
'baki_debet_lama'=> str_replace('.','',$this->input->post('baki_debet_lama')),

 'nett_disburse'=> str_replace('.','',$this->input->post('nett_disburse')),
'fee'=> number_format($hitung),
'pajak'=> number_format($hitung_pajak),
       'finalty'=> number_format($hitung_finalty),
       'nett'=> number_format($hitung_nett),

'nama_instansi'=> $this->input->post('nama_instansi'),
       'alamat_instansi_d'=> $this->input->post('alamat_instansi_d'),
       'j_topup'=> $j_topup,
       'j_pinjaman'=> strtoupper($j_pinjaman),
        'j_kredit' => $j_kredit,
        'plafon' => str_replace('.','',$this->input->post('plafon')),
        'nama_ao' => $this->input->post('nama_ao'),
         'nama_spv' => $this->session->userdata('id_karyawan'),
         'nama_bank_pelunasan' => $this->input->post('nama_bank_pelunasan'),
         'bank' => $this->input->post('bank'),
        'tanggal_take_over' => $tanggal_take_over, 
        'tanggal_realisasi' => $this->input->post('tanggal_realisasi'),
        'status_laporan' => $this->input->post('status_laporan',TRUE),
        );

        }else { 

        $data = array(
                'id_user' => $this->input->post('id_user',TRUE),
                'id_karyawan' => $this->input->post('id_karyawan',TRUE),
                'tanggal_lapor' => $date,
                'file_laporan' =>  upload_gambar_biasa('file_laporan','file/laporan','pdf',10000,'file_laporan'),
                        'nama_cus' => $this->input->post('nama_cus',TRUE),
                'no_ktp' => $this->input->post('no_ktp',TRUE),
                'nip' => $this->input->post('nip',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'no_hp_debitur' => $this->input->post('no_hp_debitur',TRUE),
                'no_hp_pasangan' => $this->input->post('no_hp_pasangan',TRUE),
                'no_rekening' => $no_rekening,
               'no_ld' => $this->input->post('no_ld',TRUE),
                 'nama_ibu' => $this->input->post('nama_ibu',TRUE),
                'nama_pasangan' => $this->input->post('nama_pasangan',TRUE),
                'no_hp_pasangan' => $this->input->post('no_hp_pasangan',TRUE),
        'baki_debet_lama'=> str_replace('.','',$this->input->post('baki_debet_lama')),
 'nett_disburse'=> $this->input->post('nett_disburse'),
'fee'=> number_format($hitung),
'pajak'=> number_format($hitung_pajak),
       'finalty'=> number_format($hitung_finalty),
       'nett'=> number_format($hitung_nett),
       
               'nama_instansi'=> $this->input->post('nama_instansi'),
               'alamat_instansi_d'=> $this->input->post('alamat_instansi_d'),
               'j_topup'=> $this->input->post('j_topup'),
               'j_pinjaman'=> $j_pinjaman,
                'plafon' => $this->input->post('plafon'),
                'nama_ao' => $this->input->post('nama_ao'),
                'nama_spv' => $this->session->userdata('id_karyawan'),
                 'nama_bank_pelunasan' => $this->input->post('nama_bank_pelunasan'),
                 'bank' => $this->input->post('bank'),
                'tanggal_take_over' => $this->input->post('tanggal_take_over'),
                 'tanggal_realisasi' => $this->input->post('tanggal_realisasi'),
                'status_laporan' => $this->input->post('status_laporan',TRUE),
                );   
                // var_dump($data);
                // exit;
}
            $this->Laporan_kerja_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/laporan_kerja'));

    }

    
    public function update($id) 
    {
        $row         = $this->Laporan_kerja_model->get_by_id($id);
        $id_karyawan = $this->session->userdata('id_karyawan');
        $id_user     = $this->session->userdata('id_user');

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/laporan_kerja/update_action'),
        'id_laporan_kerja' => set_value('id_laporan_kerja', $row->id_laporan_kerja),
        'id_user' => set_value('id_user', $row->id_user),
        'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
        'kantorbank'=>$this->Kantor_bank_model->getall(),
        'tanggal_lapor' => set_value('tanggal_lapor', $row->tanggal_lapor),
        'file_laporan' => set_value('file_laporan', $row->file_laporan),
        'nama_cus' => set_value('nama_cus', $row->nama_cus),
        'no_rekening' => set_value('nama_cus', $row->no_rekening),
          'no_ld' => set_value('nama_cus', $row->no_ld),
        'no_ktp' => set_value('nama_cus', $row->no_ktp),
    'nip' => set_value('nama_cus', $row->nip),
    'alamat_instansi_d' => set_value('alamat_instansi_d', $row->alamat_instansi_d),
    'j_topup'=>set_value('j_topup', $row->j_topup),
    'j_pinjaman'=>set_value('j_pinjaman', $row->j_pinjaman),
    'j_kredit'=>set_value('j_kredit', $row->j_kredit),
    'alamat' => set_value('alamat', $row->alamat),
    'no_hp_debitur' => set_value('no_hp_debitur', $row->no_hp_debitur),
    'nama_pasangan' => set_value('nama_pasangan', $row->nama_pasangan),
    'no_hp_pasangan' => set_value('no_hp_pasangan', $row->no_hp_pasangan),
    'nama_ibu' => set_value('nama_ibu', $row->nama_ibu),
    'nama_instansi' => set_value('nama_instansi', $row->nama_instansi),
    'tanggal_realisasi' => set_value('tanggal_realisasi', $row->tanggal_realisasi),
    'plafon' => set_value('plafon', $row->plafon), 
    'baki_debet_lama' => set_value('baki_debet_lama', $row->baki_debet_lama),
'nett_disburse' => set_value('nett_disburse', $row->nett_disburse),
'nama_ibu' => set_value('nama_ibu', $row->nama_ibu),
'nama_instansi' => set_value('nama_instansi', $row->nama_instansi),

    'ket' => set_value('ket', $row->ket),
    'j_kredit' => set_value('j_kredit', $row->j_kredit),
        'nama_ao' => set_value('nama_ao', $row->nama_ao),
        'nama_spv' => set_value('nama_spv', $row->nama_spv),  
        'nama_bank_pelunasan' => set_value('nama_ao', $row->nama_bank_pelunasan),  
         'bank' => set_value('bank', $row->bank),
          'databank' =>  $this->Bank_model->getall(),
          'datakaryawan' => $this->Karyawan_model->listing(),  
     'tanggal_take_over' => set_value('nama_ao', $row->tanggal_take_over),     'status_laporan' => set_value('status_laporan', $row->status_laporan),

        'title'                  =>'Edit Data Laporan Kerja',
        'id_karyawan'            => $id_karyawan,
        'user'                   => $id_user,
        'isi'                    =>'admin/laporan_kerja/laporan_kerja_form');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/laporan_kerja'));
        }
    }

    function import()
    {
          $data = array( 'title'      =>'Inject Data KUR',
            'isi'        =>'admin/injectkur/injectkur');
         $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    function inject_kur(){
         $today = date('Y-m-d');

         error_reporting(0);
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
            //redirect halaman
            redirect('laporan_kerja');
        }else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();

            $numrow = 1;
           
            foreach($sheet as $row){
                            if($numrow > 1){
                                array_push($data, array(
                                  
                                    'id_user'      => '38',
                                  
                                    'nama_cus'      => $row['B'],
                                    'no_rekening'      => $row['C'],
                                    'no_ld'      => $row['D'],
                                    'plafon'      => str_replace(',', '',$row['E']),
                                     'tanggal_realisasi'      => date("Y-m-d", strtotime($row['F'])),
                                 'j_pinjaman'      => 'KUR',
                                    // 'kabupaten'      => $row['H'], 
                                    'j_topup'      => 'NEW',
                                    // 'desa'      => $row['J'],
                                    // 'provinsi1'      => $row['K'],
                                    // 'kabupaten1'      => $row['L'],
                                    // 'kecamatan1'      => $row['M'],
                                    // 'desa1'      => $row['N'],
                                    // 'bidang_usaha'      => $row['O'],
                                    // 'nib'      => $row['P'],
                                    // 'telepon_seluler'      => $row['Q'],
                                    //     'tgl_lapor'   => $today,
                                    


                                ));
                    }
                $numrow++;
            }

         $this->db->insert_batch('laporan_kerja', $data);

            unlink(realpath('excel/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('admin/laporan_kerja/import');
        }

    }
    public function update_action() 
    {
       
        $date = date('Y-m-d');
        $hitung = str_replace('.','',$this->input->post('nett_disburse'));
 
       $postnettdsb = str_replace('.','',$this->input->post('nett_disburse'));
       
      $j_topup = $this->input->post('j_topup');
    $j_pinjaman = $this->input->post('j_pinjaman');
      $j_kredit = $this->input->post('j_kredit'); 
//        $file_laporan = basename($_FILES['file_laporan']['name']);        

    //   if($file_laporan == null){
    //       $cek_file_laporan = $this->Laporan_kerja_model->cekfile($this->input->post('id_laporan_kerja', TRUE));
         
    //      if($cek_file_laporan->file_laporan == null){
    //       $file_laporan = basename($_FILES['file_laporan']['name']);       
         
    //      }
         
    //     }         
        if($j_pinjaman == "PENSIUN" && $j_topup == "Top Up" ){

                    $hitung = ($hitung * 1.9/100);
                    $hitung_pajak = ($hitung * 2/100);
                    $hitung_finalty = ($postnettdsb * 0.36/100);
                    $hitung_nett = $hitung - $hitung_pajak;

        }
        if($j_pinjaman == "PENSIUN" && $j_topup == "New" ){

                    $hitung = ($hitung * 3.8/100);
                    $hitung_pajak = ($hitung * 2/100);
                    $hitung_finalty = ($postnettdsb * 0.36/100);
                    $hitung_nett = $hitung - $hitung_pajak;
                            
                    }
        elseif($j_pinjaman == "PRAPENSIUN" && $j_kredit == "Konsumtif"){
       
        $hitung = ($hitung * 2.45/100);
        $hitung_pajak = ($hitung * 2/100);
        $hitung_finalty = ($postnettdsb * 0.36/100);
        $hitung_nett = $hitung - $hitung_pajak;
       
        }elseif ($j_pinjaman == "KUR") {
   $plafon = str_replace('.','',$this->input->post('plafon'));

            $jumlah = $this->Laporan_kerja_model->hitungdata();
                      $hitung = ($hitung * 3.82/100);
             $hitung_pajak = ($hitung * 2/100);
            $e51 =  (10500000000 - $jumlah->plafon) * 0.36/100 ;
           $hitung_finalty = ($plafon  /$jumlah->plafon)* $e51 ;

           $hitung_nett = $hitung - $hitung_pajak;
       
        }elseif($j_pinjaman == "KPR PAYROL"){

             $hitung = ($hitung * 1.2/100);
             $hitung_pajak = ($hitung * 2/100);

        $hitung_finalty = ($postnettdsb * 0.36/100);
           $hitung_nett = $hitung - $hitung_pajak;
        
        }
        elseif($j_pinjaman == "PNS AKTIF"){

        if($j_kredit == "Konsumtif"){

        $hitung = ($hitung * 2.45/100);
         $hitung_pajak = ($hitung * 2/100);
        $hitung_finalty = ($postnettdsb * 0.36/100);
        $hitung_nett = $hitung - $hitung_pajak;  
        
        }elseif($j_kredit == "Produktif"){
        
        $hitung = ($hitung * 1.90/100);
         $hitung_pajak = ($hitung * 2/100);
        $hitung_finalty = ($postnettdsb * 0.36/100);

       $hitung_nett = $hitung - $hitung_pajak; 
       // $hitung_nett = $hitung - $hitung_pajak -  $hitung_finalty;   


    }

        }
            if ($_FILES['file_laporan']['name']=='')  {
            $data = array(
        'id_user' => $this->input->post('id_user',TRUE),
        'id_karyawan' => $this->input->post('id_karyawan',TRUE),
        'tanggal_lapor' => $this->input->post('tanggal_lapor',TRUE),
        'nama_cus' => $this->input->post('nama_cus',TRUE),
        'no_rekening' => $this->input->post('no_rekening',TRUE),
        'no_ktp' => $this->input->post('no_ktp',TRUE),  
        'nip' => $this->input->post('nip',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'alamat_instansi_d' => $this->input->post('alamat_instansi_d',TRUE), 
        'j_topup' => $j_topup,
        'j_pinjaman' => $j_pinjaman,
        'no_hp_debitur' => $this->input->post('no_hp_debitur',TRUE),
        'nama_pasangan' => $this->input->post('nama_pasangan',TRUE),
        'no_hp_pasangan' => $this->input->post('no_hp_pasangan',TRUE), 
        'plafon' => $this->input->post('plafon',TRUE),
        'baki_debet_lama' => $this->input->post('baki_debet_lama',TRUE),
        'nett_disburse'=> $this->input->post('nett_disburse'),
'fee'=> number_format($hitung_nett),

'pajak'=> number_format($hitung_pajak),
       'finalty'=> number_format($hitung_finalty),
       'nett'=> number_format($hitung_nett),
        'nama_ibu' => $this->input->post('nama_ibu',TRUE), 
        'nama_instansi' => $this->input->post('nama_instansi',TRUE), 
           'ket' => $this->input->post('ket',TRUE),    
           'j_kredit' => $this->input->post('j_kredit',TRUE),
           'nama_ao' => $this->input->post('nama_ao',TRUE),
            'nama_spv' => $this->input->post('nama_spv',TRUE),
             'nama_bank_pelunasan' => $this->input->post('nama_bank_pelunasan',TRUE), 
  'bank' => $this->input->post('bank',TRUE), 

             'tanggal_take_over' => $this->input->post('tanggal_take_over',TRUE), 
        'tanggal_realisasi' => $this->input->post('tanggal_realisasi',TRUE),
        'status_laporan' => $this->input->post('status_laporan',TRUE),
        );
        
            $this->Laporan_kerja_model->update($this->input->post('id_laporan_kerja', TRUE), $data);
            $this->session->set_flashdata('sukses', 'Update Record Success');
            redirect(base_url('admin/laporan_kerja'));
        }else{
                        $data = array(
        'id_user' => $this->input->post('id_user',TRUE),
        'id_karyawan' => $this->input->post('id_karyawan',TRUE),
        'tanggal_lapor' => $this->input->post('tanggal_lapor',TRUE),
        'file_laporan' => upload_gambar_biasa('file_laporan','file/laporan','pdf',10000,'file_laporan'),
        'nama_cus' => $this->input->post('nama_cus',TRUE),
        'status_laporan' => $this->input->post('status_laporan',TRUE),
        );

            $this->Laporan_kerja_model->update($this->input->post('id_laporan_kerja', TRUE), $data);
            $this->session->set_flashdata('sukses', 'Update Record Success');
            redirect(base_url('admin/laporan_kerja'));
        }
        
    }
    
    public function delete($id) 
    {
        $row = $this->Laporan_kerja_model->get_by_id($id);

        if ($row) {
            $this->Laporan_kerja_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/laporan_kerja'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/laporan_kerja'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('id_user', 'id user', 'trim');
    $this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim');
    $this->form_validation->set_rules('tanggal_lapor', 'tanggal lapor', 'trim|required');
    // $this->form_validation->set_rules('file_laporan', 'file laporan', 'trim|required');
    $this->form_validation->set_rules('url', 'url', 'trim|required');
    $this->form_validation->set_rules('status_laporan', 'status laporan', 'trim');

    $this->form_validation->set_rules('id_laporan_kerja', 'id_laporan_kerja', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Laporan_kerja.php */
/* Location: ./application/controllers/Laporan_kerja.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-25 17:32:08 */
/* http://harviacode.com */