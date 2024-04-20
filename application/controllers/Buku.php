<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_buku');
    }


    public function index()
    {
        $data['buku'] = $this->M_buku->getDataBuku();
        $this->load->view('book', $data);
    }


    public function edit($id)
    {
        $data['id'] = $id;
        $this->form_validation->set_rules('buku_id', 'buku_id', 'required');
        if ($this->form_validation->run() == false) {
            redirect('buku/');
        } else {
            $this->db->set('nama', $this->input->post('nama', true));
            $this->db->set('isbn', $this->input->post('isbn', true));
            $this->db->set('kategory', $this->input->post('kategory', true));
            $this->db->set('author', $this->input->post('author', true));
            $this->db->set('status', $this->input->post('status', true));
            $this->db->where('buku_id', $id);
            $this->db->update('buku');
            $this->session->set_flashdata('success', '<strong>Berhasil</strong> Diubah!');
            redirect('buku/');
        }
    }

    function tambah()
    {
        if (isset($_POST['submit'])) {
            $this->M_buku->tambah_buku();
            redirect('buku');
        } else {
            redirect('buku');
        }
    }

    public function deletebuku($id)
	{
		$this->M_buku->deleteBuku($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Buku Yang Dipilih berhasil dihapus!</div>');
		redirect(site_url('buku'));
	}
}
