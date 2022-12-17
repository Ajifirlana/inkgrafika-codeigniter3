<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cabang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cabang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'cabang/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'cabang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'cabang/index.html';
            $config['first_url'] = base_url() . 'cabang/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Cabang_model->total_rows($q);
        $cabang = $this->Cabang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'cabang_data' => $cabang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

            'title'      =>'Data Cabang',
            'isi'        =>'admin/cabang/cabang_list');

             $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

    public function read($id) 
    {
        $row = $this->Cabang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_cabang' => $row->id_cabang,
		'nama_cabang' => $row->nama_cabang, 

        'title'      =>'Detail Data Cabang',
        'isi'        =>'admin/cabang/cabang_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/cabang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => base_url('admin/cabang/create_action'),
	    'id_cabang' => set_value('id_cabang'),
	    'nama_cabang' => set_value('nama_cabang'), 

       'title'          =>'Tambah Data Cabang',
       'isi'            =>'admin/cabang/cabang_form');

       $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_cabang' => $this->input->post('nama_cabang',TRUE), 
	    );

            $this->Cabang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/cabang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Cabang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/cabang/update_action'),
		'id_cabang' => set_value('id_cabang', $row->id_cabang),
		'nama_cabang' => set_value('nama_cabang', $row->nama_cabang), 

        'title'                =>'Edit Data Cabang',
        'isi'                  =>'admin/cabang/cabang_form');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/cabang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_cabang', TRUE));
        } else {
            $data = array(
		'nama_cabang' => $this->input->post('nama_cabang',TRUE), 
	    );

            $this->Cabang_model->update($this->input->post('id_cabang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/cabang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Cabang_model->get_by_id($id);

        if ($row) {
            $this->Cabang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/cabang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/cabang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_cabang', 'nama cabang', 'trim|required'); 

	$this->form_validation->set_rules('id_cabang', 'id_cabang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Cabang.php */
/* Location: ./application/controllers/Cabang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-24 19:34:19 */
/* http://harviacode.com */