<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gejala extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));

        $this->load->library('session');
        if (empty($this->session->userdata('login'))) {
            redirect(site_url('admin/login'));
        }
        
        $this->load->model('Gejala_model', 'mod_gejala', TRUE);
    }

    public function index()
    {
        $listAll = $this->mod_gejala->get_all();

        $data['list_data'] = $listAll;
        $data['title'] = 'Data Gejala';
        $tmp['contents'] = $this->load->view('admin/gejala/index', $data, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function create()
    {

        $data = $this->mod_gejala->get_all();
        $kode = array();

        if ($data) {
            foreach ($data as $value) {
                array_push($kode, substr($value->id_gejala, 2, 4));
            }

            $maxkode = max($kode);

            $k = $maxkode+1;
            if ($k == 1) {
                $kode1 = "GE01";
            }else{
                if (((int) $maxkode + 1) < 10) {
                    $kode1 = "GE0".$k;
                } else {
                    $kode1 = "GE".$k;
                }
            } 
        } else {
            $kode1 = "GE01";
        }

        $data = array(
            'button' => 'Tambah',
            'action' => site_url('admin/gejala/create_action'),
            'nama_gejala' => set_value('nama_gejala'),
            'pertanyaan' => set_value('pertanyaan'),
            'fase_gejala' => set_value('fase_gejala'),
            'bobot_gejala' => set_value('bobot_gejala'),
            'id_gejala' => $kode1,
        );

        $data['title'] = 'Data Gejala';
        $data['subtitle'] = 'Tambah';
        $tmp['contents'] = $this->load->view('admin/gejala/form', $data, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            // cek id gejala sudah ada apa belum
            $datagejala = $this->mod_gejala->get_all();
            $cekid = false;

            for ($i=0; $i < sizeof($datagejala); $i++) {
                if ($datagejala[$i]->id_gejala == $this->input->post('id_gejala')) {
                    $cekid = TRUE;
                }
            }

            if ($cekid) {
                $this->session->set_flashdata('message', ['warning', 'Maaf ID Gejala <b>'.$this->input->post('id_gejala').'</b> tidak tersedia!']);
                redirect(site_url('admin/gejala/create'));
            }

            $data = array(
                'id_gejala' => $this->input->post('id_gejala',TRUE),
                'nama_gejala' => $this->input->post('nama_gejala',TRUE),
                'pertanyaan' => $this->input->post('pertanyaan',TRUE),
                'fase_gejala' => $this->input->post('fase_gejala',TRUE),
                'bobot_gejala' => $this->input->post('bobot_gejala',TRUE),
            );

            $this->mod_gejala->insert($data);
            $this->session->set_flashdata('message', ['success', 'Data Berhasil Ditambahkan']);
            redirect(site_url('admin/gejala'));
        }
    }

    public function update($id)
    {
        $row = $this->mod_gejala->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('admin/gejala/update_action'),
                'id_gejala' => $row->id_gejala,
                'fase_gejala' => $row->fase_gejala,
                'bobot_gejala' => $row->bobot_gejala,
                'nama_gejala' => $row->nama_gejala,
                'pertanyaan' => $row->pertanyaan,
            );

            $data['title'] = 'Data Gejala';
            $data['subtitle'] = 'Edit';
            $tmp['contents'] = $this->load->view('admin/gejala/form', $data, TRUE);
            $this->load->view('admin/layout/template', $tmp);

        } else {
            $this->session->set_flashdata('message', ['warning', 'Data Tidak Ditemukan']);
            redirect(site_url('admin/gejala'));
        }

    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_gejala', TRUE));
        } else {

            $data = array(
                'nama_gejala' => $this->input->post('nama_gejala',TRUE),
                'pertanyaan' => $this->input->post('pertanyaan',TRUE),
                'fase_gejala' => $this->input->post('fase_gejala',TRUE),
                'bobot_gejala' => $this->input->post('bobot_gejala',TRUE),
            );

            $this->mod_gejala->update($this->input->post('id_gejala', TRUE), $data);
            $this->session->set_flashdata('message', ['success', 'Update Data Berhasil']);
            redirect(site_url('admin/gejala'));
        }
    }

    public function delete($id)
    {
        $row = $this->mod_gejala->get_by_id($id);

        if ($row) {
            $this->mod_gejala->delete($id);
            $this->session->set_flashdata('message', ['success', 'Data Berhasil Dihapus ']);
            redirect(site_url('admin/gejala'));
        } else {
            $this->session->set_flashdata('message', ['warning', 'Data Tidak Ditemukan']);
            redirect(site_url('admin/gejala'));
        }
    }

    public function _rules()
    {

        $this->form_validation->set_rules('id_gejala', 'Kode Gejala', 'trim|required');
        $this->form_validation->set_rules('nama_gejala', 'Nama Gejala', 'trim|required');
        $this->form_validation->set_rules('pertanyaan', 'Kalimat Pertanyaan Gejala', 'trim|required');
        $this->form_validation->set_rules('fase_gejala', 'Fase Gejala', 'trim|required');
        $this->form_validation->set_rules('bobot_gejala', 'Bobot Gejala', 'trim|required');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
