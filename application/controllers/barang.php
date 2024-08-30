<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    //manajemen barang
    public function index()
    {
        $data['judul'] = 'Data Sparepart';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->ModelBarang->getBarang()->result_array();
        $data['kategori'] = $this->ModelBarang->getKategori()->result_array();

        $this->form_validation->set_rules('nama_barang', 'nama barang', 'required|min_length[3]', [
            'required' => 'Nama Barang harus diisi',
            'min_length' => 'Nama barang terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
            'required' => 'Harga harus diisi',
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|min_length[3]', [
            'required' => 'Harga harus diisi',
            'min_length' => 'Harga terlalu pendek'
        ]);
        $this->form_validation->set_rules('warna', 'Warna', 'required|min_length[3]', [
            'required' => 'Warna harus diisi',
            'min_length' => 'Warna terlalu pendek'
        ]);
        $this->form_validation->set_rules('berat', 'Berat', 'required|min_length[3]', [
            'required' => 'Berat harus diisi',
            'min_length' => 'Berat terlalu pendek',
            'max_length' => 'Berat terlalu panjang',
        ]);
        $this->form_validation->set_rules('kode_part', 'Kode Part', 'required|min_length[3]', [
            'required' => 'Kode Part harus diisi',
            'min_length' => 'Kode Part terlalu pendek',
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric', [
            'required' => 'Stok harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barang/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'nama_barang' => $this->input->post('nama_barang', true),
                'id_kategori' => $this->input->post('id_kategori', true),
                'harga' => $this->input->post('harga', true),
                'warna' => $this->input->post('warna', true),
                'berat' => $this->input->post('berat', true),
                'kode_part' => $this->input->post('kode_part', true),
                'stok' => $this->input->post('stok', true),
                'ditransaksi' => 0,
                'dipesan' => 0,
                'image' => $gambar
            ];

            $this->ModelBarang->simpanBarang($data);
            redirect('barang');
        }
    }

    public function hapusBarang()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelBarang->hapusBarang($where);
        redirect('barang');
    }

    public function ubahBarang()
    {
        $data['judul'] = 'Ubah Data Barang';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->ModelBarang->barangWhere(['id' => $this->uri->segment(3)])->result_array();
        $kategori = $this->ModelBarang->joinKategoriBarang(['barang.id' => $this->uri->segment(3)])->result_array();
        foreach ($kategori as $k) {
            $data['id'] = $k['id_kategori'];
            $data['k'] = $k['kategori'];
        }
        $data['kategori'] = $this->ModelBarang->getKategori()->result_array();

        $this->form_validation->set_rules('nama_barang', 'nama barang', 'required|min_length[3]', [
            'required' => 'Nama Barang harus diisi',
            'min_length' => 'Nama barang terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
            'required' => 'Harga harus diisi',
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|min_length[3]', [
            'required' => 'Harga harus diisi',
            'min_length' => 'Harga terlalu pendek'
        ]);
        $this->form_validation->set_rules('warna', 'Warna', 'required|min_length[3]', [
            'required' => 'Warna harus diisi',
            'min_length' => 'Warna terlalu pendek'
        ]);
        $this->form_validation->set_rules('berat', 'Berat', 'required|min_length[3]', [
            'required' => 'Berat harus diisi',
            'min_length' => 'Berat terlalu pendek',
        ]);
        $this->form_validation->set_rules('kode_part', 'Kode Part', 'required|min_length[3]', [
            'required' => 'Kode Part harus diisi',
            'min_length' => 'Kode Part terlalu pendek',
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required', [
            'required' => 'Stok harus diisi',
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        //memuat atau memanggil library upload
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barang/ubah_barang', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }
            $data = [
                'nama_barang' => $this->input->post('nama_barang', true),
                'id_kategori' => $this->input->post('id_kategori', true),
                'harga' => $this->input->post('harga', true),
                'warna' => $this->input->post('warna', true),
                'berat' => $this->input->post('berat', true),
                'kode_part' => $this->input->post('kode_part', true),
                'stok' => $this->input->post('stok', true),
                'ditransaksi' => 0,
                'dipesan' => 0,
                'image' => $gambar
            ];

            $this->ModelBarang->updateBarang($data, ['id' => $this->input->post('id')]);
            redirect('barang');
        }
    }

    //manajemen kategori
    public function kategori()
    {
        $data['judul'] = 'Kategori Sparepart';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelBarang->getKategori()->result_array();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
            'required' => 'Judul barang harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barang/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kategori' => $this->input->post('kategori', TRUE)
            ];

            $this->ModelBarang->simpanKategori($data);
            redirect('barang/kategori');
        }
    }

    public function ubahKategori()
    {
        $data['judul'] = 'Ubah Data Kategori';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelBarang->kategoriWhere(['id' => $this->uri->segment(3)])->result_array();


        $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required|min_length[3]', [
            'required' => 'Nama Kategori harus diisi',
            'min_length' => 'Nama Kategori terlalu pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barang/ubah_kategori', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'kategori' => $this->input->post('kategori', true)
            ];

            $this->ModelBarang->updateKategori(['id' => $this->input->post('id')], $data);
            redirect('Barang/kategori');
        }
    }

    public function hapusKategori()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelBarang->hapusKategori($where);
        redirect('barang/kategori');
    }
}
