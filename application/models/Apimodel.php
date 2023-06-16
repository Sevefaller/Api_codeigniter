<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Apimodel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function get_all()
    {
        return $this->db->get('projects')->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('projects', array('id' => $id))->row_array();
    }

    public function insert($data)

    {
        $data = [
            'name'        => $this->input->post('name'),
            'description' => $this->input->post('description')
        ];
        $this->db->insert('projects', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $data = [
            'name'        => $this->input->post('name'),
            'description' => $this->input->post('description')
        ];
        $this->db->where('id', $id);
        return $this->db->update('projects', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('projects');
    }
}
