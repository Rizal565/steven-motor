<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class ModelTransaksi extends CI_Model
{
    public function simpanTransaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }

    public function selectData($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function updateData($data, $where)
    {
        $this->db->update('transaksi', $data, $where);
    }

    public function deleteData($table, $where)
    {
        $this->db->delete($table, $where);
    }

    public function joinData()
    {
        $this->db->select('
        transaksi.no_transaksi, transaksi.tgl_transaksi, transaksi.id_user, transaksi.tgl_pengambilan, transaksi.status, transaksi.total_harga,
        GROUP_CONCAT(detail_transaksi.id_barang SEPARATOR ", ") as id_barang
    ');
        $this->db->from('transaksi');
        $this->db->join('detail_transaksi', 'detail_transaksi.no_transaksi = transaksi.no_transaksi', 'right');
        $this->db->group_by('transaksi.no_transaksi');
        return $this->db->get()->result_array();
    }
    public function getTransaksiByUser($user_id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_user', $user_id);
        return $this->db->get()->result_array();
    }


    public function simpanDetail($idpesan, $notransaksi)
    {
        $sql = "INSERT INTO detail_transaksi (no_transaksi, id_barang)
                SELECT '$notransaksi', id_barang
                FROM pesan_detail
                WHERE id_pesan = $idpesan";
        $this->db->query($sql);
    }

    public function getTotalHarga($id_pesan)
    {
        $this->db->select('total_harga');
        $this->db->from('pesan');
        $this->db->where('id_pesan', $id_pesan);
        return $this->db->get()->row()->total_harga;
    }
}
