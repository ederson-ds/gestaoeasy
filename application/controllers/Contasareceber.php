<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contasareceber extends CI_Controller {

    public function index() {
        $this->load->model('Contasareceber_model');
        $data['contasareceber'] = $this->Contasareceber_model->get_all();

        parent::indexview($data);
    }

    public function create($id = 0) {
        $this->load->model('Contasareceber_model');
        $this->load->model('Contabancaria_model');
        $data['conta'] = $this->Contasareceber_model->get($id);
        $data['contasbancarias'] = $this->Contabancaria_model->get_all();
        
        if ($this->input->post()) {
            $this->Contasareceber_model->insert($id);
            redirect('contasareceber', 'refresh');
        }

        parent::createview($data);
    }

    public function delete($id) {
        $this->load->model('Contasareceber_model');
        $this->Contasareceber_model->delete($id);
        redirect('contasareceber', 'refresh');
    }

}
