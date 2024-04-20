<?php

class M_buku extends CI_Model
{
    public function getDataBuku()
    {
        return $this->db->get('buku')->result_array();
    }

    function tambah_buku(){
        $data=array( 
                    'nama'     => $this->input->post('nama'),
                    'isbn'   => $this->input->post('isbn'),
                    'kategory'   => $this->input->post('kategory'),
                    'author'   => $this->input->post('author'),
                    'status'   => 0
        );
        $this->db->insert('buku',$data);
    }


    public function deleteBuku($id)
    {
        $this->db->delete('buku', ['buku_id' => $id]);
    }
}
