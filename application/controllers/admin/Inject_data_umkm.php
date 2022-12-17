<?php

error_reporting(0);

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inject_data_umkm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Injectumkm_model');

        $this->load->library('form_validation');
    }

    public function index()
    {

        $start = intval($this->input->get('start'));
        
                $pns = $this->Injectumkm_model->get_all();

        $data = array( 
            'customer_data' => $pns ,
            'title'      =>'Inject Data UMKM',
                        'start' => $start,

            'isi'        =>'admin/injectumkm/injectumkm_list',);

             $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

    function import()
    {
          $data = array( 'title'      =>'Inject Data UMKM',
          	'isi'        =>'admin/injectumkm/injectumkm_import');
         $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }


    public function proses_import()
    {

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
            redirect('customer');

        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();

            $numrow = 1;
           
            foreach($sheet as $row){
                            if($numrow > 1){
                                array_push($data, array(
                                  
                                    'no_ktp'      => $row['B'],
                                    'no_kk'      => $row['C'],
                                    'nama_lengkap'      => $row['D'],
                                    'tanggal_lahir'      => str_replace('/', '-',date("Y-m-d", strtotime($row['E']))),
                                    'jenis_kelamin'      => $row['F'],
                                    'provinsi'      => $row['G'],
                                    'kabupaten'      => $row['H'], 
                                    'kecamatan'      => $row['I'],
                                    'desa'      => $row['J'],
                                    'provinsi1'      => $row['K'],
                                    'kabupaten1'      => $row['L'],
                                    'kecamatan1'      => $row['M'],
                                    'desa1'      => $row['N'],
                                    'bidang_usaha'      => $row['O'],
                                    'nib'      => $row['P'],
                                    'telepon_seluler'      => $row['Q'],
                                        'tgl_lapor'   => $today,
                                    


                                ));
                    }
                $numrow++;
            }
         $this->db->insert_batch('inject_data_umkm', $data);

            unlink(realpath('excel/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('admin/inject_data_umkm/import');

        }
    }
    function update_multiple(){
        $id= $this->input->post('id');
$tgl_lapor = $this->input->post('tgl_lapor');
if($id == null || $tgl_lapor == null){

            $this->session->set_flashdata('notif', '<div class="alert alert-success">Tanggal dan Data Harus di pilih dahulu!</div>');
            //redirect halaman
            redirect('admin/Inject_data_umkm');
}

$result = array();
         foreach ($id as $key => $val) {
            $result[] = array(
               'id' => $id[$key],
               'tgl_lapor' => $tgl_lapor              
            );
         }
          $this->db->update_batch('inject_data_umkm', $result, 'id');

            $this->session->set_flashdata('sukses', 'Data berhasil di update!');
            //redirect halaman
            redirect('admin/inject_data_umkm');
     }
     

      public function delete($id) 
    {
        $row = $this->Injectumkm_model->get_by_id($id);

        if ($row) {
            $this->Injectumkm_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/inject_data_umkm'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/inject_data_umkm'));
        }
    }
    
    function delete_all(){

            $this->Injectpns_model->delete_all();

            $this->session->set_flashdata('message', 'berhasil Menghapus Data');
            redirect(base_url('admin/inject_data_umkm'));
    }
    
}