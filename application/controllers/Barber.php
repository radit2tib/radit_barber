<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barber extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barber_model');
    }
    public function index()
    {
        $data['judul'] = "Halaman barber";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barber'] = $this->Barber_model->get();
        $this->load->view("layout/admin_header", $data);
        $this->load->view("barber/vw_barber", $data);
        $this->load->view("layout/admin_footer", $data);
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Pengaduan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout/admin_header", $data);
        $this->load->view("barber/vw_tambah_barber", $data);
        $this->load->view("layout/admin_footer", $data);
    }

    public function upload()
    {
        $config['upload_path']   = './assets/assets/img/'; // Sesuaikan dengan path yang Anda inginkan
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048; // 2MB max size

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $data = $this->upload->data();

            // Data untuk dimasukkan ke dalam database
            $data = [
                'nama' => $this->input->post('nama'),
                'nohp' => $this->input->post('nohp'),
                'gambar' => $data['file_name'],
                'status' => 'Diterima',
            ];

            // Masukkan data ke dalam database
            $this->Barber_model->insert($data);

            // Redirect ke halaman admin atau ke halaman lain jika diperlukan
            redirect('Barber');
        } else {
            $error = $this->upload->display_errors();
            echo $error;
        }
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit barber";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barber'] = $this->Barber_model->getById($id);
        $this->load->view("layout/admin_header", $data);
        $this->load->view("barber/vw_ubah_barber", $data);
        $this->load->view("layout/admin_footer", $data);
    }
    public function hapus($id)
    {
        $this->Barber_model->delete($id);
        redirect('barber');
    }
    function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'nohp' => $this->input->post('nohp'),
            'namakegiatan' => $this->input->post('namakegiatan'),
            'file_path' => $this->input->post('file_path'),

        ];
        $id = $this->input->post('id');
        $this->Barber_model->update(['id' => $id], $data);
        redirect('barber');
    }
    // Controller
    public function tolak($id)
    {
        // Pastikan user yang login memiliki peran 'Admin'
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user['role'] == 'User') {
            // Update status proposal menjadi 'Proses'
            $this->Barber_model->updateStatus($id, 'Sedang off');

            // Redirect kembali ke halaman proposal User
            redirect('barber');
        } else {
            // Tindakan jika user bukan User (misalnya, redirect ke halaman lain atau tampilkan pesan)
            // ...
        }
    }
    public function proses($id)
    {
        // Pastikan user yang login memiliki peran 'User'
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user['role'] == 'User') {
            // Update status barber menjadi 'Proses'
            $this->Barber_model->updateStatus($id, 'Proses');

            // Redirect kembali ke halaman barber User
            redirect('barber');
        } else {
            // Tindakan jika user bukan User (misalnya, redirect ke halaman lain atau tampilkan pesan)
            // ...
        }
    }
    public function selesai($id)
    {
        // Pastikan user yang login memiliki peran 'User'
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user['role'] == 'User') {
            // Update status barber menjadi 'Proses'
            $this->Barber_model->updateStatus($id, 'Sedang on');

            // Redirect kembali ke halaman barber admin
            redirect('barber');
        } else {
            // Tindakan jika user bukan admin (misalnya, redirect ke halaman lain atau tampilkan pesan)
            // ...
        }
    }

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Pengaduan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barber'] = $this->Barber_model->getById($id);
        $this->load->view("layout/admin_header", $data);
        $this->load->view("barber/vw_detail_barber", $data);
        $this->load->view("layout/admin_footer", $data);
    }
}
