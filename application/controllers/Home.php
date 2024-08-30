<?php
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ModelBarang'); // Ensure the model is loaded
        $this->load->model('ModelUser'); // Ensure the user model is loaded
    }

    public function index()
    {
        $search_query = $this->input->get('search');
        $category_query = $this->input->get('category');

        // Modify the query if search term or category is provided
        if ($search_query) {
            $this->db->like('nama_barang', $search_query);
        }
        if ($category_query) {
            $this->db->where('id_kategori', $category_query);
        }

        $data = [
            'judul' => "Katalog Barang",
            'barang' => $this->ModelBarang->getBarang()->result(),
            'categories' => $this->ModelBarang->getKategori()->result(), // Fetch categories
        ];

        // Check if the user is logged in
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user['nama'];
        } else {
            $data['user'] = 'Pengunjung';
        }

        // Load the views
        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('barang/daftar-barang', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer', $data);
    }

    public function detailBarang()
    {
        $id = $this->uri->segment(3);
        $barang = $this->ModelBarang->joinKategoriBarang(['barang.id' => $id])->result();
        $data['user'] = "Pengunjung";
        $data['judul'] = "Detail Barang";

        foreach ($barang as $fields) {
            $data['nama_barang'] = $fields->nama_barang;
            $data['harga'] = $fields->harga;
            $data['warna'] = $fields->warna;
            $data['kategori'] = $fields->kategori;
            $data['berat'] = $fields->berat;
            $data['kode_part'] = $fields->kode_part;
            $data['image'] = $fields->image;
            $data['ditransaksi'] = $fields->ditransaksi;
            $data['dipesan'] = $fields->dipesan;
            $data['stok'] = $fields->stok;
            $data['id'] = $id;
        }

        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('barang/detail-barang', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }
}
