<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PecaController extends BaseController
{
    public function listar(){
        
        return view("peca/listar");
    }

    public function inserir(){

        return view("peca/inserir");
    }

    public function editar(int $param){

        return view("peca/editar");
    }

    public function onSave(){

        var_dump("Estou entrando");
    }

    public function onDelete($param){
        
        var_dump("Estou saindo no codigo".$param);
    }
}
