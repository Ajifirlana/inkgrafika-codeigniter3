<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
 	function __construct()
    {
        parent::__construct();
        $this->load->model('Cabang_model');
        $this->load->model('Slider_model');
        $this->load->model('Testimoni_model');
        $this->load->model('Galeri_model');
        $this->load->model('Buletin_model');
        $this->load->model('Artikel_model');
        $this->load->model('Karir_model');
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
$slider = $this->Slider_model->get_all();

		$data = array(

            'cabang_data' => $cabang,
'testimoni'=> $this->Testimoni_model->get_all(),
'galeri'=> $this->Galeri_model->get_all(),
'buletin'=> $this->Buletin_model->get_all(),
'artikel'=> $this->Artikel_model->get_all(),
'karir'=> $this->Karir_model->get_all(),
            'slider' => $slider,
			'title' => 'Danapati Jaya Mandiri',
            'simulasi' => base_url('simulasi'),
		'action' => base_url('website/home/tambahdata_cus_aktif'),
        'actionprapen' => base_url('website/prapensiun/tambahdata_cus_prapen'),
		// 'detail' => base_url('website/artikel/artikel_detail'),
		);

		$this->load->view('website/home/home.php',$data);

	}


}
