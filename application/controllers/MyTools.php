<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MyTools extends CI_Controller {

    public function index() {
        $contasapagar = R::dispense('contasapagar');
        $contasapagar->descricao = "asdsadsad";
        $contasapagar->vencimento = R::isoDate();
        $contasapagar->valorbruto = 10.34;
        $contasapagar->juros = 10.34;
        $contasapagar->desconto = 10.34;
        $contasapagar->contabancaria = R::load('contabancaria', 1);
        R::store($contasapagar);
    }

}
