<?php

class M_author extends CI_Model
{
    public function getData()
    {
        return $this->db->get('author')->result_array();
    }


    public function deleteAuthor($id)
    {
        $this->db->delete('author', ['author_id' => $id]);
    }

    function tambah_author(){
        $data=array( 
                    'nama'     => $this->input->post('nama'),
                    'dob'   => $this->input->post('dob'),
                    'alamat'   => $this->input->post('alamat'),
        );
        $this->db->insert('author',$data);
    }
}
