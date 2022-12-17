<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Persen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Persen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'persen/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'persen/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'persen/index.html';
            $config['first_url'] = base_url() . 'persen/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Persen_model->total_rows($q);
        $persen = $this->Persen_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'persen_data' => $persen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

            'title'      =>'Data Persen',
            'isi'        =>'admin/persen/persen_list');

             $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

    public function read($id) 
    {
        $row = $this->Persen_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_persen' => $row->id_persen,
        'jenis' => $row->jenis,
        'persen' => $row->persen,

        'title'      =>'Detail Data Persen',
        'isi'        =>'admin/persen/persen_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/persen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => base_url('admin/persen/create_action'),
        'id_persen' => set_value('id_persen'),
        'jenis' => set_value('jenis'),
        'persen' => set_value('persen'),

       'title'          =>'Tambah Data Persen',
       'isi'            =>'admin/persen/persen_form');

       $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'jenis' => $this->input->post('jenis',TRUE),
        'persen' => $this->input->post('persen',TRUE),
        );

            $this->Persen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/persen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Persen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/persen/update_action'),
        'id_persen' => set_value('id_persen', $row->id_persen),
        'jenis' => set_value('jenis', $row->jenis),
        'persen' => set_value('persen', $row->persen),

        'title'                =>'Edit Data persen',
        'isi'                  =>'admin/persen/persen_form');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/persen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_persen', TRUE));
        } else {
            $data = array(
        'jenis' => $this->input->post('jenis',TRUE),
        'persen' => $this->input->post('persen',TRUE),
        );

            $this->Persen_model->update($this->input->post('id_persen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/persen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Persen_model->get_by_id($id);

        if ($row) {
            $this->Persen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/persen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/persen'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('jenis', 'Jenis persen', 'trim|required');
    $this->form_validation->set_rules('persen', 'persen', 'trim|required');

    $this->form_validation->set_rules('id_persen', 'id_persen', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file persen.php */
/* Location: ./application/controllers/persen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-24 19:34:19 */
/* http://harviacode.com */