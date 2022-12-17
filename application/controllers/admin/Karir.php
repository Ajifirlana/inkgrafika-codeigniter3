<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Karir_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'karir/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'karir/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'karir/index.html';
            $config['first_url'] = base_url() . 'karir/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Karir_model->total_rows($q);
        $karir = $this->Karir_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'karir_data' => $karir,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

            'title'      =>'Data Pelamar',
            'isi'        =>'admin/karir/karir_list');

             $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

    public function read($id) 
    {
        $row = $this->Karir_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_karir' => $row->id_karir,
        'nama' => $row->nama, 
        'nik' => $row->nik, 
        'tempat_lahir' => $row->tempat_lahir, 
        'tgl_lahir' => $row->tgl_lahir, 
        'alamat' => $row->alamat, 
        'no_hp' => $row->no_hp, 
        'email' => $row->email, 
        'jenis_kelamin' => $row->jenis_kelamin, 
        'pendidikan' => $row->pendidikan, 
        'pengalaman' => $row->pengalaman, 
        'jabatan_lamar' => $row->jabatan_lamar, 
        'area' => $row->area,
        'file' => $row->file,

        'title'      =>'Detail Data Pelamar',
        'isi'        =>'admin/karir/karir_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/karir'));
        }
    }

  //   public function create() 
  //   {
  //       $data = array(
  //           'button' => 'Simpan',
  //           'action' => base_url('admin/karir/create_action'),
	 //    'id_karir' => set_value('id_karir'),
	 //    'nama' => set_value('nama'), 

  //      'title'          =>'Tambah Data Pelamar',
  //      'isi'            =>'admin/karir/karir_form');

  //      $this->load->view('admin/layout/wrapper', $data, FALSE); 
  //   }
    
  //   public function create_action() 
  //   {
  //       $this->_rules();

  //       if ($this->form_validation->run() == FALSE) {
  //           $this->create();
  //       } else {
  //           $data = array(
		// 'nama' => $this->input->post('nama',TRUE), 
	 //    );

  //           $this->Karir_model->insert($data);
  //           $this->session->set_flashdata('message', 'Create Record Success');
  //           redirect(base_url('admin/karir'));
  //       }
  //   }
    
  //   public function update($id) 
  //   {
  //       $row = $this->Karir_model->get_by_id($id);

  //       if ($row) {
  //           $data = array(
  //               'button' => 'Update',
  //               'action' => base_url('admin/karir/update_action'),
		// 'id_karir' => set_value('id_karir', $row->id_karir),
		// 'nama' => set_value('nama', $row->nama), 

  //       'title'                =>'Edit Data Pelamar',
  //       'isi'                  =>'admin/karir/karir_form');

  //       $this->load->view('admin/layout/wrapper', $data, FALSE);
  //       } else {
  //           $this->session->set_flashdata('message', 'Record Not Found');
  //           redirect(base_url('admin/karir'));
  //       }
  //   }
    
  //   public function update_action() 
  //   {
  //       $this->_rules();

  //       if ($this->form_validation->run() == FALSE) {
  //           $this->update($this->input->post('id_cabang', TRUE));
  //       } else {
  //           $data = array(
		// 'nama_cabang' => $this->input->post('nama_cabang',TRUE), 
	 //    );

  //           $this->Cabang_model->update($this->input->post('id_cabang', TRUE), $data);
  //           $this->session->set_flashdata('message', 'Update Record Success');
  //           redirect(base_url('admin/cabang'));
  //       }
  //   }
    
    public function delete($id) 
    {
        $row = $this->Karir_model->get_by_id($id);

        if ($row) {
            $this->Karir_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/karir'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/karir'));
        }
    }
     public function file ($id_karir){
        $file = $this->Karir_model->detail($id_karir);
        //Proses download
        $folder     = './file/karir/';
        $file       = $file->file;
        force_download($folder.$file, NULL);
        }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama Pelamar', 'trim|required'); 

	$this->form_validation->set_rules('id_karir', 'id_karir', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Cabang.php */
/* Location: ./application/controllers/Cabang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-24 19:34:19 */
/* http://harviacode.com */