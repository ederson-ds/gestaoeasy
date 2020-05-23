<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contasapagar extends CI_Controller {

    public function index() {
        $this->load->model('Contasapagar_model');
        $data['contasapagar'] = $this->Contasapagar_model->get_all();
        
        parent::indexview($data);
    }

    public function create($id = 0) {
        $this->load->model('Contasapagar_model');
        $data['conta'] = $this->Contasapagar_model->get($id);
        
        if ($this->input->post()) {
            $this->Contasapagar_model->insert($id);
            redirect('contasapagar', 'refresh');
        }

        parent::createview($data);
    }
    
    public function delete($id) {
        $this->load->model('Contasapagar_model');
        $this->Contasapagar_model->delete($id);
        redirect('contasapagar', 'refresh');
    }

}
