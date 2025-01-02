<?php

namespace App\Controllers;

use App\Models\AtividadeModel;
use App\Models\ClienteModel;
use App\Models\EstoqueModel;
use App\Models\SerieModel;

class Home extends BaseController
{
    private $produto_estoque;
    private $serie;
    private $cliente;
    private $atividade;

    public function __construct()
    {
        $this->produto_estoque = new EstoqueModel();
        $this->serie = new SerieModel();
        $this->cliente = new ClienteModel();
        $this->atividade = new AtividadeModel();
        
    }
    public function principal()
    {
       
        $db = \Config\Database::connect();
        $consulta = $db->table("clientes");
        $consulta->select("count(idCliente) as total_clientes");
        $query = $consulta->get();
        $total_clientes = $query->getRow();

        //$total_clientes = $this->cliente->selectCount("idCliente","total_clientes")->findAll();
        //var_dump($total_clientes);die;

        $consulta = $db->table("series");
        $consulta-> select("count(idSerie) as total_series");
        $query = $consulta->get();
        $total_series = $query->getRow();

        //$total_series = $this->serie->selectCount("idSerie","total_series")->findAll();

        $consulta = $db->table("atividades");
        $consulta-> select("count(idAtividade) as total_atividades");
        $query = $consulta->get();
        $total_atividades = $query->getRow();

        //$total_atividades = $this->atividade->selectCount("idAtividade","total_atividades")->findAll();

        $produtos_estoques = $this->produto_estoque->select(
            "marcas.nome as nomeMarca,
            pecas.nome as nomePeca,
            especificacoes.dimensao as dimensaoPeca, especificacoes.especificacao as especificacaoPeca"
        )->join(
            "marcas",
            "marcas.idMarca=estoques.idMarca",
            "inner"
        )->join(
            "especificacoes",
            "especificacoes.idEspecificacao=estoques.idEspecificacao",
            "inner"
        )->join(
            "pecas",
            "pecas.idPeca=especificacoes.idPeca",
            "inner"
        )->where("quantiaEstoque<minimoEstoque")->paginate(10);
        $pager = $this->produto_estoque->pager;
        return view('home/principal', [
            "count_clientes" => $total_clientes != null ? $total_clientes : 0,
            "count_series" => $total_series != null ? $total_series : 0,
            "count_atividades" => $total_atividades != null ? $total_atividades : 0,
            "produto_estoques" => $produtos_estoques,
            "pager" => $pager
        ]);
    }
}
