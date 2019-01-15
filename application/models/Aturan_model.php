<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aturan_model extends CI_Model
{

    public $table = 'tb_aturan';
    public $id = 'id_aturan';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $this->db->select('tb_aturan.id_aturan, tb_aturan.id_penyakit, tb_aturan.id_gejala, tb_gejala.nama_gejala, tb_penyakit.nama_penyakit, (SUBSTR(tb_aturan.id_aturan, 3, 4) * 1) AS sortcol');
        $this->db->join('tb_penyakit', 'tb_penyakit.id_penyakit = tb_aturan.id_penyakit');
        $this->db->join('tb_gejala', 'tb_gejala.id_gejala = tb_aturan.id_gejala');
        $this->db->order_by('sortcol', $this->order);
        return $this->db->get($this->table)->result();
    }

    public function get_data() {
        $query = $this->db->get('tb_aturan');
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
        $this->db->like('id_gejala', $keyword);
        $this->db->or_like('nama_gejala', $keyword);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_gejala', $keyword);
        $this->db->or_like('nama_gejala', $keyword);
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

}
