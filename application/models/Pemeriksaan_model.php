<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pemeriksaan_model extends CI_Model
{

    public $table = 'tb_diagnosa';
    public $id = 'id_diagnosa';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $this->db->select('tb_diagnosa.*, tb_pasien.nama_pasien, tb_user.nama_user, tb_user.level');
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien = tb_diagnosa.id_pasien');
        $this->db->join('tb_user', 'tb_user.id_user = tb_diagnosa.id_user');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    public function get_data() {
        $query = $this->db->get('tb_diagnosa');
        return $query->result();
    }


    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    function get_last_id()
    {
        $this->db->select_max($this->id);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->row();
    }
    // get total rows
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit
    function index_limit($limit, $start = 0) {
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('id_diagnosa', $keyword);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_diagnosa', $keyword);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);

    }

    function cekGejalaExist($id,$idg){
        $this->db->select('*');
        $this->db->from('tb_cek_diagnosa');
        $this->db->where('id_diagnosa', $id);
        $this->db->where('id_gejala', $idg);
        return $this->db->get();
    }

}
