<?php
defined('BASEPATH') or exit('No Direct script access allowed');
class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function laporan_barang()
    {
        $data['judul'] = 'Laporan Data Barang';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->ModelBarang->getBarang()->result_array();
        $data['kategori'] = $this->ModelBarang->getKategori()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/laporan_barang', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_barang()
    {
        $data['barang'] = $this->ModelBarang->getBarang()->result_array();
        $data['kategori'] = $this->ModelBarang->getKategori()->result_array();

        $this->load->view('barang/laporan_print_barang', $data);
    }

    public function laporan_barang_pdf()
    {
        $data['barang'] = $this->ModelBarang->getBarang()->result_array();
        // $this->load->library('dompdf_gen');
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/steven-motor/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('barang/laporan_pdf_barang', $data);
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_data_barang.pdf", array('Attachment' =>
        0));
        // nama file pdf yang di hasilkan
    }

    public function export_excel()
    {
        $data = array('title' => 'Laporan Barang', 'barang' => $this->ModelBarang->getBarang()->result_array());
        $this->load->view('barang/export_excel_barang', $data);
    }
    public function laporan_transaksi()
    {
        $data['judul'] = 'Laporan Data Transaksi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->db->query("
        SELECT 
            p.no_transaksi, p.tgl_transaksi, p.tgl_pengambilan, p.total_harga, p.status,
            GROUP_CONCAT(b.nama_barang SEPARATOR ', ') as nama_barang,
            u.nama 
        FROM transaksi p
        JOIN detail_transaksi d ON p.no_transaksi = d.no_transaksi
        JOIN barang b ON d.id_barang = b.id
        JOIN user u ON p.id_user = u.id
        GROUP BY p.no_transaksi, u.nama, p.tgl_transaksi, p.tgl_pengambilan, p.total_harga, p.status
    ")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/laporan-transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_transaksi()
    {
        $data['laporan'] = $this->db->query("select * from transaksi p,detail_transaksi d,barang b,user u where d.id_barang=b.id and p.id_user=u.id and p.no_transaksi=d.no_transaksi")->result_array();
        $this->load->view('transaksi/laporan-print-transaksi', $data);
    }
    public function laporan_transaksi_pdf()
    {
        $data['laporan'] = $this->db->query("select * from transaksi p,detail_transaksi d,barang b,user u where d.id_barang=b.id and p.id_user=u.id and p.no_transaksi=d.no_transaksi")->result_array();
        // $this->load->library('dompdf_gen');
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/steven-motor/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('transaksi/laporan-pdf-transaksi', $data);
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan data transaksi.pdf", array('Attachment' => 0));
        // nama file pdf yang di hasilkan
    }
    public function export_excel_transaksi()
    {
        $data = array('title' => 'Laporan Data Transaksi Barang', 'laporan' => $this->db->query("select * from transaksi p,detail_transaksi d, barang b,user u where d.id_barang=b.id and p.id_user=u.id and p.no_transaksi=d.no_transaksi")->result_array());
        $this->load->view('transaksi/export-excel-transaksi', $data);
    }
}
