<?php

class Contasareceber_model extends CI_Model {

    public $descricao;
    public $vencimento;
    public $valorbruto;
    public $juros;
    public $desconto;
    public $contabancaria_id;
    public $formadepagamento_id;
    public $datacompensacao;

    public function get($id) {
        return R::load('contasareceber', $id);
    }

    public function get_all($pesquisar = null) {
        if ($pesquisar) {
            return R::find('contasareceber');
            /* $this->db->select('*');
              $this->db->from('fios');
              $this->db->like("nome", $pesquisar);
              $query = $this->db->get(); */
        } else {
            return R::find('contasareceber');
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
        $this->contabancaria_id = (int) $this->input->post('contabancaria_id');
        $this->formadepagamento_id = (int) $this->input->post('formadepagamento_id');
        $this->datacompensacao = Date::brToDateIso($this->input->post('datacompensacao'));
        if ($id) {
            $this->update($id);
            return;
        }
        $contasareceber = R::dispense('contasareceber');
        $contasareceber->descricao = $this->descricao;
        $contasareceber->vencimento = $this->vencimento;
        $contasareceber->valorbruto = $this->valorbruto;
        $contasareceber->juros = $this->juros;
        $contasareceber->desconto = $this->desconto;
        $contasareceber->contabancaria_id = $this->contabancaria_id;
        $contasareceber->formadepagamento_id = $this->formadepagamento_id;
        $contasareceber->datacompensacao = $this->datacompensacao;
        R::store($contasareceber);
    }

    public function update($id) {
        $contasareceber = R::load('contasareceber', $id);
        $contasareceber->descricao = $this->descricao;
        $contasareceber->vencimento = $this->vencimento;
        $contasareceber->valorbruto = $this->valorbruto;
        $contasareceber->juros = $this->juros;
        $contasareceber->desconto = $this->desconto;
        $contasareceber->contabancaria_id = $this->contabancaria_id;
        $contasareceber->formadepagamento_id = $this->formadepagamento_id;
        $contasareceber->datacompensacao = $this->datacompensacao;
        R::store($contasareceber);
    }

    public function delete($id) {
        $contasareceber = R::load('contasareceber', $id);
        R::trash($contasareceber);
    }

}
