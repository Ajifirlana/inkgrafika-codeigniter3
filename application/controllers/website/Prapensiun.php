<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prapensiun extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Prapen_model');
        $this->load->library('form_validation');
    }
	public function tambahdata_cus_prapen()
	{
		$nama_lengkap = htmlspecialchars($this->input->post('nama_lengkap'));
		$alamat = htmlspecialchars($this->input->post('alamat'));
		$jenis_pinjaman =htmlspecialchars($this->input->post('jenis_pinjaman'));
		$keterangan =  htmlspecialchars($this->input->post('keterangan'));
		$no_hp = htmlspecialchars($this->input->post('no_hp'));
		$tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir'));

		$gaji_saat_ini = htmlspecialchars($this->input->post('gaji_saat_ini'));
		$jangka_pinjam_max = $this->input->post('jangka_pinjam_max');
		$data  = array('nama_lengkap' =>$nama_lengkap,'alamat' =>$alamat ,'jenis_pinjaman' =>$jenis_pinjaman ,'keterangan' =>$keterangan ,
		'no_hp' =>$no_hp,'tgl_lahir' =>$tgl_lahir,'gaji_saat_ini' =>$gaji_saat_ini,'jangka_pinjam_max' =>$jangka_pinjam_max, );
		
		$this->Prapen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');

            redirect(base_url('/'));

	}
}
