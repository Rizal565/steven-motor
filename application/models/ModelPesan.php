<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class ModelPesan extends CI_Model
{
    public function getData($table)
    {
        return $this->db->get($table)->row();
    }
    public function getDataWhere($table, $where)
    {
        $this->db->where($where);
        return $this->db->get($table);
    }
    public function getOrderByLimit($table, $order, $limit)
    {
        $this->db->order_by($order, 'desc');
        $this->db->limit($limit);
        return $this->db->get($table);
    }
    public function joinOrder($where)

    {
        $this->db->select('*');
        $this->db->from('pesan p');
        $this->db->join('pesan_detail d', 'd.id_pesan=p.id_pesan');
        $this->db->join('barang ba ', 'ba.id=d.id_barang');
        $this->db->where($where);
        return $this->db->get();
    }
    public function simpanDetail($where = null)
    {
        $sql = "INSERT INTO pesan_detail (id_pesan,id_barang) SELECT pesan.id_pesan,keranjang.id_barang FROM pesan, keranjang WHERE keranjang.id_user=pesan.id_user AND pesan.id_user='$where'";
        $this->db->query($sql);
    }
    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    public function deleteData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getPesananByUser($user_id)
    {
        $this->db->select('*');
        $this->db->from('pesan');
        $this->db->where('id_user', $user_id);
        return $this->db->get()->result_array();
    }

    public function find($where)
    {
        //Query mencari record berdasarkan ID-nya
        $this->db->limit(1);
        return $this->db->get('barang', $where);
    }
    public function kosongkanData($table)
    {
        return $this->db->truncate($table);
    }
    public function createKeranjang()
    {
        $this->db->query('CREATE TABLE IF NOT EXISTS keranjang(
            id INT AUTO_INCREMENT PRIMARY KEY,
            tgl_pesan DATETIME DEFAULT NULL,
            id_user VARCHAR(12) NOT NULL,
            email_user VARCHAR(128) DEFAULT NULL,
            id_barang INT,
            nama_barang VARCHAR(255) NOT NULL,
            image VARCHAR(255),
            harga INT,
            warna VARCHAR(50),
            berat INT
        )');
    }
    public function selectJoin()
    {
        $this->db->select('*');
        $this->db->from('pesan');
        $this->db->join('pesan_detail', 'pesan_detail.id_pesan=pesan.id_pesan');
        $this->db->join('barang', 'pesan_detail.id_barang=barang.id');
        return $this->db->get();
    }
    public function showkeranjang($where)
    {
        return $this->db->get('keranjang', $where);
    }
    public function kodeOtomatis($tabel, $key)
    {
        // Generate unique transaction ID (assuming $key is 'id_transaksi')
        $this->db->select('right(' . $key . ',3) as kode', false);
        $this->db->order_by($key, 'desc');
        $this->db->limit(1);
        $query = $this->db->get($tabel);

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        // Generate transaction code combining date and part of transaction ID
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = date('dmY') . $kodemax;
        return $kodejadi;
    }
    public function kodeOtoomatis($tabel, $key)
{
    // Generate unique transaction ID combining date, time, and a random number
    $date = date('dmYHis'); // Current date and time
    $randomNumber = rand(1000, 9999); // Random number

    $kodejadi = $date . $randomNumber;
    return $kodejadi;
}

}
