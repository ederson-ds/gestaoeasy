<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Formadepagamento extends CI_Controller {

    public function index() {
        $this->load->model('Formadepagamento_model');
        $data['formadepagamento'] = $this->Formadepagamento_model->get_all();

        parent::indexview($data);
    }

    public function create($id = 0) {
        $this->load->model('Formadepagamento_model');
        $data['formadepagamento'] = $this->Formadepagamento_model->get($id);

        if ($this->input->post()) {
            $this->Formadepagamento_model->insert($id);
            redirect('formadepagamento', 'refresh');
        }

        parent::createview($data);
    }

    public function delete($id) {
        $this->load->model('Formadepagamento_model');
        $this->Formadepagamento_model->delete($id);
        redirect('formadepagamento', 'refresh');
    }

}
