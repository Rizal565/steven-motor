<?php
class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat Datang</div>');
        redirect('home');    }

    public function myProfil()
    {
    $data['judul'] = 'Profil Saya';
    $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['image'] = $user['image'];
    $data['user'] = $user['nama'];
    $data['email'] = $user['email'];
    $data['tanggal_input'] = $user['tanggal_input'];

    $this->load->view('templates/templates-user/header', $data);
    $this->load->view('member/index', $data);
    $this->load->view('templates/templates-user/modal');
    $this->load->view('templates/templates-user/footer', $data);
    }

public function ubahProfil()
    {
    $data['judul'] = 'Ubah Profil';
    $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['image'] = $user['image'];
    $data['user'] = $user['nama'];
    $data['email'] = $user['email'];
    $data['tanggal_input'] = $user['tanggal_input'];

    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
        'required' => 'Nama tidak Boleh Kosong'
    ]);

    if ($this->form_validation->run() == false) {
        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('member/ubah-anggota', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer', $data);
    } else {
        $nama = $this->input->post('nama', true);
        $email = $this->input->post('email', true);

        //jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '3000';
            $config['max_width'] = '1024';
            $config['max_height'] = '1000';
            $config['file_name'] = 'pro' . time();
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $gambar_lama = $user['image'];
                if ($gambar_lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                }
                $gambar_baru = $this->upload->data('file_name');
                $this->db->set('image', $gambar_baru);
            }
        }
        $this->db->set('nama', $nama);
        $this->db->where('email', $email);
        $this->db->update('user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah</div>');
        redirect('member/myprofil');
        }
    }

public function logout()
    {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
    redirect('home');
    }

}
