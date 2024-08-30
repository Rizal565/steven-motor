<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');
date_default_timezone_set('Asia/Jakarta');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model(['ModelPesan', 'ModelUser']);
    }

    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $id = ['p.id_user' => $this->uri->segment(3)];
        $id_user = $this->session->userdata('id_user');
        $data['pesan'] = $this->ModelPesan->joinOrder($id)->result();

        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        foreach ($user as $a) {
            $data = [
                'image' => $user['image'],
                'user' => $user['nama'],
                'email' => $user['email'],
                'tanggal_input' => $user['tanggal_input']
            ];
        }
        $dtb = $this->ModelPesan->showkeranjang(['id_user' => $id_user])->num_rows();

        if ($dtb < 1) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-massege alert-danger" role="alert">Tidak Ada Barang dikeranjang</div>');
            redirect(base_url() . 'Home');
        } else {
            $data['keranjang'] = $this->db->query("select id, image, nama_barang, harga, warna, berat,id_barang from keranjang where id_user='$id_user'")->result_array();
        }
        $data['judul'] = "Data Keranjang";

        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('pesan/data-pesan', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }
    public function tambahPesan()
    {
        $id_barang = $this->uri->segment(3);
        $id_user = $this->session->userdata('id_user');

        // Memilih data barang yang untuk dimasukkan ke tabel keranjang/pesan melalui variabel $isi 
        $d = $this->db->query("SELECT * FROM barang WHERE id='$id_barang'")->row();

        // Periksa stok barang
        if ($d->stok <= 0) {
            // Pesan ketika stok habis
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Stok barang ini sudah habis</div>');
            redirect(base_url() . 'home');
        }

        // Data yang akan disimpan ke dalam tabel keranjang/pesan 
        $isi = [
            'id_barang' => $id_barang,
            'nama_barang' => $d->nama_barang,
            'id_user' => $id_user,
            'email_user' => $this->session->userdata('email'),
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'image' => $d->image,
            'harga' => $d->harga,
            'warna' => $d->warna,
            'berat' => $d->berat,
        ];

        // Cek apakah barang yang diklik keranjang sudah ada di keranjang 
        $keranjang = $this->ModelPesan->getDataWhere('keranjang', ['id_barang' => $id_barang])->num_rows();

        // Cek jika sudah memasukkan 3 barang ke dalam keranjang 
        $keranjanguser = $this->db->query("SELECT * FROM keranjang WHERE id_user='$id_user'")->num_rows();

        // Cek jika masih ada keranjang barang yang belum diambil 
        /*  $datapesan = $this->db->query("SELECT * FROM pesan WHERE id_user='$id_user'")->num_rows();
        if ($datapesan > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert"><br> Ambil barang atau tunggu 1x24 jam untuk bisa menambah barang ke keranjang kembali </div>');
            redirect(base_url() . 'pesan/pembayaran_berhasil');
        } */

        // Jika barang yang diklik keranjang sudah ada di keranjang  
        // if ($keranjang > 0) {
        //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Barang ini sudah ada di keranjang </div>');
        //     redirect(base_url() . 'home');
        // }

        // Jika barang yang akan dikeranjang sudah mencapai 3 item 
        if ($keranjanguser >= 5) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Keranjang barang tidak boleh lebih dari 3</div>');
            redirect(base_url() . 'home');
        }

        // Membuat tabel keranjang jika belum ada 
        $this->ModelPesan->createKeranjang();
        $this->ModelPesan->insertData('keranjang', $isi);

        // Pesan ketika berhasil memasukkan barang ke keranjang 
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Barang berhasil ditambahkan ke keranjang </div>');
        redirect(base_url() . 'home');
    }

    public function hapusPesan()
    {
        $id = $this->uri->segment(3);
        $id_user = $this->session->userdata('id_user');

        $this->ModelPesan->deleteData(['id' => $id], 'keranjang');
        $kosong = $this->db->query("SELECT * FROM keranjang WHERE id_user='$id_user'")->num_rows();

        if ($kosong < 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-massege alert-danger" role="alert">Tidak Ada Barang dikeranjang</div>');
            redirect(base_url() . 'home');
        } else {
            redirect(base_url() . 'pesan');
        }
    }
    public function pesanSelesai($where)
    {
        // Menghitung Total harga
        $total_harga = $this->db->select_sum('keranjang.harga', 'total_harga')
            ->join('barang', 'keranjang.id_barang = barang.id')
            ->where('keranjang.id_user', $where)
            ->get('keranjang')
            ->row()
            ->total_harga;

        // Mengupdate stok dan dipesan di tabel barang saat proses keranjang diselesaikan
        $this->db->query("UPDATE barang 
            JOIN keranjang ON barang.id = keranjang.id_barang 
            SET barang.dipesan = barang.dipesan + 1, barang.stok = barang.stok - 1 
            WHERE keranjang.id_user = '$where'");

        $id_pesan = $this->ModelPesan->kodeOtomatis('pesan', 'id_pesan');
        $isipesan = [
            'id_pesan' => $id_pesan,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'id_user' => $where,
            'total_harga' => $total_harga
        ];

        // Menyimpan ke tabel pesan
        $this->ModelPesan->insertData('pesan', $isipesan);

        // Menyimpan detail pesan untuk setiap barang di keranjang
    $keranjang_items = $this->db->get_where('keranjang', ['id_user' => $where])->result_array();
    foreach ($keranjang_items as $item) {
        $isidetail = [
            'id_pesan' => $id_pesan,
            'id_barang' => $item['id_barang'],
        ];
        $this->ModelPesan->insertData('pesan_detail', $isidetail);
    }
    

        // Mengosongkan keranjang hanya untuk pengguna tertentu
        $this->db->where('id_user', $where)->delete('keranjang');
        redirect(base_url() . 'pesan/info/' . $id_pesan);
    }

    public function info()
    {
        $id_pesan = $this->uri->segment(3);
        $where = $this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('nama');
        $data['judul'] = "Selesai Keranjang";
        $data['useraktif'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id_user')])->result();
        $data['items'] = $this->db->query("SELECT * FROM pesan p, pesan_detail d, barang ba WHERE d.id_pesan = p.id_pesan AND d.id_barang = ba.id AND p.id_pesan = '$id_pesan'")->result_array();

        if (empty($data['items'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Silahkan mengambil barang ke toko dengan membawa bukti pembayaran.</div>');
            redirect(base_url() . 'home');
        }

        $total_harga = $this->db->select_sum('ba.harga', 'total_harga')
            ->from('pesan_detail d')
            ->join('pesan p', 'd.id_pesan = p.id_pesan')
            ->join('barang ba', 'd.id_barang = ba.id')
            ->where('p.id_user', $where)
            ->get()
            ->row()
            ->total_harga;
        $data['total_harga'] = $total_harga;

        $existingProof = $this->db->get_where('pesan', ['id_pesan' => $id_pesan, 'bukti_pembayaran !=' => NULL])->row();

        if ($existingProof) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-message" role="alert">Anda sudah mengupload bukti pembayaran untuk pesanan ini. .</div>');
            redirect(base_url() . 'pesan/pembayaran_berhasil/' . $id_pesan);
            return;
        }
        $pesanan = $this->db->get_where('pesan', ['id_pesan' => $id_pesan, 'id_user' => $where])->row();

        if (!$pesanan) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Pesanan tidak ditemukan atau bukan milik Anda.</div>');
            redirect(base_url() . 'home');
        }

        $data['id_pesan'] = $id_pesan; // Pass id_pesan to the view

        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('pesan/info-pesan', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }
    public function bca()
    {
        $id_pesan = $this->uri->segment(3);
        $where = $this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('nama');
        $data['judul'] = "Selesai Keranjang";
        $data['useraktif'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id_user')])->result();
        $data['items'] = $this->db->query("SELECT * FROM pesan p, pesan_detail d, barang ba WHERE d.id_pesan = p.id_pesan AND d.id_barang = ba.id AND p.id_pesan = '$id_pesan'")->result_array();
        $pesanan = $this->db->get_where('pesan', ['id_pesan' => $id_pesan, 'id_user' => $where])->row();

        if (!$pesanan) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Pesanan tidak ditemukan atau bukan milik Anda.</div>');
            redirect(base_url() . 'home');
        }

        if (empty($data['items'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Silahkan mengambil barang ke toko dengan membawa bukti pembayaran.</div>');
            redirect(base_url() . 'home');
        }

        $data['existingProof'] = $this->db->get_where('pesan', ['id_pesan' => $id_pesan, 'bukti_pembayaran !=' => NULL])->row();
        $data['id_pesan'] = $id_pesan; // Pass id_pesan to the view


        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('pesan/bca', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }

    public function bri()
    {
        $id_pesan = $this->uri->segment(3);
        $where = $this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('nama');
        $data['judul'] = "Selesai Keranjang";
        $data['useraktif'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id_user')])->result();
        $data['items'] = $this->db->query("SELECT * FROM pesan p, pesan_detail d, barang ba WHERE d.id_pesan = p.id_pesan AND d.id_barang = ba.id AND p.id_pesan = '$id_pesan'")->result_array();
        $pesanan = $this->db->get_where('pesan', ['id_pesan' => $id_pesan, 'id_user' => $where])->row();

        if (!$pesanan) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Pesanan tidak ditemukan atau bukan milik Anda.</div>');
            redirect(base_url() . 'home');
        }

        if (empty($data['items'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Silahkan mengambil barang ke toko dengan membawa bukti pembayaran.</div>');
            redirect(base_url() . 'home');
        }

        $data['existingProof'] = $this->db->get_where('pesan', ['id_pesan' => $id_pesan, 'bukti_pembayaran !=' => NULL])->row();

        $data['id_pesan'] = $id_pesan; // Pass id_pesan to the view


        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('pesan/bri', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }

    public function uploadBuktiPembayaran()
    {
        $id_user = $this->session->userdata('id_user');
        $id_pesan = $this->input->post('id_pesan'); // Get id_pesan from the form input

        // Check if the user has already uploaded a proof of payment for this specific order
        $existingProof = $this->db->get_where('pesan', ['id_pesan' => $id_pesan, 'bukti_pembayaran !=' => NULL])->row();

        if ($existingProof) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Anda sudah mengupload bukti pembayaran untuk pesanan ini. Tidak dapat upload lagi.</div>');
            redirect(base_url() . 'pesan/pembayaran_berhasil/' . $id_pesan);
            return;
        }

        // Configuration for file upload
        $config['upload_path'] = './assets/img/bukti_pembayaran/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti_pembayaran')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Upload Bukti Pembayaran Gagal. ' . $this->upload->display_errors() . '</div>');
            redirect(base_url() . 'pesan/pembayaran_berhasil' . $id_pesan);
        } else {
            $bukti_pembayaran = $this->upload->data('file_name');

            // Update to database
            $this->db->set('bukti_pembayaran', $bukti_pembayaran);
            $this->db->where('id_pesan', $id_pesan);
            $this->db->update('pesan');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Bukti Pembayaran Berhasil Diunggah</div>');
            redirect(base_url() . 'pesan/pembayaran_berhasil/' . $id_pesan);
        }
    }

    public function pembayaran_berhasil()
    {
        $id_pesan = $this->uri->segment(3);
        $where = $this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('nama');
        $data['judul'] = "pesan selesai";
        $data['useraktif'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id_user')])->result();
        $data['items'] = $this->db->query("SELECT * FROM pesan p, pesan_detail d, barang ba WHERE d.id_pesan = p.id_pesan AND d.id_barang = ba.id AND p.id_pesan = '$id_pesan'")->result_array();
        $pesanan = $this->db->get_where('pesan', ['id_pesan' => $id_pesan, 'id_user' => $where])->row();

        if (!$pesanan) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Pesanan tidak ditemukan atau bukan milik Anda.</div>');
            redirect(base_url() . 'home');
        }

        // mengecek jika sudah tidak adaa barang yang di pesan
        if (empty($data['items'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">silahkan mengambil barang ke toko dengan membawa bukti pembayaran.</div>');
            redirect(base_url() . 'home');
        }


        // mengecek jika pelanggan sudah mengupload bukti pembayaran
        $data['existingProof'] = $this->db->get_where('pesan', ['id_user' => $where, 'bukti_pembayaran !=' => NULL])->row();

        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('pesan/pembayaran_berhasil', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }

    public function exportToPdf($id_pesan)
    {
        $id_user = $this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('nama');
        $data['judul'] = "Cetak Bukti Pesan";
        $data['id_pesan'] = $id_pesan; // Add id_pesan to the data array
        $data['useraktif'] = $this->ModelUser->cekData(['id' => $id_user])->result();
        $data['items'] = $this->db->query("SELECT * FROM pesan p, pesan_detail d, barang ba WHERE d.id_pesan = p.id_pesan AND d.id_barang = ba.id AND p.id_pesan = '$id_pesan'")->result_array();

        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/steven-motor/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('pesan/bukti-pdf', $data);
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("bukti-pesan-$id_pesan.pdf", array('Attachment' => 0));
        // nama file pdf yang di hasilkan
    }

}
