<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inject_data_prapen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Injectprapen_model');

        $this->load->library('form_validation');
    }

    public function index()
    {
        $start = intval($this->input->get('start'));
        
                $prapen = $this->Injectprapen_model->get_all();

        $data = array( 
            'customer_data' => $prapen ,
            'title'      =>'Inject Data PRAPENSIUN',
                        'start' => $start,

            'isi'        =>'admin/injectprapen/injectprapen_list',);

             $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

    function import(){
       
          $data = array(  'title'      =>'Inject Data PRAPENSIUN',
            'isi'        =>'admin/injectprapen/injectprapen_import'
        );
         $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
      public function proses_import(){
        // Load plugin PHPExcel nya
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
            redirect('injectpns');

        }else{

             $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();

            $numrow = 1;
           
            foreach($sheet as $row){
                            if($numrow > 1){
                                array_push($data, array(
                                  
                                    'NOTAS'      => $row['A'],
                                    'JENIS'      => $row['B'],
                                    'NAMAPENSIUNAN'      => $row['C'],
                                    'TGL_LAHIR_PENSIUNAN'     => str_replace('/', '-',date("Y-m-d", strtotime($row['D']))),
                                    'PENPOK'      => $row['E'],
                                    'TISTRI'      => $row['F'],
                                    'TANAK'      => $row['G'],
                                    'TPAJAK'      => $row['H'],
                                    'TBERAS'      => $row['I'],
                                    'PENYESUAIAN'      => $row['J'],
                                    'TBULAT'      => $row['K'],
                                    'KOTOR'      => $row['L'],
                                    'BERSIH'      => $row['M'],
                                    'RAPEL'      => $row['N'],
                                    'KDJIWA'      => $row['O'],
                                    'NAMA_PENERIMA'      => $row['P'],
                                    'TGL_LAHIR_PENERIMA'      => str_replace('/', '-',date("Y-m-d", strtotime($row['Q']))),
                                    'ALM_PESERTA'      => $row['R'],
                                    'NMDATI4'      => $row['T'],
                                    'KOTA'      => $row['U'],
                                    'KODEBYR'      => $row['V'],
                                    'NMK'      => $row['W'],
                                    'ANBYR'      => $row['X'],
                                    'NORUTDAPEM'      => $row['Y'],
                                    'TMTPENSIUN'      => str_replace('/', '-',date("Y-m-d", strtotime($row['Z']))),
                                    'NOMOR_SKEP'      => $row['AA'],
                                    'TANGGAL_SKEP'      => str_replace('/', '-',date("Y-m-d", strtotime($row['AB']))),
                                    'NOREK'      => $row['AC'],
                                    'PENERBIT_SKEP'      => $row['AD'],
                                    'NPWP'      => $row['AE'],
                                    'TMT_STOP'      => $row['AF'],
                                    'KDSTOP'      => $row['AG'],
                                    'NMSTOP'      => $row['AH'],
                                    'TELEPON'      => $row['AI'],
                                    'KDPANGKAT'      => $row['AJ'],
                                    'KODECABANG'      => $row['AK'],
                                    'AWAL_FLAG'      => str_replace('/', '-',date("Y-m-d", strtotime($row['AL']))),
                                    'AKHIR_FLAG'      => str_replace('/', '-',date("Y-m-d", strtotime($row['AM']))),

                                    'NM_M'      => $row['AN'],
                                    'ITRA'      => $row['AO'],
                                ));
                    }
                $numrow++;
            }

     $this->db->insert_batch('inject_data_prapensiun', $data);

            unlink(realpath('excel/'.$data_upload['file_name']));

            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');

            redirect('admin/Inject_data_prapen/import');
        }

        
    }
    function update_multiple(){
        $id= $this->input->post('id');
$tgl_lapor = $this->input->post('tgl_lapor');
if($id == null || $tgl_lapor == null){

            $this->session->set_flashdata('notif', '<div class="alert alert-success">Tanggal dan Data Harus di pilih dahulu!</div>');
            //redirect halaman
            redirect('admin/Inject_data_prapen');
}

$result = array();
         foreach ($id as $key => $val) {
            $result[] = array(
               'id' => $id[$key],
               'tgl_lapor' => $tgl_lapor              
            );
         }
          $this->db->update_batch('inject_data_prapensiun', $result, 'id');

            $this->session->set_flashdata('sukses', 'Data berhasil di update!');
            //redirect halaman
            redirect('admin/Inject_data_prapen');
     }
      public function delete($id) 
    {
        $row = $this->Injectprapen_model->get_by_id($id);

        if ($row) {
            $this->Injectprapen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/inject_data_prapen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/inject_data_prapen'));
        }
    }
    
    function delete_all(){

            $this->Injectpns_model->delete_all();

            $this->session->set_flashdata('message', 'berhasil Menghapus Data');
            redirect(base_url('admin/inject_data_prapen'));
    }
    
}