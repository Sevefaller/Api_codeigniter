<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Apimodel');
    }

    public function index()
    {
        $data = $this->Apimodel->get_all();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function show($id)
    {
        $data = $this->Apimodel->get_by_id($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function create()
    {
        $data = $this->input->post();
        $insert_id = $this->Apimodel->insert($data);
        $this->output->set_content_type('application/json')->set_output(json_encode(['insert_id' => $insert_id]));
    }

    public function update($id)
    {
        $data = $this->input->post();
        $success = $this->Apimodel->update($id, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode(['success' => $success]));
    }

    public function delete($id)
    {
        $success = $this->Apimodel->delete($id);
        $this->output->set_content_type('application/json')->set_output(json_encode(['success' => $success]));
    }
}
