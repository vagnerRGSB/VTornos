<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModel;
use App\Models\OrcamentoModel;
use App\Models\SerieModel;
use App\Models\ServicoModel;
use CodeIgniter\HTTP\ResponseInterface;

class OrcamentoController extends BaseController
{
    private $orcamento;
    private $cliente;
    private $servico;
    private $serie;

    public function __construct()
    {
        $this->orcamento = new OrcamentoModel();
        $this->cliente = new ClienteModel();
        $this->servico = new ServicoModel();
        $this->serie = new SerieModel();
    }
    public function listar(int $idCliente)
    {
        $cliente = $this->cliente->find($idCliente);
        $orcamentos = $this->orcamento->where("idCliente", $idCliente)->paginate(10);
        $pager = $this->orcamento->pager;

        return view("orcamento/listar", [
            "cliente" => $cliente,
            "orcamentos" => $orcamentos,
            "pager" => $pager
        ]);
    }

    public function inserir(int $idCliente)
    {
        $cliente = $this->cliente->find($idCliente);
        //var_dump($cliente);die;
        $series = $this->serie->select(
            "maquinarios.nome as nomeMaquinario,
            marcas.nome as nomeMarca,
            modelos.nome as nomeModelo,
            series.idSerie, series.descricao as descricaoSerie"
        )->join(
            "modelos",
            "modelos.idModelo=series.idModelo",
            "inner"
        )->join(
            "maquinarios",
            "maquinarios.idMaquinario=modelos.idMaquinario",
            "inner"
        )->join(
            "marcas",
            "marcas.idMarca=modelos.idMarca",
            "inner"
        )->findAll();

        return view("orcamento/inserir", [
            "cliente" => $cliente,
            "series" => $series
        ]);
    }

    public function editar(int $idOrcamento)
    {
        $orcamento = $this->orcamento->find($idOrcamento);
        $cliente = $this->cliente->find($orcamento->idCliente);
        $series = $this->serie->select(
            "maquinarios.nome as nomeMaquinario,
            marcas.nome as nomeMarca,
            modelos.nome as nomeModelo,
            series.idSerie, series.descricao as descricaoSerie"
        )->join(
            "modelos",
            "modelos.idModelo=series.idModelo",
            "inner"
        )->join(
            "maquinarios",
            "maquinarios.idMaquinario=modelos.idMaquinario",
            "inner"
        )->join(
            "marcas",
            "marcas.idMarca=modelos.idMarca",
            "inner"
        )->findAll();

        return view("orcamento/editar", [
            "cliente" => $cliente,
            "orcamento" => $orcamento,
            "series" => $series
        ]);
    }

    public function onSave()
    {
        $dados = [
            "idOrcamento" => $this->request->getPost("idOrcamento"),
            "idCliente" => $this->request->getPost("idCliente"),
            "idSerie" => $this->request->getPost("idSerie"),
            "observacao" => $this->request->getPost("observacao")
        ];
        var_dump($dados);die;
        if (empty($dados["idOrcamento"])) {
            if ($this->orcamento->save($dados)) {
                return redirect()->route("listar.cliente")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso </strong>"
                );
            } else {
                return redirect()->back()->with(
                    "errors",
                    $this->orcamento->errors()
                );
            }
        } else {
            if ($this->orcamento->save($dados)) {
                return redirect()->route("listar.cliente")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Atualização realizada com sucesso </strong>"
                );
            } else {
                return redirect()->back()->with(
                    "errors",
                    $this->orcamento->errors()
                );
            }
        }
    }

    public function onDelete(int $idOrcamento)
    {
        if($this->orcamento->delete($idOrcamento)){
            return redirect()->route("cliente.listar")->with(
                "info",
                "<strong><i class=1bi bi-check-circle-fill1></i> Exclusão realizada com sucesso </strong>"
            );
        }else{
            return redirect()->back()->with(
                "errors",
                "<strong> Falha em excluir o registro </strong>"
            );
        }
    }
}
