<?php
class M_kategori extends CI_Model
{
    public function getAllKategori()
    {
        return $this->db->get('category')->result_array();
    }

    function getAllKategorip()
    {
        $query = "SELECT * from category;";
        return $this->db->query($query)->result_array();
    }

    function index()
    {
        $query = "SELECT * from category";
        return $this->db->query($query)->result_array();
    }

    public function deleteKategori($id)
    {
        $this->db->delete('category', ['category_id' => $id]);
    }

    function tambah_kategori(){
        $data=array( 
                    'nama'     => $this->input->post('nama'),
                    'deskripsi'   => $this->input->post('deskripsi'),
                    'status'   => 0
        );
        $this->db->insert('category',$data);
    }
}
