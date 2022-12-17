<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inject_data_pns extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Injectpns_model');

        $this->load->library('form_validation');
$this->load->helper(array('url','html','form'));
    }

    public function index()
    {
        $start = intval($this->input->get('start'));
        
                $pns = $this->Injectpns_model->get_all();

        $data = array( 
            'customer_data' => $pns ,
            'title'      =>'Inject Data PNS',
                        'start' => $start,

            'isi'        =>'admin/injectpns/injectpns_list',);
            
             $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

    function import(){
       
          $data = array(  'title'      =>'Inject Data PNS',
            'isi'        =>'admin/injectpns/injectpns_import'
        );
         $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
      public function proses_import(){
        
        $today = date('Y-m-d');
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
                                  
                                    'no_rekening'      => $row['A'],
                                    'nama'      => $row['B'],
                                    'nama_dinas'      => $row['C'],
                                    'nama_cabang'      => $row['D'],
                                    'cif'      => $row['E'],
                                    'no_telpon'      => $row['F'],

                                    'alamat'      => $row['G'],
                                    'tgl_lapor'      => $today,

                                ));
                    }
                $numrow++;
            }

             $this->db->insert_batch('inject_data_pns', $data);

            unlink(realpath('excel/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('admin/inject_data_pns/import');
        }
    }

    function update_multiple(){
        $id= $this->input->post('id');
$tgl_lapor = $this->input->post('tgl_lapor');
if($id == null || $tgl_lapor == null){

            $this->session->set_flashdata('notif', '<div class="alert alert-success">Tanggal dan Data Harus di pilih dahulu!</div>');
            //redirect halaman
            redirect('admin/inject_data_pns');
}

$result = array();
         foreach ($id as $key => $val) {
            $result[] = array(
               'id' => $id[$key],
               'tgl_lapor' => $tgl_lapor              
            );
         }
              
         $this->db->update_batch('inject_data_pns', $result, 'id');

            $this->session->set_flashdata('notif', '<div class="alert alert-success">Data berhasil di update!</div>');
            //redirect halaman
            redirect('admin/inject_data_pns');
    }

    function delete_all(){

            $this->Injectpns_model->delete_all();

            $this->session->set_flashdata('message', 'berhasil Menghapus Data');
            redirect(base_url('admin/inject_data_pns'));
    }
    
    public function delete($id) 
    {
        $row = $this->Injectpns_model->get_by_id($id);

        if ($row) {
            $this->Injectpns_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/inject_data_pns'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/inject_data_pns'));
        }
    }
}