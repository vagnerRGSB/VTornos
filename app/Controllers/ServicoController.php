<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Servico;
use App\Models\AtividadeModel;
use App\Models\ClienteModel;
use App\Models\OrcamentoModel;
use App\Models\ServicoModel;
use CodeIgniter\HTTP\ResponseInterface;

class ServicoController extends BaseController
{
    private $orcamento;
    private $cliente;
    private $servico;
    private $atividade;

    public function __construct()
    {
        $this->orcamento = new OrcamentoModel();
        $this->cliente = new ClienteModel();
        $this->servico = new ServicoModel();
        $this->atividade = new AtividadeModel();
    }
    public function listar(int $idOrcamento)
    {
        $orcamento = $this->orcamento->find($idOrcamento);
        $maquinario = $this->orcamento->select(
            "marcas.nome as nomeMarca,
            modelos.nome as nomeModelo,
            series.descricao as descricaoSerie"
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
        )->find($idOrcamento);
        $cliente = $this->cliente->select("idCliente,nome")->find($orcamento->idCliente);
        $servicos = $this->servico->where("idOrcamento", $orcamento->idOrcamento)->paginate(10);
        $pager = $this->servico->pager;

        return view(
            "servico/listar",[
                "orcamento" => $orcamento,
                "maquinario" => $maquinario,
                "cliente" => $cliente,
                "servicos" => $servicos,
                "pager" => $pager
            ]
        );
    }
    public function inserir(int $idOrcamento) {
        $orcamento = $this->orcamento->find($idOrcamento);
        $atividades = $this->atividade->findAll();
        

        return view(
            "servico/inserir",[
                "orcamento" => $orcamento,
                "atividades" => $atividades
            ]
        );
    }
    public function editar(int $idServico) {}
    public function onSave() {}
    public function onDelete(int $idServico) {}
}
