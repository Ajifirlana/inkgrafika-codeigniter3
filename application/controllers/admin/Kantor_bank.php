<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kantor_bank extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kantor_bank_model');
        $this->load->library('form_validation');
    }
     public function index()
    {$start = intval($this->input->get('start'));
        
          $kantor_bank = $this->Kantor_bank_model->getall();
          $data = array('kantorbank'=> $kantor_bank ,'start' => $start,
            'title'      =>'Data Kantor Bank',
            'isi'        =>'admin/kantor/kantor_bank_list');
         $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    function create()
{
     $data = array( 
          'title'      =>'Input Data Kantor Bank',
          'button' => 'Simpan',
           'action' => base_url('admin/kantor_bank/create_action'),
    'isi'=>'admin/kantor/kantor_form', 

    'id' => set_value('id'),
    'cabang_kantor' => set_value('cabang_kantor'));
      $this->load->view('admin/layout/wrapper', $data, FALSE); 
}
function create_action(){
       $data = array('cabang_kantor'=>set_value('cabang_kantor'));
       $this->Kantor_bank_model->insert($data);
            $this->session->set_flashdata('sukses', 'Create Record Success');
            redirect(base_url('admin/kantor_bank'));
}


     public function read($id) 
    {
         $row = $this->Kantor_bank_model->get_by_id($id);
         if ($row) {
            $data = array(
        'id' => $row->id,
        'cabang_kantor' => $row->cabang_kantor, 

        'title'      =>'Detail Data Kantor Bank',
        'isi'        =>'admin/kantor/kantor_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('sukses', 'Record Not Found');
            redirect(base_url('admin/kantor'));
        }
    }
     public function update($id) 
    {
         $row = $this->Kantor_bank_model->get_by_id($id);
         if ($row) {
            $data = array(
        
        'id'=>set_value('id', $row->id),
        'cabang_kantor'=>set_value('j_topup', $row->cabang_kantor),
         'action' => base_url('admin/kantor_bank/update_action'),
        'button'=> 'update',
        'title'      =>'Detail Data Kantor Bank',
        'isi'        =>'admin/kantor/kantor_form');
        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        }

        
        else {
            $this->session->set_flashdata('sukses', 'Record Not Found');
            redirect(base_url('admin/kantor'));
        }
    }
     public function delete($id) 
    {
        $row = $this->Kantor_bank_model->get_by_id($id);
        
        if ($row) 
        { 
             $this->Kantor_bank_model->delete($id);
              $this->session->set_flashdata('sukses', 'Delete Record Success');
            redirect(base_url('admin/kantor_bank'));
        }else
           {
            
            $this->session->set_flashdata('sukses', 'Record Not Found');
           redirect(base_url('admin/kantor_bank'));
           }
    }
     public function update_action() 
    {
 $data = array('id' => $this->input->post('id',TRUE),
    'cabang_kantor' => $this->input->post('cabang_kantor',TRUE),
);
    $this->Kantor_bank_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('sukses', 'Update Record Success');
            redirect(base_url('admin/kantor_bank'));
    }
}