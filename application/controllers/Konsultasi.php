<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('STDCRUD'));
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = "Konsultasi";
    $data['header'] = "Biodata";
    $data['subheader'] = "Silahkan mengisi biodata anda";
    $data['gejala'] = $this->STDCRUD->getAll('tb_gejala')->result();
    $konten['konten'] = $this->load->view('Konsultasi', $data, TRUE);
    $this->load->view('MenuFrontEnd', $konten);
  }

}

 ?>
