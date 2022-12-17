<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pensiunhebat extends CI_Controller {
 	function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->model('Slider_model');
        $this->load->model('Artikel_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $slider = $this->Slider_model->get_all();
    	$artikel = $this->Artikel_model->get_all();
    	$data = array(

            'slider' => $slider,
            'artikel' => $artikel,
			'title' => 'Danapati Jaya Mandiri'
		);

		$this->load->view('website/home/pensiunhebatt.php',$data);
    }
}