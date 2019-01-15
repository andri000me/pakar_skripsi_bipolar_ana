<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        date_default_timezone_set("Asia/Jakarta");

        $this->load->library('session');
        if (empty($this->session->userdata('login'))) {
            redirect(site_url('admin/login'));
        }

        $this->load->model('Pemeriksaan_model', 'mod_pemeriksaan', TRUE);
        $this->load->model('Pasien_model', 'pasien_model', TRUE);
        $this->load->model('Gejala_model', 'gejala_model', TRUE);

    }

    public function index()
    {
        $listAll = $this->mod_pemeriksaan->get_all();

        $data['list_data'] = $listAll;
        $data['title'] = 'Data Pemeriksaan';
        $tmp['contents'] = $this->load->view('admin/pemeriksaan/index', $data, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function create()
    {

        $data = $this->mod_pemeriksaan->get_all();

        $data = array(
            'button' => 'Tambah',
            'action' => site_url('admin/pemeriksaan/create_action'),
            'id_diagnosa' => set_value('id_diagnosa'),
            'tanggal' => date('Y-m-d H-i-s'),
            'id_pasien' => set_value('id_pasien'),
            'lama_keluhan' => set_value('lama_keluhan'),
            'id_user' => set_value('id_user'),
            'dt_pasien' => $this->pasien_model->get_all(),
            'dt_gejala' => $this->gejala_model->get_all(),
        );

        $data['title'] = 'Data Pemeriksaan';
        $data['subtitle'] = 'Tambah';
        $tmp['contents'] = $this->load->view('admin/pemeriksaan/form', $data, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            // cek id gejala sudah ada apa belum
            $dataaturan = $this->mod_pemeriksaan->get_all();
            $cekid = false;
            if ($dataaturan[$i]->id_diagnosa == $this->input->post('id_diagnosa')) {

                for ($i=0; $i < sizeof($dataaturan); $i++) {
                    $cekid = TRUE;
                }
            }
            $this->session->set_flashdata('message', ['warning', 'Maaf ID Pemeriksaan <b>'.$this->input->post('id_diagnosa').'</b> tidak tersedia!']);

            if ($cekid) {
                redirect(site_url('admin/pemeriksaan/create'));
            }
            // 'id_diagnosa' => $this->input->post('id_diagnosa',TRUE),

            $data = array(
                'tanggal' => $this->input->post('id_penyakit',TRUE),
                'id_pasien' => $this->input->post('id_gejala',TRUE),
                'lama_keluhan' => $this->input->post('id_gejala',TRUE),
                'id_user' => $this->session->userdata('login')['id_user'],
            );

            $this->mod_pemeriksaan->insert($data);
            $this->session->set_flashdata('message', ['success', 'Data Berhasil Ditambahkan']);
            redirect(site_url('admin/pemeriksaan'));
        }
    }

    public function update($id)
    {
        $row = $this->mod_pemeriksaan->get_by_id($id);

        if ($row) {
            $data = array(
                'id_diagnosa' => $row->id_diagnosa,
                'button' => 'Edit',
                'action' => site_url('admin/pemeriksaan/update_action'),
                'id_diagnosa' => $row->id_diagnosa,
                'tanggal' => $row->tanggal,
                'id_pasien' => $row->id_pasien,
                'lama_keluhan' => $row->lama_keluhan,
                'id_user' => $row->id_user,
                'dt_pasien' => $this->pasien_model->get_all(),
                'dt_gejala' => $this->gejala_model->get_all(),
            );

            $data['title'] = 'Data Pemeriksaan';
            $data['subtitle'] = 'Edit';
            $tmp['contents'] = $this->load->view('admin/pemeriksaan/form', $data, TRUE);
            $this->load->view('admin/layout/template', $tmp);

        } else {
            $this->session->set_flashdata('message', ['warning', 'Data Tidak Ditemukan']);
            redirect(site_url('admin/pemeriksaan'));
        }

    }

    public function update_action()
    {
        $this->_rules();
        $this->update($this->input->post('id_diagnosa', TRUE));

        if ($this->form_validation->run() == FALSE) {
        } else {

            $data = array(
                'tanggal' => $this->input->post('tanggal',TRUE),
                'id_pasien' => $this->input->post('id_pasien',TRUE),
                'lama_keluhan' => $this->input->post('lama_keluhan',TRUE),
                'id_user' => $this->session->userdata('login')['id_user'],
            );

            $this->mod_pemeriksaan->update($this->input->post('id_diagnosa', TRUE), $data);
            $this->session->set_flashdata('message', ['success', 'Update Data Berhasil']);
            redirect(site_url('admin/pemeriksaan'));
        }
    }

    public function delete($id)
    {
        $row = $this->mod_pemeriksaan->get_by_id($id);

        if ($row) {
            $this->mod_pemeriksaan->delete($id);
            $this->session->set_flashdata('message', ['success', 'Data Berhasil Dihapus ']);
            redirect(site_url('admin/pemeriksaan'));
        } else {
            $this->session->set_flashdata('message', ['warning', 'Data Tidak Ditemukan']);
            redirect(site_url('admin/pemeriksaan'));
        }
    }

    public function _rules()
    {

        $this->form_validation->set_rules('id_pasien', 'Nama Pasien', 'trim|required');
        $this->form_validation->set_rules('id_user', 'Nama User', 'trim|required');
        $this->form_validation->set_rules('lama_keluhan', 'Lama Keluhan Gejala', 'trim|required|numeric');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
