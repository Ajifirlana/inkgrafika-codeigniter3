<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buletin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Buletin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'buletin/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'buletin/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'buletin/index.html';
            $config['first_url'] = base_url() . 'buletin/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Buletin_model->total_rows($q);
        $buletin = $this->Buletin_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'buletin_data' => $buletin,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

            'title'      =>'Data buletin',
            'isi'        =>'admin/buletin/buletin_list');

             $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

    public function read($id) 
    {
        $row = $this->Buletin_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_buletin' => $row->id_buletin,
        'buletin' => $row->buletin, 

        'title'      =>'Detail Data buletin',
        'isi'        =>'admin/buletin/buletin_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/buletin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => base_url('admin/buletin/create_action'),
        'id_buletin' => set_value('id_buletin'),
        'buletin' => set_value('buletin'), 

       'title'          =>'Tambah Data buletin',
       'isi'            =>'admin/buletin/buletin_form');

       $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    
    public function create_action() 
    { 
            $data = array(
        'buletin' => upload_gambar_biasa('buletin','gambar/thumb','jpg|png|jpeg',10000,'buletin') );

            $this->Buletin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/buletin'));
    }
    
    public function update($id) 
    {
        $row = $this->Buletin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/buletin/update_action'),
        'id_buletin' => set_value('id_buletin', $row->id_buletin),
        'buletin' => set_value('buletin', $row->buletin), 

        'title'                =>'Edit Data buletin',
        'isi'                  =>'admin/buletin/buletin_form');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/buletin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_buletin', TRUE));
        } else {
            $data = array(
        'buletin' => upload_gambar_biasa('buletin','gambar/thumb','jpg|png|jpeg',10000,'buletin'),
        );

            $this->Buletin_model->update($this->input->post('id_buletin', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/buletin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Buletin_model->get_by_id($id);

        if ($row) {
            $this->Buletin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/buletin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/buletin'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('buletin', 'buletin', 'trim|required'); 

    $this->form_validation->set_rules('id_buletin', 'id_buletin', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file buletin.php */
/* Location: ./application/controllers/buletin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-24 19:34:19 */
/* http://harviacode.com */