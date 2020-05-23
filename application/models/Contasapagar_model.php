<?php

class Contasapagar_model extends CI_Model {

    public $descricao;
    public $vencimento;
    public $valorbruto;
    public $juros;
    public $desconto;

    public function get($id) {
        return R::load('contasapagar', $id);
    }

    public function get_all($pesquisar = null) {
        if ($pesquisar) {
            return R::find('contasapagar');
            /* $this->db->select('*');
              $this->db->from('fios');
              $this->db->like("nome", $pesquisar);
              $query = $this->db->get(); */
        } else {
            return R::find('contasapagar');
            /* $query = $this->db->get('fios'); */
        }

        //return $query->result();
    }

    public function insert($id) {
        $this->descricao = $this->input->post('descricao');
        $this->vencimento = Date::brToDateIso($this->input->post('vencimento'));
        $this->valorbruto = Number::numberToFloat($this->input->post('valorbruto'));
        $this->juros = Number::numberToFloat($this->input->post('juros'));
        $this->desconto = Number::numberToFloat($this->input->post('desconto'));
        if ($id) {
            $this->update($id);
            return;
        }
        $contasapagar = R::dispense('contasapagar');
        $contasapagar->descricao = $this->descricao;
        $contasapagar->vencimento = $this->vencimento;
        $contasapagar->valorbruto = $this->valorbruto;
        $contasapagar->juros = $this->juros;
        $contasapagar->desconto = $this->desconto;
        R::store($contasapagar);
    }

    public function update($id) {
        $contasapagar = R::load('contasapagar', $id);
        $contasapagar->descricao = $this->descricao;
        $contasapagar->vencimento = $this->vencimento;
        $contasapagar->valorbruto = $this->valorbruto;
        $contasapagar->juros = $this->juros;
        $contasapagar->desconto = $this->desconto;
        R::store($contasapagar);
    }

    public function delete($id) {
        $contasapagar = R::load('contasapagar', $id);
        R::trash($contasapagar);
    }

}
