<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModel;
use App\Models\InscricaoModel;
use App\Models\LocalidadeModel;
use CodeIgniter\HTTP\ResponseInterface;

class InscricaoController extends BaseController
{

    private $cliente;
    private $inscricao;
    private $localidade;

    public function __construct()
    {
        $this->cliente = new ClienteModel();
        $this->inscricao = new InscricaoModel();
        $this->localidade = new LocalidadeModel();
    }

    public function listar(int $idCliente)
    {
        $cliente = $this->cliente->select(
            "clientes.idCliente, clientes.nome as nomeCliente, clientes.cpfCnpj as cpfCnpjCliente,
            clientes.categoria as categoriaCliente"
        )->find($idCliente);
        return view("inscricao/listar", [
            "cliente" =>  $cliente
        ]);
    }
    public function inserir(int $idCliente)
    {
        $cliente = $this->cliente->find($idCliente);
        $localidades = $this->localidade->select(
            "localidades.idLocalidade, localidades.nome as nomeLocalidade, localidades.cep as cepLocalidade,
            cidades.nome as nomeCidade,
            estados.sigla as siglaEstado"
        )->join(
            "cidades",
            "cidades.idCidade=localidades.idCidade",
            "inner"
        )->join(
            "estados",
            "estados.idEstado=cidades.idEstado",
            "inner"
        )->findAll();
        return view("inscricao/inserir", [
            "cliente" => $cliente,
            "localidades" => $localidades
        ]);
    }

    public function editar(int $idIncricacao)
    {
        $inscricao = $this->inscricao->find($idIncricacao);
        $dados_cliente = $this->cliente->find($inscricao->idCliente);

        var_dump($inscricao);
        var_dump($dados_cliente);
        die;
        return view("inscricao/editar", [
            "inscricao" => $inscricao,
            "cliente" => $dados_cliente
        ]);
    }
    public function onSave()
    {
        $dados = [
            "idInscricao" => $this->request->getPost("idInscricao"),
            "idCliente" => $this->request->getPost("idCliente"),
            "nome" => $this->request->getPost("nome"),
            "insMunicipal" => $this->request->getPost("inscMunicipal"),
            "inscEstadual" => $this->request->getPost("inscEstadual"),
            "idLocalidade" => $this->request->getPost("idLocalidade"),
            "endereco" => $this->request->getPost("endereco")
        ];
        //var_dump($dados);die;
        if (empty($dados["idInscricao"])) {
            if ($this->inscricao->save($dados)) {
                return redirect()->route("inscricao.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso: </strong>" . $dados["nome"]
                );
            } else {
                return redirect()->back()->with("errors", $this->inscricao->errors());
            }
        } else {
            if ($this->inscricao->save($dados)) {
                return redirect()->route("inscricao.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Atualização realizada com sucesso: </strong>" . $dados["nome"]
                );
            } else {
                return redirect()->back()->with("errors", $this->inscricao->errors());
            }
        }
    }

    public function onDelete(int $param)
    {
        $dados = $this->inscricao->find($param);

        if($this->inscricao->delete($param)){
            return redirect()->route("inscricao.listar")->with(
                "info",
                "<strong> <i class='bi bi-check-circle-fill'></i> Exclusão realizada com sucesso </strong>"
            );
        }else{
            return redirect()->back()->with(
                "errors",
                "<strong> Erro em excluir dado </strong>"
            );
        }
    }
}
