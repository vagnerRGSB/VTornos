<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EspecificacaoModel;
use App\Models\PecaModel;
use CodeIgniter\HTTP\ResponseInterface;

class EspecificacaoController extends BaseController
{

    private $especificacao;
    private $peca;

    public function __construct(){
        $this->especificacao = new EspecificacaoModel();
        $this->peca = new PecaModel();
    }
    public function listar(){
        
        return view("especificacao/listar");
    }
    
    public function inserir(){
        $pecas = $this->peca->findAll();
        return view("especificacao/inserir");
    }

    public function editar(int $param){
        $pecas = $this->peca->findAll();
        $especificacao = $this->especificacao->find();
        return view("especificacao/editar",[
            "pecas" => $pecas,
            "especificacao" => $especificacao
        ]);
    }

    public function onSave(){
        $dados = [
            "idEspecificacao" => $this->request->getPost("idEspecificacao"),
            "idPeca" => $this->request->getPost("idPeca"),
            "dimensao" => $this->request->getPost("dimensao"),
            "especificacao" => $this->request->getPost("especificacao")
        ];
        var_dump($dados);die;
    }

    public function onDelete(int $param){
        $dados = $this->especificacao->find($param);
    }
}
