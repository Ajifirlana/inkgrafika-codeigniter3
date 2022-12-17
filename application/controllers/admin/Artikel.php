<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'artikel/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'artikel/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'artikel/index.html';
            $config['first_url'] = base_url() . 'artikel/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Artikel_model->total_rows($q);
        $artikel = $this->Artikel_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'artikel_data' => $artikel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

            'title'      =>'Data Artikel',
            'isi'        =>'admin/artikel/artikel_list');

             $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

    public function read($id) 
    {
        $row = $this->Artikel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_artikel' => $row->id_artikel,
        'artikel' => $row->artikel, 
        'judul' => $row->judul, 
		'deskripsi' => $row->deskripsi, 

        'title'      =>'Detail Data Artikel',
        'isi'        =>'admin/artikel/artikel_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/artikel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => base_url('admin/artikel/create_action'),
	    'id_artikel' => set_value('id_artikel'),
        'artikel' => set_value('artikel'), 
        'judul' => set_value('judul'), 
	    'deskripsi' => set_value('deskripsi'), 

       'title'          =>'Tambah Data Artikel',
       'isi'            =>'admin/artikel/artikel_form');

       $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    
    public function create_action() 
    { 
            $data = array(
        'judul' => $this->input->post('judul',TRUE),
        'deskripsi' => $this->input->post('deskripsi',TRUE),
		'artikel' => upload_gambar_biasa('artikel','gambar/thumb','jpg|png|jpeg|webp',10000,'artikel') );

            $this->Artikel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/artikel'));
    }
    
    public function update($id) 
    {
        $row = $this->Artikel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/artikel/update_action'),
		'id_artikel' => set_value('id_artikel', $row->id_artikel),
        'artikel' => set_value('artikel', $row->artikel), 
        'judul' => set_value('judul', $row->judul), 
		'deskripsi' => set_value('deskripsi', $row->deskripsi), 

        'title'                =>'Edit Data Artikel',
        'isi'                  =>'admin/artikel/artikel_form');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/artikel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_artikel', TRUE));
        } else {
            $data = array(
        'judul' => $this->input->post('judul',TRUE), 
        'deskripsi' => $this->input->post('deskripsi',TRUE), 
		'artikel' => upload_gambar_biasa('artikel','gambar/thumb','jpg|png',10000,'artikel'),
        );

            $this->Artikel_model->update($this->input->post('id_artikel', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/artikel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Artikel_model->get_by_id($id);

        if ($row) {
            $this->Artikel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/artikel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/artikel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('artikel', 'artikel', 'trim|required'); 

	$this->form_validation->set_rules('id_artikel', 'id_artikel', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file artikel.php */
/* Location: ./application/controllers/artikel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-24 19:34:19 */
/* http://harviacode.com */