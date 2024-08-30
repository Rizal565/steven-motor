<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PesananSaya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model(['ModelPesan', 'ModelTransaksi', 'ModelUser']);
    }

    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $id_user = $this->session->userdata('id_user');
    
        // Fetch user details
        $data['useraktif'] = $this->ModelUser->cekData(['id' => $id_user])->row_array();
    
        // Check if there are orders in the pesan table
        $data['pesan'] = $this->ModelPesan->getDataWhere('pesan', ['id_user' => $id_user])->result();
    
        // Check if there are transactions in the transaksi table
        $data['transaksi'] = $this->ModelTransaksi->selectData('transaksi', ['id_user' => $id_user])->result();
    
        $data['judul'] = "Pesanan Saya";
    
        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('pesanan_saya/index', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }
    

    public function delete_pesan($id_pesan)
    {
        // Mengupdate stok dan dipesan di tabel barang saat proses keranjang diselesaikan
        $this->db->query("UPDATE barang 
            JOIN pesan_detail ON barang.id = pesan_detail.id_barang 
            SET barang.dipesan = barang.dipesan - 1, barang.stok = barang.stok + 1 
            WHERE pesan_detail.id_pesan = '$id_pesan'");

        // Delete the order and its details
        $this->ModelTransaksi->deleteData('pesan', ['id_pesan' => $id_pesan]);
        $this->ModelTransaksi->deleteData('pesan_detail', ['id_pesan' => $id_pesan]);

        // Redirect back to the order page with a success message
        $this->session->set_flashdata('message', '<div class="alert alert-success">Pesanan berhasil dihapus.</div>');
        redirect('pesananSaya');
    }
}
