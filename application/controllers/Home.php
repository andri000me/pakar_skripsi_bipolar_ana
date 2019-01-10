<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = "Home";
    $konten['konten'] = $this->load->view('home', $data, TRUE);
    $this->load->view('MenuFrontEnd', $konten);
  }

}
