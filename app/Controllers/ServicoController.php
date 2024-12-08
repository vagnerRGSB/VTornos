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
            "servico/listar",
            [
                "orcamento" => $orcamento,
                "maquinario" => $maquinario,
                "cliente" => $cliente,
                "servicos" => $servicos,
                "pager" => $pager
            ],
            [
                "cache" => 60,
                "cache_name" => "listar_servico"
            ]
        );
    }
    public function inserir(int $idOrcamento)
    {
        $orcamento = $this->orcamento->find($idOrcamento);
        $atividades = $this->atividade->findAll();


        return view(
            "servico/inserir",
            [
                "orcamento" => $orcamento,
                "atividades" => $atividades
            ],
            [
                "cache" => 60,
                "cache_name" => "inserir_servico"
            ]
        );
    }
    public function editar(int $idServico)
    {
       
        $servico = $this->servico->find($idServico);
        $atividades = $this->atividade->findAll();

        return view(
            "servico/editar",
            [
                "servico" => $servico,
                "atividades" => $atividades
            ]

        );
    }
    public function onSave()
    {
        $dados = [
            "idServico" => $this->request->getPost("idServico"),
            "idAtividade" => $this->request->getPost("idAtividade"),
            "idOrcamento" => $this->request->getPost("idOrcamento"),
            "dataCadastro" => $this->request->getPost("dataCadastro"),
            "titulo" => $this->request->getPost("titulo"),
            "descricao" => $this->request->getPost("descricao"),
            "minutoServico" => $this->request->getPost("minutoServico")
        ];
        //var_dump($dados);die;
        if (empty($dados["idServico"])) {
            if ($this->servico->save($dados)) {
                return redirect()->to(base_url("servico/listar" . $dados["idOrcamento"]))->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso </strong>"
                );
            } else {
                return redirect()->back()->with(
                    "errors",
                    $this->servico->errors()
                );
            }
        } else {
            if ($this->servico->save($dados)) {
                return redirect()->to(base_url("servico/listar/". $dados["idOrcamento"]))->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Atualização realizada com sucesso </strong>"
                );
            } else {
                return redirect()->back()->with(
                    "errors",
                    $this->servico->errors()
                );
            }
        }
    }
    public function onDelete(int $idServico)
    {

        if ($this->servico->delete($idServico)) {
            return redirect()->to(base_url("servico/listar/" . $idServico))->with(
                "info",
                "<strong> Exclusão realizada com sucesso </strong>"
            );
        } else {
            return redirect()->back()->with(
                "errors",
                "<strong> Não foi possível excluir seguinte registro </strong>"
            );
        }
    }
}
