<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();

        $this->load->helper(array('form', 'url'));

        $this->load->library('session');
        if (empty($this->session->userdata('login'))) {
            redirect(site_url('admin/login'));
        }

	}

	public function index()
	{
        $this->session->userdata('login')['username'];

        $data['title'] = 'Dashboard';
        $tmp['contents'] = $this->load->view('admin/dashboard/index', $data, TRUE);
        $this->load->view('admin/layout/template', $tmp);
	}
}
