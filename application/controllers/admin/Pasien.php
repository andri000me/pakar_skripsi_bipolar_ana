<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pasien extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));

        $this->load->library('session');
        if (empty($this->session->userdata('login'))) {
            redirect(site_url('admin/login'));
        }
        
        $this->load->model('pasien_model', 'mod_pasien', TRUE);
        
    }

    public function index()
    {
        $listAll = $this->mod_pasien->get_all();

        $data['list_data'] = $listAll;
        $data['title'] = 'Data Pasien';
        $tmp['contents'] = $this->load->view('admin/pasien/index', $data, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function create() 
    {

        $data = array(
            'button' => 'Tambah',
            'action' => site_url('admin/pasien/create_action'),
            'id_pasien' => set_value('id_pasien'),
            'nama_pasien' => set_value('nama_pasien'),
            'umur' => set_value('umur'),  
            'jenis_kelamin' => set_value('jenis_kelamin'),
        );

        $data['title'] = 'Data pasien';
        $data['subtitle'] = 'Tambah';
        $tmp['contents'] = $this->load->view('admin/pasien/form', $data, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            // cek id_pasien sudah ada apa belum 
            $datauser = $this->mod_pasien->get_all();
            $cekid = false;

            for ($i=0; $i < sizeof($datauser); $i++) { 
                if ($datauser[$i]->id_pasien == $this->input->post('id_pasien')) {
                    $cekid = TRUE;
                }
            }

            if ($cekid) {
                $this->session->set_flashdata('message', ['warning', 'Maaf ID pasien <b>'.$this->input->post('id_pasien').'</b> tidak tersedia!']);
                redirect(site_url('admin/pasien/create'));
            }

            $data = array(
                // 'id_pasien' => $this->input->post('id_pasien', TRUE),
                'nama_pasien' => $this->input->post('nama_pasien',TRUE),
                'umur' => $this->input->post('umur',TRUE),  
                'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
            );

            $this->mod_pasien->insert($data);
            $this->session->set_flashdata('message', ['success', 'Data Berhasil Ditambahkan']);
            redirect(site_url('admin/pasien'));
        }
    }

    public function update($id) 
    {
        $row = $this->mod_pasien->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('admin/pasien/update_action'),
                'id_pasien' => $row->id_pasien,
                'nama_pasien' => $row->nama_pasien,
                'umur' => $row->umur,  
                'jenis_kelamin' => $row->jenis_kelamin,
            );
            
            $data['title'] = 'Data pasien';
            $data['subtitle'] = 'Edit';
            $tmp['contents'] = $this->load->view('admin/pasien/form', $data, TRUE);
            $this->load->view('admin/layout/template', $tmp);

        } else {
            $this->session->set_flashdata('message', ['warning', 'Data Tidak Ditemukan']);
            redirect(site_url('admin/pasien'));
        }

    }

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pasien', TRUE));
        } else {

            $data = array(
                'nama_pasien' => $this->input->post('nama_pasien',TRUE),
                'umur' => $this->input->post('umur',TRUE),  
                'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
            );

            $this->mod_pasien->update($this->input->post('id_pasien', TRUE), $data);
            $this->session->set_flashdata('message', ['success', 'Update Data Berhasil']);
            redirect(site_url('admin/pasien'));
        }
    }

    public function delete($id) 
    {
        $row = $this->mod_pasien->get_by_id($id);

        if ($row) {
            $this->mod_pasien->delete($id);
            $this->session->set_flashdata('message', ['success', 'Data Berhasil Dihapus ']);
            redirect(site_url('admin/pasien'));
        } else {
            $this->session->set_flashdata('message', ['warning', 'Data Tidak Ditemukan']);
            redirect(site_url('admin/pasien'));
        }
    }

    public function _rules() 
    {

        $this->form_validation->set_rules('nama_pasien', ' ', 'trim|required');
        $this->form_validation->set_rules('umur', ' ', 'trim|numeric|required');
        $this->form_validation->set_rules('jenis_kelamin', ' ', 'trim|required');  

        $this->form_validation->set_error_delimiters('<span class="text-danger">gggggggggg', '</span>');
    }
}

