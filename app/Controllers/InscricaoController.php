<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModel;
use App\Models\InscricaoModel;
use App\Models\LocalidadeModel;
use CodeIgniter\HTTP\ResponseInterface;

class InscricaoController extends BaseController
{
    private $inscricao;
    private $localidade;
    private $cliente;

    public function __construct()
    {
        $this->inscricao = new InscricaoModel();
        $this->localidade = new LocalidadeModel();
        $this->cliente = new ClienteModel();
    }
    public function listar(int $idCliente)
    {
        $cliente = $this->cliente->find($idCliente);
        $inscricoes = $this->inscricao->select(
            "inscricoes.idInscricao, inscricoes.nome as nomeInscricao,
            localidades.nome as nomeLocalidade, cidades.nome as nomeCidade, estados.sigla as siglaEstado"
        )->join(
            "localidades",
            "localidades.idLocalidade=inscricoes.idLocalidade",
            "inner"
        )->join(
            "cidades",
            "cidades.idCidade=localidades.idCidade",
            "inner"
        )->join(
            "estados",
            "estados.idEstado=cidades.idEstado",
            "inner"
        )->where("idCliente",$idCliente)->paginate(10);
        $pager = $this->inscricao->pager;
        //var_dump($inscricoes);die;
        return view("inscricao/listar",[
            "inscricoes" => $inscricoes,
            "pager" => $pager,
            "cliente" => $cliente
        ]);
    }

    public function inserir(int $idCliente)
    {
        $cliente = $this->cliente->find($idCliente);
    }
}
