<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));

        $this->load->library('session');
        if (empty($this->session->userdata('login'))) {
            redirect(site_url('admin/login'));
        }
        
        $this->load->model('user_model', 'mod_user', TRUE);
        
        //if ($this->session->userdata('login')['level'] <> 'admin') {
         //   show_404();
        //}
    }

    public function index()
    {
        $user = $this->mod_user->get_all();
        $this->session->userdata('login')['username'];

        $data['user_data'] = $user;
        $data['title'] = 'Data User';
        $tmp['contents'] = $this->load->view('admin/user/index', $data, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function create() 
    {

        $data = array(
            'button' => 'Tambah',
            'action' => site_url('admin/user/create_action'),
            'id_user' => set_value('id_user'),
            'nama_user' => set_value('nama_user'),
            'password' => set_value('password'),
            'level' => set_value('level'),
            'dt_level'=> ($this->session->userdata('login')['level'] == 'admin') ? array("admin", "operator") : array("operator"),  

            'user'=> $this->session->userdata('login')['username'],
        );

        $data['title'] = 'Data User';
        $data['subtitle'] = 'Tambah';
        $tmp['contents'] = $this->load->view('admin/user/form', $data, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            // cek id_user sudah ada apa belum 
            $datauser = $this->mod_user->get_all();
            $cekid = false;

            for ($i=0; $i < sizeof($datauser); $i++) { 
                if ($datauser[$i]->id_user == $this->input->post('id_user')) {
                    $cekid = TRUE;
                }
            }

            if ($cekid) {
                 $this->session->set_flashdata('message', ['warning', 'Maaf ID user <b>'.$this->input->post('id_user').'</b> tidak tersedia!']);
                redirect(site_url('admin/user/create'));
            }

            $data = array(
                'id_user' => $this->input->post('id_user', TRUE),
                'nama_user' => $this->input->post('nama_user',TRUE),
                'password' => md5($this->input->post('password',TRUE)),
                'level' => $this->input->post('level',TRUE),
            );

            $this->mod_user->insert($data);
            $this->session->set_flashdata('message', ['success', 'Data Berhasil Ditambahkan']);
            redirect(site_url('admin/user'));
        }
    }

    public function update($id) 
    {
        $row = $this->mod_user->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('admin/user/update_action'),
                'id_user' => $row->id_user,
                'nama_user' => $row->nama_user,
                'level' => $row->level,

                'dt_level'=> ($this->session->userdata('login')['level'] == 'admin') ? array("admin", "operator") : array("operator"), 
            );
            
            $data['title'] = 'Data User';
            $data['subtitle'] = 'Edit';
             $tmp['contents'] = $this->load->view('admin/user/form', $data, TRUE);
            $this->load->view('admin/layout/template', $tmp);

        } else {
            $this->session->set_flashdata('message', ['warning', 'Data Tidak Ditemukan']);
            redirect(site_url('admin/user'));
        }

    }

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {

            $data = array(
                'nama_user' => $this->input->post('nama_user',TRUE),
                'level' => $this->input->post('level',TRUE),
            );

            if (!empty($this->input->post('password'))) {
                $data = array(
                    'nama_user' => $this->input->post('nama_user',TRUE),
                    'password' => md5($this->input->post('password',TRUE)),
                    'level' => $this->input->post('level',TRUE),
                );
            }

            $this->mod_user->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', ['success', 'Update Data Berhasil']);
            redirect(site_url('admin/user'));
        }
    }

    public function delete($id) 
    {
        $row = $this->mod_user->get_by_id($id);

        if ($row) {
            $this->mod_user->delete($id);
            $this->session->set_flashdata('message', ['success', 'Data Berhasil Dihapus ']);
            redirect(site_url('admin/user'));
        } else {
            $this->session->set_flashdata('message', ['warning', 'Data Tidak Ditemukan']);
            redirect(site_url('admin/user'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id_user', ' ', 'trim|required');
        $this->form_validation->set_rules('nama_user', ' ', 'trim|required');
        $this->form_validation->set_rules('level', ' ', 'trim|required');

        if(!empty($_POST['password'])) {
            $this->form_validation->set_rules('password', ' ', 'trim|min_length[5]|required');
            $this->form_validation->set_rules('password_confirm', ' ', 'trim|required|min_length[5]|matches[password]');
        }       

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

