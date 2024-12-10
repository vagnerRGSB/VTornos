<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Orcamento;
use App\Models\OrcamentoModel;
use App\Models\ProdutoModel;
use App\Models\ServicoModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProdutoController extends BaseController
{
    private $servico;
    private $orcamento;
    private $produto;

    public function __construct()
    {
        $this->servico = new ServicoModel();
        $this->orcamento = new OrcamentoModel();
        $this->produto = new ProdutoModel();
    }
    public function listar(int $idServico)
    {

        $infoServico = $this->servico->select(
            "orcamentos.idOrcamento, orcamentos.observacao as observacaoOrcamento,
            servicos.titulo as tituloServico,
            series.descricao as descricaoSerie,
            modelos.nome as nomeModelo,
            marcas.nome as nomeMarca,
            clientes.nome as nomeCliente"
        )->join(
            "orcamentos",
            "orcamentos.idOrcamento=servicos.idOrcamento",
            "inner"
        )->join(
            "clientes",
            "clientes.idCliente=orcamentos.idCliente",
            "inner"
        )->join(
            "series",
            "series.idSerie=orcamentos.idSerie",
            "inner"
        )->join(
            "modelos",
            "modelos.idModelo=series.idModelo",
            "inner"
        )->join(
            "marcas",
            "marcas.idMarca=modelos.idMarca",
            "inner"
        )->where("idServico",$idServico)->first();
        //var_dump($infoServico);die;
        return view("produto/listar",
        [
            "infoServico" => $infoServico
        ],
        [

        ]);
    }
}
