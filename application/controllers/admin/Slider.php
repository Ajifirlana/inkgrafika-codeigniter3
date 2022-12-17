<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_model');
        $this->load->library('form_validation');
    }

    public function index()
    { 
    	   if($this->session->userdata('akses_level') != "Admin"){
            $this->session->set_flashdata('terbatas', 'Hak akses anda terbatas');
            redirect(base_url('admin/dasbor'),'refresh');
        	}
$slider = $this->Slider_model->get_all();
		$data = array( 'title'  	=>'',
					    'slider'		=> $slider,
					   'isi'		=>'admin/slider/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
    }

    
    public function create() 
    {

        $data = array(
            'title'     =>'Tambah Slider',

                'button' => 'Tambah',
            'action' => base_url('admin/slider/create_action'),
            'isi'    =>'admin/slider/create'
        );
       $this->load->view('admin/layout/wrapper', $data, FALSE); 

    }


    public function create_action() 
    { 
 $data = array( 
        'image' => upload_gambar_biasa('slider','gambar/thumb','jpg|png',10000,'image') );

            $this->Slider_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/slider'));
    }

     public function update($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/slider/update_action'),
		'id_slider' => set_value('id_slider', $row->id_slider),
		'image' => set_value('image', $row->image),

        'title'                =>'Edit Data Slider',
        'isi'                  =>'admin/slider/edit');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/slider'));
        }
    }

    function update_action(){
    	$this->update($this->input->post('id_slider', TRUE));
        
             if ($_FILES['image']['name']=='') {
            $data = array(
		'id_slider' => $this->input->post('id_slider',TRUE),
	    );
            $this->Slider_model->update($this->input->post('id_slider', TRUE), $data);
            $this->session->set_flashdata('sukses', 'Update Record Success and image none');
            redirect(base_url('admin/slider'));
        } else {
    	$data = array(
        'id_slider' => $this->input->post('id_slider',TRUE),
        'image' => upload_gambar_biasa('slider','gambar/thumb','jpg|png',10000,'image'),
        );

            $this->Slider_model->update($this->input->post('id_slider', TRUE), $data);
            $this->session->set_flashdata('sukses', 'Update Record Success and image update');
            redirect(base_url('admin/slider'));
    }
}
public function delete($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            $this->Slider_model->delete($id);
            $this->session->set_flashdata('sukses', 'Delete Record Success');
            redirect(base_url('admin/slider'));
        } else {
            $this->session->set_flashdata('sukses', 'Record Not Found');
            redirect(base_url('admin/slider'));
        }
    }
}