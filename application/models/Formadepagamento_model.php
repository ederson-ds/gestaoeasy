<?php

class Formadepagamento_model extends CI_Model {

    public $nome;

    public function get($id) {
        return R::load('formadepagamento', $id);
    }

    public function get_all($pesquisar = null) {
        if ($pesquisar) {
            return R::find('formadepagamento');
        } else {
            return R::find('formadepagamento');
        }
    }

    public function insert($id) {
        $this->nome = StringFormatter::removeSymbols($this->input->post('nome'));
        if ($id) {
            $this->update($id);
            return;
        }
        $formadepagamento = R::dispense('formadepagamento');
        $formadepagamento->nome = $this->nome;
        R::store($formadepagamento);
    }

    public function update($id) {
        $formadepagamento = R::load('formadepagamento', $id);
        $formadepagamento->nome = $this->nome;
        R::store($formadepagamento);
    }

    public function delete($id) {
        $formadepagamento = R::load('formadepagamento', $id);
        R::trash($formadepagamento);
    }

}
