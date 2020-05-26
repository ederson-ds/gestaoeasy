<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contabancaria extends CI_Controller {

    public function index() {
        $this->load->model('Contabancaria_model');
        $data['contabancaria'] = $this->Contabancaria_model->get_all();

        parent::indexview($data);
    }

    public function create($id = 0) {
        $this->load->model('Contabancaria_model');
        $data['conta'] = $this->Contabancaria_model->get($id);

        if ($this->input->post()) {
            $this->Contabancaria_model->insert($id);
            redirect('contabancaria', 'refresh');
        }

        parent::createview($data);
    }

    public function delete($id) {
        $this->load->model('Contabancaria_model');
        $this->Contabancaria_model->delete($id);
        redirect('contabancaria', 'refresh');
    }

}
