<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstoqueModel;
use CodeIgniter\HTTP\ResponseInterface;

class EstoqueController extends BaseController
{

    private $estoque;

    public function __construct()
    {
        $this->estoque = new EstoqueModel();
    }
    public function listar()
    {
        
        return view("estoque/listar");
    }

    public function inserir(){

        return view("estoque/inserir");
    }

    public function editar(int $param){

        return view("estoque/editar");
    }

    public function onSave(){
        
        var_dump("Estou entrando");
    }

    public function onDelete(int $param){

        var_dump("Estou saindo no código ".$param);
    }

}
