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
        'ukuran' => $this->input->post('ukuran',TRUE),
        'jumlah' => $this->input->post('jumlah',TRUE),
        'image' => upload_gambar_biasa('slider','gambar/thumb','jpg|png',10000,'image') );

            $this->Slider_model->insert($data);
            $this->session->set_flashdata('sukses', 'Create Record Success');
            redirect(base_url('admin/slider'));
    }

     public function update($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/slider/update_action'),
		'id' => set_value('id', $row->id),
        'ukuran' => set_value('ukuran', $row->ukuran),
        'jumlah' => set_value('jumlah', $row->jumlah),
		'image' => set_value('image', $row->image),

        'title'                =>'Edit Data Banner',
        'isi'                  =>'admin/slider/edit');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('sukses', 'Record Not Found');
            redirect(base_url('admin/slider'));
        }
    }

    function update_action(){
    	$this->update($this->input->post('id', TRUE));
        
             if ($_FILES['image']['name']=='') {
            $data = array(
		'id' => $this->input->post('id',TRUE),
        'ukuran' => $this->input->post('ukuran',TRUE),
        'jumlah' => $this->input->post('jumlah',TRUE),
	    );
            $this->Slider_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('sukses', 'Update Record Success and image none');
            redirect(base_url('admin/slider'));
        } else {
    	$data = array(
        'id' => $this->input->post('id',TRUE),
        'ukuran' => $this->input->post('ukuran',TRUE),
        'jumlah' => $this->input->post('jumlah',TRUE),
        'image' => upload_gambar_biasa('slider','gambar/thumb','jpg|png',10000,'image'),
        );

            $this->Slider_model->update($this->input->post('id', TRUE), $data);
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