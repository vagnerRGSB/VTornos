<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CidadeModel;
use App\Models\LocalidadeModel;
use CodeIgniter\HTTP\ResponseInterface;

class LocalidadeController extends BaseController
{
    private $localidade;
    private $cidade;

    public function __construct()
    {
        $this->localidade = new LocalidadeModel();
        $this->cidade = new CidadeModel();
    }
    public function listar()
    {
        
        return view("localidade/listar");
    }
    public function inserir(){

        return view("localidade/inserir");
    }
    public function editar(int $param){

        return view("localidade/editar");
    }
    public function onSave(){

        $dados = [
            "idLocalidade" => $this->request->getPost("idLocalidade"),
            "idCidade" => $this->request->getPost("idCidade"),
            "nome" => $this->request->getPost("nome"),
            "cep" => $this->request->getPost("cep")
        ];

        var_dump($dados);die;
    }
    public function onDelete(int $param){

        $localidade = $this->localidade->find($param);
    }
}
