<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Author extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_author');
    }

    
    public function index()
    {
        $data['dataauthor'] = $this->M_author->getData();
        $this->load->view('author', $data);
    }

    public function edit($id)
    {
        $data['id'] = $id;
        $this->form_validation->set_rules('author_id', 'author_id', 'required');
        if ($this->form_validation->run() == false) {
            redirect('author/');
        } else {
            $this->db->set('nama', $this->input->post('nama', true));
            $this->db->set('dob', $this->input->post('dob', true));
            $this->db->set('age', $this->input->post('age', true));
            $this->db->set('alamat', $this->input->post('alamat', true));
            $this->db->where('author_id', $id);
            $this->db->update('author');
            $this->session->set_flashdata('success', '<strong>Berhasil</strong> Diubah!');
            redirect('author/');
        }
    }


    public function deleteauthor($id)
	{
		$this->M_author->deleteAuthor($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Author Yang Dipilih Berhasil dihapus!</div>');
		redirect(site_url('author'));
	}

    function tambah()
    {
        if (isset($_POST['submit'])) {
            $this->M_author->tambah_author();
            redirect('author');
        } else {
            redirect('author');
        }
    }
}
