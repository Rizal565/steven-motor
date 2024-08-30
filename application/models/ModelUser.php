<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    // Inserts a new user into the 'user' table
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }

    // Checks if user data exists based on the provided condition
    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    // Retrieves user data based on the provided condition
    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    // Checks user access based on the provided condition
    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }

    // Retrieves a limited number of users (10 users) starting from the first record
    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10, 0);
        return $this->db->get();
    }

    // Joins 'barang' and 'kategori' tables based on the provided condition and retrieves the results
    public function joinKategoriBarang($where)
    {
        $this->db->select('barang.*, kategori.kategori');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }

    // Retrieves the user's name based on their ID
    public function getUserNameById($id_user)
    {
        $this->db->select('nama');
        $this->db->where('id', $id_user);
        $result = $this->db->get('user')->row();
        return $result ? $result->nama : 'Unknown';
    }
}
