<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inject_data_asabri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Injectasabri_model');

        $this->load->library('form_validation');
    }

    public function index()
    {
    	$start = intval($this->input->get('start'));
        
                $pns = $this->Injectasabri_model->get_all();

        $data = array( 
            'customer_data' => $pns ,
            'title'      =>'Inject Data ASABRI',
                        'start' => $start,

            'isi'        =>'admin/injectasabri/injectasabri_list',);

             $this->load->view('admin/layout/wrapper', $data, FALSE); 
 
    }


    function import()
    {
          $data = array( 'title'      =>'Inject Data ASABRI',
          	'isi'        =>'admin/injectasabri/injectasabri_import');
         $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }

    function update_multiple(){
        $id= $this->input->post('id');
$tgl_lapor = $this->input->post('tgl_lapor');
if($id == null || $tgl_lapor == null){

            $this->session->set_flashdata('notif', '<div class="alert alert-success">Tanggal dan Data Harus di pilih dahulu!</div>');
            //redirect halaman
            redirect('admin/inject_data_asabri');
}

$result = array();
         foreach ($id as $key => $val) {
            $result[] = array(
               'id' => $id[$key],
               'tgl_lapor' => $tgl_lapor              
            );
         }
              
         $this->db->update_batch('inject_data_asabri', $result, 'id');

            $this->session->set_flashdata('notif', '<div class="alert alert-success">Data berhasil di update!</div>');
            //redirect halaman
            redirect('admin/inject_data_asabri');
    }

    function proses_import()
    {

        $today = date('Y-m-d');
    	 error_reporting(0);
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '50000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
            //redirect halaman
            redirect('injectpns');
    }else{

             $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();

            $numrow = 1;
           
            foreach($sheet as $row){
                            if($numrow > 1){
                                array_push($data, array(

                                    'nopen'      => $row['A'],
                                    'jenis'      => $row['B'],
                                    'nip'      => $row['C'],
                                    'nama_pst'      => $row['D'],
                                    'lhr_pst'      => $row['E'],
                                    'penerima'      => $row['F'],
                                    'lhr_pnrm'      => $row['G'],
                                    'pangkat'      => $row['H'],
                                    'tmt_pensiun'      => $row['I'],
                                    'kode_jiwa'      => $row['J'],
                                    'penpok'      => $row['K'],
                                    'tunj_istri'      => $row['L'],
                                    'tunj_anak'      => $row['M'],
                                    'tpm'      => $row['N'],
                                    'tkd'      => $row['O'],
                                    'tpp'      => $row['P'],
                                    'tunj_cacat'      => $row['Q'],
                                    'tunj_khusus'      => $row['R'],
                                    'tunj_beras'      => $row['S'],
                                    'tunj_tewas'      => $row['T'],
                                    'pembulatan'      => $row['U'], 
                                    'pot_pajak'      => $row['V'], 
                                    'pot_askes'      => $row['W'], 
                                    'pot_lain2'      => $row['X'],
                                    'pot_kasda'      => $row['Y'],
                                    'pot_assos'      => $row['Z'],
                                    'sewa_rumah'      => $row['AA'],
                                    'jml_bersih'      => $row['AB'],
                                    'kantor_bayar'      => $row['AC'],
                                    'alamat'      => $row['AD'],
                                    'skep'      => $row['AE'],
                                    'tgl_sk'      => $row['AF'],
                                    'ktp_pst'      => $row['AG'],
                                    'agama_pst'      => $row['AH'],
                                    'sex_pst'      => $row['AI'],
                                    'tgl_nikah_pst'      => $row['AJ'],
                                    'tgl_lahir_anak1_pst'      => $row['AK'],
                                    'tgl_lahir_anak2_pst'      => $row['AL'],
                                    'tgl_lahir_anak3_pst'      => $row['AM'],
                                    'sex_anak1_pst'      => $row['AN'],
                                    'sex_anak2_pst'      => $row['AO'],
                                    'sex_anak3_pst'      => $row['AP'],
                                    'status_anak1_pst'      => $row['AQ'], 
                                    'status_anak2_pst'      => $row['AR'], 
                                    'status_anak3_pst'      => $row['AS'], 
                                    'status_pnrm'      => $row['AT'], 
                                    'ktp_pnrm'      => $row['AU'], 
                                    'tmp_lhr_pnrm'      => $row['AV'],
                                    'agama_pnrm'      => $row['AW'], 
                                    'sex_pnrm'      => $row['AX'],  
                                    'kelurahan_pnrm'      => $row['AY'],
                                    'kecamatan_pnrm'      => $row['AZ'],

                                    'kota_pnrm'      => $row['BA'],
                                    'kode_pos_pnrm'      => $row['BB'], 

                                    'telepon_pnrm'      => $row['BC'],
                                    'no_asabri'      => $row['BD'],
                                    'no_dapem'      => $row['BE'],
                                    'kd_instansi'      => $row['BF'],
                                    'kode_cabang'      => $row['BG'],
                                    'bulan_gaji'      => $row['BH'],
                                    'flag'      => $row['BI'],
                                    'usia'      => $row['BJ'],
                                    'user_cab'      => $row['BK'],
                                    'tmp_lhr_pst'      => $row['BL'],
                                    'user_verifikasi'      => $row['BM'], 
                                    'posisi'      => $row['BN'], 
                                    'tunj_pajak'      => $row['BO'],
                                    'status'      => $row['BP'],
                                    'no_dosir'      => $row['BQ'],
                                    'penerbit'      => $row['BR'],
                                    'nmdati1'      => $row['BS'],
                                    'nmdati2'      => $row['BT'],
                                    'tgl_lapor'      => $today, ));
                            }
                             $numrow++;
                        }
                        // var_dump(json_encode($data));
                        // exit();


     $this->db->insert_batch('inject_data_asabri', $data);

            unlink(realpath('excel/'.$data_upload['file_name']));

            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');

            redirect('admin/inject_data_asabri/import');
          }

    }
     

      public function delete($id) 
    {
        $row = $this->Injectasabri_model->get_by_id($id);

        if ($row) {
            $this->Injectasabri_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/inject_data_asabri'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/inject_data_asabri'));
        }
    }
    
    function delete_all(){

            $this->Injectpns_model->delete_all();

            $this->session->set_flashdata('message', 'berhasil Menghapus Data');
            redirect(base_url('admin/inject_data_asabri'));
    }
    


}