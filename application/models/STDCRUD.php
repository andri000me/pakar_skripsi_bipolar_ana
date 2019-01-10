<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class STDCRUD extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function getAll($table)
  {
    $data = $this->db->get($table);
    return $data;
  }

}
