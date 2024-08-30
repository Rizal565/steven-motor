<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_user();
        $this->load->model('ModelUser');
        $this->load->model('ModelTransaksi');
        $this->load->model('ModelPesan');
    }




    
    public function index()
    {
        $data['judul'] = "Data Transaksi";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->ModelTransaksi->joinData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/data-transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function daftarPesan()
    {
        $data['judul'] = "Daftar Pesan";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->db->query("SELECT * FROM pesan")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesan/daftar-pesan', $data);
        $this->load->view('templates/footer');
    }

    public function pesanDetail()
    {
        $id_pesan = $this->uri->segment(3);
        $data['judul'] = "Pesan Detail";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['agt_pesan'] = $this->db->query("SELECT * FROM pesan p, user u WHERE p.id_user=u.id AND p.id_pesan='$id_pesan'")->result_array();
        $data['detail'] = $this->db->query("SELECT id_barang, nama_barang, harga, warna, berat FROM pesan_detail d, barang b WHERE d.id_barang=b.id AND d.id_pesan='$id_pesan'")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesan/pesan-detail', $data);
        $this->load->view('templates/footer');
    }

    public function transaksiAct()
    {
        $id_pesan = $this->uri->segment(3);
        $lama = $this->input->post('lama', TRUE);
        $pe = $this->db->query("SELECT * FROM pesan WHERE id_pesan='$id_pesan'")->row();
        $tglsekarang = date('Y-m-d');
        $no_transaksi = $this->ModelPesan->kodeOtoomatis('transaksi', 'no_transaksi');
        $total_harga = $this->ModelTransaksi->getTotalHarga($id_pesan);

        $datapesan = [
            'no_transaksi' => $no_transaksi,
            'id_pesan' => $id_pesan,
            'tgl_transaksi' => $tglsekarang,
            'id_user' => $pe->id_user,
            'tgl_pengambilan' => '0000-00-00',
            'status' => 'belum diambil',
            'total_harga' => $total_harga
        ];
        $this->ModelTransaksi->simpanTransaksi($datapesan);
        $this->ModelTransaksi->simpanDetail($id_pesan, $no_transaksi);

        // Hapus Data pesan yang barangnya diambil untuk ditransaksi
        $this->ModelTransaksi->deleteData('pesan', ['id_pesan' => $id_pesan]);
        $this->ModelTransaksi->deleteData('pesan_detail', ['id_pesan' => $id_pesan]);
        // Update di pesan dan di transaksi pada tabel barang saat barang yang dipesan diambil untuk ditransaksi
        $this->session->set_flashdata('pesan', '<div class="alert alertmessage alert-success" role="alert">Bukti pembayaran sudah di konfimasi</div>');
        redirect(base_url('transaksi'));
    }

    public function ubahStatus()
    {
        $no_transaksi = $this->uri->segment(3);
        $tgl = date('Y-m-d');
        $status = 'diambil';

        // Update status menjadi 'diambil' pada transaksi dan memperbarui tanggal pengambilan
        $this->db->query("UPDATE transaksi 
                        SET status='$status', tgl_pengambilan='$tgl' 
                        WHERE no_transaksi='$no_transaksi'");

        // Update jumlah barang yang ditransaksi dan dipesan
        $this->db->query("UPDATE barang 
                        JOIN detail_transaksi ON barang.id = detail_transaksi.id_barang 
                        JOIN transaksi ON transaksi.no_transaksi = detail_transaksi.no_transaksi 
                        SET barang.ditransaksi = barang.ditransaksi + 1, 
                            barang.dipesan = barang.dipesan - 1 
                        WHERE transaksi.no_transaksi = '$no_transaksi'");

        $this->session->set_flashdata('pesan', '<div class="alert alertmessage alert-success" role="alert">Status Berhasil Diubah</div>');
        redirect(base_url('transaksi'));
    }



}
