<?php

class Contabancaria_model extends CI_Model {

    public $nome;
    public $saldoinicial;
    public $datasaldo;

    public function get($id) {
        return R::load('contabancaria', $id);
    }

    public function get_all($pesquisar = null) {
        if ($pesquisar) {
            return R::find('contabancaria');
            /* $this->db->select('*');
              $this->db->from('fios');
              $this->db->like("nome", $pesquisar);
              $query = $this->db->get(); */
        } else {
            return R::find('contabancaria');
            /* $query = $this->db->get('fios'); */
        }

        //return $query->result();
    }

    public function insert($id) {
        $this->nome = $this->input->post('nome');
        $this->saldoinicial = Number::numberToFloat($this->input->post('saldoinicial'));
        $this->datasaldo = Date::brToDateIso($this->input->post('datasaldo'));
        if ($id) {
            $this->update($id);
            return;
        }
        $contabancaria = R::dispense('contabancaria');
        $contabancaria->nome = $this->nome;
        $contabancaria->saldoinicial = $this->saldoinicial;
        $contabancaria->datasaldo = $this->datasaldo;
        R::store($contabancaria);
    }

    public function update($id) {
        $contabancaria = R::load('contabancaria', $id);
        $contabancaria->nome = $this->nome;
        $contabancaria->saldoinicial = $this->saldoinicial;
        $contabancaria->datasaldo = $this->datasaldo;
        R::store($contabancaria);
    }

    public function delete($id) {
        $contabancaria = R::load('contabancaria', $id);
        R::trash($contabancaria);
    }

}
