<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_kategori');
    }


    public function index()
    {
        $data['kategori'] = $this->M_kategori->getAllKategori();
        $this->load->view('kategori', $data);
    }


    public function edit($id)
    {
        $data['id'] = $id;
        $this->form_validation->set_rules('category_id', 'category_id', 'required');
        if ($this->form_validation->run() == false) {
            redirect('kategori/');
        } else {
            $this->db->set('nama', $this->input->post('nama', true));
            $this->db->set('deskripsi', $this->input->post('deskripsi', true));
            $this->db->set('status', $this->input->post('status', true));
            $this->db->where('category_id', $id);
            $this->db->update('category');
            $this->session->set_flashdata('success', '<strong>Berhasil</strong> Diubah!');
            redirect('kategori/');
        }
    }

    public function deletekategori($id)
	{
		$this->M_kategori->deleteKategori($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kategori Yang Dipilih berhasil dihapus!</div>');
		redirect(site_url('kategori'));
	}

    public function tambah_kategori()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');

        if ($this->form_validation->run($this) == FALSE) {

            $this->load->view('kategori', $data);
            $this->session->set_flashdata('errortambah', '<div class="alert alert-danger" role="alert">Gagal Tambah Panitia, Mohon Isi dengan Benar!</div>');
        } else {
            $this->M_kategori->tambah($enc_password);

            // Set message
            $this->session->set_flashdata('success', 'Panitia Lelang <strong>Berhasil</strong> Ditambah!');
            redirect('admin/kelola_akun/panitia');
        }
    }

    public function add()
    {
        $Kategori = $this->M_kategori; 
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($Kategori->rules()); //menerapkan rules validasi pada mahasiswa_model
        //kondisi jika semua kolom telah divalidasi, maka akan menjalankan method save pada mahasiswa_model
        if ($validation->run()) {
            $Kategori->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kategori berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("kategori");
        }
        $data["title"] = "Tambah Data Mahasiswa";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('mahasiswa/add', $data);
        $this->load->view('templates/footer');
    }

    function tambah()
    {
        if (isset($_POST['submit'])) {
            $this->M_kategori->tambah_kategori();
            redirect('kategori');
        } else {
            redirect('kategori');
        }
    }
}
