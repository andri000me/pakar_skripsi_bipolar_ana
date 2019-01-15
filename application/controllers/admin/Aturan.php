<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aturan extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));

        $this->load->library('session');
        if (empty($this->session->userdata('login'))) {
            redirect(site_url('admin/login'));
        }

        $this->load->model('Aturan_model', 'mod_aturan', TRUE);
        $this->load->model('Gejala_model', 'gejala_model', TRUE);
        $this->load->model('Penyakit_model', 'penyakit_model', TRUE);

    }

    public function index()
    {
        $listAll = $this->mod_aturan->get_all();

        $data['list_data'] = $listAll;
        $data['title'] = 'Data Aturan';
        $tmp['contents'] = $this->load->view('admin/aturan/index', $data, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function create()
    {

        $data = $this->mod_aturan->get_all();
        $kode = array();

        if ($data) {
            foreach ($data as $value) {
                array_push($kode, substr($value->id_aturan, 2, 4));
            }

            $maxkode = max($kode);

            $k = $maxkode+1;
            if ($k == 1) {
                $kode1 = "AT01";
            }else{
                if (((int) $maxkode + 1) < 10) {
                    $kode1 = "AT0".$k;
                } else {
                    $kode1 = "AT".$k;
                }
            } 
        } else {
            $kode1 = "AT01";
        }

        $data = array(
            'button' => 'Tambah',
            'action' => site_url('admin/aturan/create_action'),
            'id_gejala' => set_value('id_gejala'),
            'id_penyakit' => set_value('id_penyakit'),
            'id_aturan' => $kode1,
            'dt_gejala' => $this->gejala_model->get_all(),
            'dt_penyakit' => $this->penyakit_model->get_all(),
        );

        $data['title'] = 'Data Aturan';
        $data['subtitle'] = 'Tambah';
        $tmp['contents'] = $this->load->view('admin/aturan/form', $data, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            // cek id gejala sudah ada apa belum
            $dataaturan = $this->mod_aturan->get_all();
            $cekid = false;

            for ($i=0; $i < sizeof($dataaturan); $i++) {
                if ($dataaturan[$i]->id_aturan == $this->input->post('id_aturan')) {
                    $cekid = TRUE;
                }
            }

            if ($cekid) {
                $this->session->set_flashdata('message', ['warning', 'Maaf ID Aturan <b>'.$this->input->post('id_aturan').'</b> tidak tersedia!']);
                redirect(site_url('admin/aturan/create'));
            }

            $data = array(
                'id_aturan' => $this->input->post('id_aturan',TRUE),
                'id_penyakit' => $this->input->post('id_penyakit',TRUE),
                'id_gejala' => $this->input->post('id_gejala',TRUE),
            );

            $this->mod_aturan->insert($data);
            $this->session->set_flashdata('message', ['success', 'Data Berhasil Ditambahkan']);
            redirect(site_url('admin/aturan'));
        }
    }

    public function update($id)
    {
        $row = $this->mod_aturan->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('admin/aturan/update_action'),
                'id_aturan' => $row->id_aturan,
                'id_gejala' => $row->id_gejala,
                'id_penyakit' => $row->id_penyakit,
                'dt_gejala' => $this->gejala_model->get_all(),
                'dt_penyakit' => $this->penyakit_model->get_all(),
            );

            $data['title'] = 'Data Aturan';
            $data['subtitle'] = 'Edit';
            $tmp['contents'] = $this->load->view('admin/aturan/form', $data, TRUE);
            $this->load->view('admin/layout/template', $tmp);

        } else {
            $this->session->set_flashdata('message', ['warning', 'Data Tidak Ditemukan']);
            redirect(site_url('admin/aturan'));
        }

    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_aturan', TRUE));
        } else {

            $data = array(
                'id_gejala' => $this->input->post('id_gejala',TRUE),
                'id_penyakit' => $this->input->post('id_penyakit',TRUE),
            );

            $this->mod_aturan->update($this->input->post('id_aturan', TRUE), $data);
            $this->session->set_flashdata('message', ['success', 'Update Data Berhasil']);
            redirect(site_url('admin/aturan'));
        }
    }

    public function delete($id)
    {
        $row = $this->mod_aturan->get_by_id($id);

        if ($row) {
            $this->mod_aturan->delete($id);
            $this->session->set_flashdata('message', ['success', 'Data Berhasil Dihapus ']);
            redirect(site_url('admin/aturan'));
        } else {
            $this->session->set_flashdata('message', ['warning', 'Data Tidak Ditemukan']);
            redirect(site_url('admin/aturan'));
        }
    }

    public function _rules()
    {

        $this->form_validation->set_rules('id_aturan', 'Kode Aturan', 'trim|required');
        $this->form_validation->set_rules('id_gejala', 'Nama Gejala', 'trim|required');
        $this->form_validation->set_rules('id_penyakit', 'Nama Penyakit', 'trim|required');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
