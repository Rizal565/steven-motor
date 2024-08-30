<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBarang extends CI_Model
{
    // Manajemen barang
    public function getBarang()
    {
        $this->db->select('barang.*, kategori.kategori');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori', 'left');
        return $this->db->get();
    }

    public function barangWhere($where)
    {
        return $this->db->get_where('barang', $where);
    }

    public function simpanBarang($data = null)
    {
        $this->db->insert('barang', $data);
    }

    public function updateBarang($data = null, $where = null)
    {
        $this->db->update('barang', $data, $where);
    }

    public function hapusBarang($where = null)
    {
        $this->db->delete('barang', $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('barang');
        return $this->db->get()->row($field);
    }

    // Manajemen kategori
    public function getKategori()
    {
        return $this->db->get('kategori');
    }

    public function kategoriWhere($where)
    {
        return $this->db->get_where('kategori', $where);
    }

    public function simpanKategori($data = null)
    {
        $this->db->insert('kategori', $data);
    }

    public function hapusKategori($where = null)
    {
        $this->db->delete('kategori', $where);
    }

    public function updateKategori($where = null, $data = null)
    {
        $this->db->update('kategori', $data, $where);
    }

    // Join
    public function joinKategoriBarang($where)
    {
        $this->db->select('barang.*, kategori.kategori');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getLimitBarang()
    {
        $this->db->limit(5);
        return $this->db->get('barang');
    }
}
