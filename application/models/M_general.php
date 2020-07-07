<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_general extends CI_Model{
    public function GetData($table){
        $query = $this->db->get($table);
        return $query;
    }

    public function GetDataById($table, $where, $id){
        $this->db->where($where,$id);
        $query = $this->db->get($table);
        return $query;
    }

    public function GetDataByWhere($table, $where, $id){
        $row = $this->db->where($where,$id)->limit(1)->get($table);
        return $row;
    }

    public function checkExisting($table, $where, $valueWhere){
        // $row = $this->db->where($where,$valueWhere)->limit(1)->get($table);
        // return $row;
        // $this->db->select('count(*) AS count_rows');
        // $this->db->from($table);
        // $this->db->where($where,$valueWhere);
        // $query = $this->db->get();
        // // $number = $query->num_rows();
        // return $query;
        $query = $this->db->query("SELECT count(id) as count_rows FROM $table WHERE $where = '$valueWhere'")->row();
        return $query;
    }
 
    public function Insert($table,$data){
        $query = $this->db->insert($table, $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $query; // Kode ini digunakan untuk mengembalikan hasil $query
    }
 
    public function Update($table, $data, $where, $id){
        $this->db->where($where,$id);
        $query = $this->db->update($table, $data); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        return $query;
    }
 
    public function Delete($table, $where, $id){
        $this->db->where($where,$id);
        $query = $this->db->delete($table);
        return $query;
    }

    public function GetId($table, $order){
        $this->db->order_by($order, 'asc');
        $query = $this->db->get($table);
        return $query;
    }

    public function GetCount($table){
        $this->db->select('count(*) AS count_rows');
        $this->db->from($table);
        $query = $this->db->get();
        // $number = $query->num_rows();
        return $query;
    }

    public function findImage($where,$id,$table)
    {
        // $this->db->select('');
        $row = $this->db->where($where,$id)->get($table);
        return $row;
    }

}
?>