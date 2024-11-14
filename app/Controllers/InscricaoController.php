<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModel;
use App\Models\InscricaoModel;
use CodeIgniter\HTTP\ResponseInterface;

class InscricaoController extends BaseController
{

    private $cliente;
    private $inscricao;

    public function __construct()
    {
        $this->cliente = new ClienteModel();
        $this->cliente = new InscricaoModel();
    }
    public function inserir(int $idCliente)
    {
        $cliente = $this->cliente->find($idCliente);
        return view("inscricao/inserir",[
            "cliente" => $cliente
        ]);
    }

    public function editar(int $idIncricacao)
    {
        $inscricao = $this->inscricao->find($idIncricacao);
        $dados_cliente = $this->cliente->find($inscricao->idCliente);

        var_dump($inscricao);var_dump($dados_cliente);die;
        return view("inscricao/editar",[
            "inscricao" => $inscricao,
            "cliente" => $dados_cliente
        ]);   
    }
    public function onSave(){
            $dados = [
                "idInscricao" => $this->request->getPost("idInscricao"),
                "idCliente" => $this->request->getPost("idCliente"),
                "nome" => $this->request->getPost("nome")
            ]
    }
}
