<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');

        $this->load->model('Cabang_model');
        $this->load->library('form_validation');

    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'customer/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'customer/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'customer/index.html';
            $config['first_url'] = base_url() . 'customer/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Customer_model->total_rows($q);
        $customer = $this->Customer_model->get_limit_data();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'customer_data' => $customer,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

            'title'      =>'Data Customer',
            'isi'        =>'admin/customer/customer_list');

             $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    function import()
    {
          $data = array( 'title'      =>'Data Customer','isi'        =>'admin/customer/customer_import');
         $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

    public function proses_import()
    {

         error_reporting(0);
         // Load plugin PHPExcel nya
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
                                  
                                    'jk_aktif'      => $row['B'],
                                    'nama_lengkap'      => $row['C'],
                                    'no_hp'      => $row['D'],
                                    'alamat'      => $row['E'],
                                    'id_cabang'      => $row['F'],
                                    'tgl_lahir'      => str_replace('/', '-',date("Y-m-d", strtotime($row['G']))),
                                    'gaji_saat_ini'      => $row['H'], 
                                    'jangka_pinjam_max'      => $row['I'],
                                    'jenis_pinjaman'      => $row['J'],
                                    'keterangan'      => $row['K'],


                                ));
                    }
                $numrow++;
            }
       
         $this->db->insert_batch('data_cus_aktif', $data);

            unlink(realpath('excel/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('admin/customer/import');

        }
    }

    public function read($id) 
    {
        $row = $this->Customer_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_cus_aktif' => $row->id_cus_aktif,
        'keterangan' => $row->keterangan, 
        'alamat' => $row->alamat, 

        'jenis_pinjaman' => $row->jenis_pinjaman, 
        'jk_aktif' => $row->jk_aktif, 
        'nama_lengkap' => $row->nama_lengkap, 
        'no_hp' => $row->no_hp, 
        'tgl_lahir' => $row->tgl_lahir, 
        'gaji_saat_ini' => $row->gaji_saat_ini, 
        'jangka_pinjam_max' => $row->jangka_pinjam_max,  

        'title'      =>'Detail Data Customer',
        'isi'        =>'admin/customer/customer_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/customer'));
        }
    }

    public function create() 
    {

        $data = array(
            'button' => 'Simpan',
            'action' => base_url('admin/customer/create_action'),
        'id_cus_aktif' => set_value('id_cus_aktif'),
        'nama_lengkap' => set_value('nama_lengkap'), 
'cabang' => $this->Cabang_model->get_all(), 

        'alamat' => set_value('alamat'), 
        'jk_aktif' => set_value('jk_aktif'), 
        'no_hp' => set_value('no_hp'), 
        'tgl_lahir' => set_value('tgl_lahir'), 
        'gaji_saat_ini' => set_value('gaji_saat_ini'), 
        'jangka_pinjam_max' => set_value('jangka_pinjam_max'), 

        'keterangan' => set_value('keterangan'), 

       'title'          =>'Tambah Data Customer',
       'isi'            =>'admin/customer/customer_form');

       $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    
    public function create_action() 
    {
       
            $data = array(

        'nama_lengkap' => $this->input->post('nama_lengkap',TRUE), 

        'alamat' => $this->input->post('alamat',TRUE), 

        'id_cabang' => $this->input->post('id_cabang',TRUE), 
        'jk_aktif' => $this->input->post('jk_aktif',TRUE), 
        'no_hp' => $this->input->post('no_hp',TRUE), 
        'tgl_lahir' => $this->input->post('tgl_lahir',TRUE), 
        'gaji_saat_ini' => $this->input->post('gaji_saat_ini',TRUE), 
        'jangka_pinjam_max' => $this->input->post('jangka_pinjam_max',TRUE),  

        'keterangan' => $this->input->post('keterangan',TRUE), 
        'jenis_pinjaman' => $this->input->post('jenis_pinjaman',TRUE), 
        );

            $this->Customer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/customer'));
        
    }
    
    public function update($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/customer/update_action'),
        'id_cus_aktif' => set_value('id_cus_aktif', $row->id_cus_aktif),
        'jk_aktif' => set_value('jk_aktif', $row->jk_aktif),
        'jenis_pinjaman' => set_value('jk_aktif', $row->jenis_pinjaman),
  'alamat' => set_value('jk_aktif', $row->alamat),
  'keterangan' => set_value('jk_aktif', $row->keterangan),
'id_cabang' => set_value('id_cabang', $row->id_cabang),
'cabang' => $this->Cabang_model->get_all(), 

        'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap), 
        'no_hp' => set_value('no_hp', $row->no_hp),
        'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
        'gaji_saat_ini' => set_value('gaji_saat_ini', $row->gaji_saat_ini),
        
        'jangka_pinjam_max' => set_value('jangka_pinjam_max', $row->jangka_pinjam_max), 

        'title'                =>'Edit Data Customer',
        'isi'                  =>'admin/customer/customer_form');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/customer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_cus_aktif', TRUE));
        } else {
            $data = array(
        'alamat' => $this->input->post('alamat',TRUE), 
        'keterangan' => $this->input->post('keterangan',TRUE), 

        'jenis_pinjaman' => $this->input->post('jenis_pinjaman',TRUE), 
        'jk_aktif' => $this->input->post('jk_aktif',TRUE), 
        'nama_lengkap' => $this->input->post('nama_lengkap',TRUE), 
        'no_hp' => $this->input->post('no_hp',TRUE), 
        'tgl_lahir' => $this->input->post('tgl_lahir',TRUE), 
        'gaji_saat_ini' => $this->input->post('gaji_saat_ini',TRUE), 
        'jangka_pinjam_max' => $this->input->post('jangka_pinjam_max',TRUE),  
        );

            $this->Customer_model->update($this->input->post('id_cus_aktif', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/customer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $this->Customer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/customer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/customer'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('nama_lengkap', 'nama customer', 'trim|required'); 

    $this->form_validation->set_rules('id_cus_aktif', 'id_cus_aktif', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-24 19:34:19 */
/* http://harviacode.com */