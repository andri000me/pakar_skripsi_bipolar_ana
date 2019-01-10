<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penyakit extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        
        $this->load->library('session');
        if (empty($this->session->userdata('login'))) {
            redirect(site_url('admin/login'));
        }

        $this->load->model('Penyakit_model', 'mod_penyakit', TRUE);
        
    }

    public function index()
    {
        $listAll = $this->mod_penyakit->get_all();

        $data['list_data'] = $listAll;
        $data['title'] = 'Data Penyakit';
        $tmp['contents'] = $this->load->view('admin/penyakit/index', $data, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function create() 
    {

        $data = $this->mod_penyakit->get_all();
        $kode = array();

        if ($data) {
            foreach ($data as $value) {
                array_push($kode, substr($value->id_penyakit, 2, 4));
            }

            $maxkode = max($kode);

            $k = $maxkode+1;
            if ($k == 1) {
                $kode1 = "PE01";
            }else{
                if (((int) $maxkode + 1) < 10) {
                    $kode1 = "PE0".$k;
                } else {
                    $kode1 = "PE".$k;
                }
            } 
        } else {
            $kode1 = "PE01";
        }

        $data = array(
            'button' => 'Tambah',
            'action' => site_url('admin/penyakit/create_action'),
            'id_penyakit' => set_value('id_penyakit'),
            'nama_penyakit' => set_value('nama_penyakit'),
            'id_penyakit' => $kode1,  
        );

        $data['title'] = 'Data Penyakit';
        $data['subtitle'] = 'Tambah';
        $tmp['contents'] = $this->load->view('admin/penyakit/form', $data, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            // cek id_penyakit sudah ada apa belum 
            $datapenyakit = $this->mod_penyakit->get_all();
            $cekid = false;

            for ($i=0; $i < sizeof($datapenyakit); $i++) { 
                if ($datapenyakit[$i]->id_penyakit == $this->input->post('id_penyakit')) {
                    $cekid = TRUE;
                }
            }

            if ($cekid) {
                $this->session->set_flashdata('message', ['warning', 'Maaf ID Penyakit <b>'.$this->input->post('id_penyakit').'</b> tidak tersedia!']);
                redirect(site_url('admin/penyakit/create'));
            }

            $data = array(
                'id_penyakit' => $this->input->post('id_penyakit', TRUE),
                'nama_penyakit' => $this->input->post('nama_penyakit',TRUE),
            );

            $this->mod_penyakit->insert($data);
            $this->session->set_flashdata('message', ['success', 'Data Berhasil Ditambahkan']);
            redirect(site_url('admin/penyakit'));
        }
    }

    public function update($id) 
    {
        $row = $this->mod_penyakit->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('admin/penyakit/update_action'),
                'id_penyakit' => $row->id_penyakit,
                'nama_penyakit' => $row->nama_penyakit,
            );
            
            $data['title'] = 'Data Penyakit';
            $data['subtitle'] = 'Edit';
            $tmp['contents'] = $this->load->view('admin/penyakit/form', $data, TRUE);
            $this->load->view('admin/layout/template', $tmp);

        } else {
            $this->session->set_flashdata('message', ['warning', 'Data Tidak Ditemukan']);
            redirect(site_url('admin/penyakit'));
        }

    }

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penyakit', TRUE));
        } else {

            $data = array(
                'nama_penyakit' => $this->input->post('nama_penyakit',TRUE),
                // 'bobot_penyakit' => $this->input->post('bobot_penyakit',TRUE),
            );

            $this->mod_penyakit->update($this->input->post('id_penyakit', TRUE), $data);
            $this->session->set_flashdata('message', ['success', 'Update Data Berhasil']);
            redirect(site_url('admin/penyakit'));
        }
    }

    public function delete($id) 
    {
        $row = $this->mod_penyakit->get_by_id($id);

        if ($row) {
            $this->mod_penyakit->delete($id);
            $this->session->set_flashdata('message', ['success', 'Data Berhasil Dihapus ']);
            redirect(site_url('admin/penyakit'));
        } else {
            $this->session->set_flashdata('message', ['warning', 'Data Tidak Ditemukan']);
            redirect(site_url('admin/penyakit'));
        }
    }

    public function _rules() 
    {

        $this->form_validation->set_rules('nama_penyakit', ' ', 'trim|required');
        // $this->form_validation->set_rules('bobot_penyakit', ' ', 'trim|numeric|required');    

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

