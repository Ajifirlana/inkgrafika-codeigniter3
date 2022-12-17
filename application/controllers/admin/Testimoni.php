<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimoni extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Testimoni_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'testimoni/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'testimoni/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'testimoni/index.html';
            $config['first_url'] = base_url() . 'testimoni/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Testimoni_model->total_rows($q);
        $testimoni = $this->Testimoni_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'testimoni_data' => $testimoni,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

            'title'      =>'Data Testimoni',
            'isi'        =>'admin/testimoni/testimoni_list');

             $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

    public function read($id) 
    {
        $row = $this->Testimoni_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_testimoni' => $row->id_testimoni,
		'testi' => $row->testi, 

        'title'      =>'Detail Data Testimoni',
        'isi'        =>'admin/testimoni/testimoni_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/testimoni'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => base_url('admin/testimoni/create_action'),
	    'id_testimoni' => set_value('id_testimoni'),
	    'testi' => set_value('testi'), 

       'title'          =>'Tambah Data Testimoni',
       'isi'            =>'admin/testimoni/testimoni_form');

       $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    
    public function create_action() 
    { 
            $data = array(
		'testi' => upload_gambar_biasa('testimoni','gambar/thumb','jpg|png',10000,'testi') );

            $this->Testimoni_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/testimoni'));
    }
    
    public function update($id) 
    {
        $row = $this->Testimoni_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/testimoni/update_action'),
		'id_testimoni' => set_value('id_testimoni', $row->id_testimoni),
		'testi' => set_value('testi', $row->testi), 

        'title'                =>'Edit Data Testimoni',
        'isi'                  =>'admin/testimoni/testimoni_form');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/testimoni'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_testimoni', TRUE));
        } else {
            $data = array(
		'testi' => upload_gambar_biasa('testimoni','gambar/thumb','jpg|png',10000,'testi'),
        );

            $this->Testimoni_model->update($this->input->post('id_testimoni', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/testimoni'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Testimoni_model->get_by_id($id);

        if ($row) {
            $this->Testimoni_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/testimoni'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/testimoni'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('testi', 'testimoni', 'trim|required'); 

	$this->form_validation->set_rules('id_testimoni', 'id_testimoni', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Testimoni.php */
/* Location: ./application/controllers/Testimoni.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-24 19:34:19 */
/* http://harviacode.com */