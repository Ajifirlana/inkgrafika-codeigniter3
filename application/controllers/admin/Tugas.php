<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Tugas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tugas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tugas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tugas/index.html';
            $config['first_url'] = base_url() . 'tugas/index.html';
        }


        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tugas_model->total_rows($q);
        $tugas = $this->Tugas_model->listing($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tugas_data' => $tugas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

            'title'      =>'Data Tugas',
            'isi'        =>'admin/tugas/tugas_list');

             $this->load->view('admin/layout/wrapper', $data, FALSE);  
    }

            //Undduh File Tugas
    public function file_tugas($id_tugas){
        $file_tugas = $this->Tugas_model->detail($id_tugas);
        //Proses download
        $folder     = './file/tugas/';
        $file       = $file_tugas->file;
        force_download($folder.$file, NULL);
        }

    public function read($id) 
    {
        $row = $this->Tugas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tugas' => $row->id_tugas,
		'tanggal_kirim_tugas' => $row->tanggal_kirim_tugas,
		'id_karyawan' => $row->id_karyawan,
		'keterangan_tugas' => $row->keterangan_tugas,
		'deadline' => $row->deadline,
		'file' => $row->file,

        'title'      =>'Detail Tugas',
        'isi'        =>'admin/tugas/tugas_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/tugas'));
        }
    }

    public function create() 
    {
        $karyawan = $this->Tugas_model->karyawan();

        $data = array(
            'button' => 'Simpan',
            'action' => base_url('admin/tugas/create_action'),
	    'id_tugas' => set_value('id_tugas'),
	    'tanggal_kirim_tugas' => set_value('tanggal_kirim_tugas'),
	    'id_karyawan' => set_value('id_karyawan'),
	    'keterangan_tugas' => set_value('keterangan_tugas'),
	    'deadline' => set_value('deadline'),
	    'file' => set_value('file'),

       'title'            =>'Tambah Data Tugas',
       'karyawan'         => $karyawan,
       'isi'              =>'admin/tugas/tugas_form');

       $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal_kirim_tugas' => $this->input->post('tanggal_kirim_tugas',TRUE),
		'id_karyawan' => $this->input->post('id_karyawan',TRUE),
		'keterangan_tugas' => $this->input->post('keterangan_tugas',TRUE),
		'deadline' => $this->input->post('deadline',TRUE),
		'file' => upload_gambar_biasa('file_tugas','file/tugas','pdf',10000,'file'),
	    );

            $this->Tugas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/tugas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tugas_model->get_by_id($id);
        $karyawan = $this->Tugas_model->karyawan();


        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/tugas/update_action'),
		'id_tugas' => set_value('id_tugas', $row->id_tugas),
		'tanggal_kirim_tugas' => set_value('tanggal_kirim_tugas', $row->tanggal_kirim_tugas),
		'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
		'keterangan_tugas' => set_value('keterangan_tugas', $row->keterangan_tugas),
		'deadline' => set_value('deadline', $row->deadline),
		'file' => set_value('file', $row->file),

        'title'                  =>'Edit Data Tugas',
        'karyawan'               => $karyawan,
        'isi'                    =>'admin/tugas/tugas_form');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/tugas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tugas', TRUE));
        } else {
            if ($_FILES['file']['name']=='')  {
            $data = array(
		'tanggal_kirim_tugas' => $this->input->post('tanggal_kirim_tugas',TRUE),
		'id_karyawan' => $this->input->post('id_karyawan',TRUE),
		'keterangan_tugas' => $this->input->post('keterangan_tugas',TRUE),
		'deadline' => $this->input->post('deadline',TRUE),
	    );

            $this->Tugas_model->update($this->input->post('id_tugas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/tugas'));
        }else{
           $data = array(
        'tanggal_kirim_tugas' => $this->input->post('tanggal_kirim_tugas',TRUE),
        'id_karyawan' => $this->input->post('id_karyawan',TRUE),
        'keterangan_tugas' => $this->input->post('keterangan_tugas',TRUE),
        'deadline' => $this->input->post('deadline',TRUE),
        'file' => upload_gambar_biasa('file_tugas','file/tugas','pdf',10000,'file'),
        );

            $this->Tugas_model->update($this->input->post('id_tugas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/tugas'));
        }
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tugas_model->get_by_id($id);

        if ($row) {
            $this->Tugas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/tugas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/tugas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal_kirim_tugas', 'tanggal kirim tugas', 'trim|required');
	$this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim|required');
	$this->form_validation->set_rules('keterangan_tugas', 'keterangan tugas', 'trim|required');
	$this->form_validation->set_rules('deadline', 'deadline', 'trim|required');
	// $this->form_validation->set_rules('file', 'file', 'trim|required');

	$this->form_validation->set_rules('id_tugas', 'id_tugas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tugas.php */
/* Location: ./application/controllers/Tugas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-24 19:34:40 */
/* http://harviacode.com */