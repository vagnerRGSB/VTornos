<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModel;
use App\Models\InscricaoModel;
use App\Models\LocalidadeModel;
use BackedEnum;
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
        )->where("idCliente", $idCliente)->paginate(10);
        $pager = $this->inscricao->pager;
        //var_dump($inscricoes);die;
        return view("inscricao/listar", [
            "inscricoes" => $inscricoes,
            "pager" => $pager,
            "cliente" => $cliente
        ]);
    }

    public function inserir(int $idCliente)
    {
        $cliente = $this->cliente->find($idCliente);
        $localidades = $this->localidade->select(
            "localidades.idLocalidade, localidades.nome as nomeLocalidade,
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

    public function editar(int $idInscricao)
    {
        $localidades = $this->localidade->select(
            "localidades.idLocalidade, localidades.nome as nomeLocalidade,
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
        $inscricao = $this->inscricao->find($idInscricao);
        $cliente = $this->cliente->find($inscricao->idCliente);

        return view("inscricao/editar", [
            "localidades" => $localidades,
            "inscricao" => $inscricao,
            "cliente" => $cliente
        ]);
    }

    public function onSave()
    {
        $dados = [
            "idInscricao" => $this->request->getPost("idInscricao"),
            "idLocalidade" => $this->request->getPost("idLocalidade"),
            "idCliente" => $this->request->getPost("idCliente"),
            "nome" => $this->request->getPost("nome"),
            "inscMunicipal" => $this->request->getPost("inscMunicipal"),
            "inscEstadual" => $this->request->getPost("inscEstadual"),
            "endereco" => $this->request->getPost("endereco")
        ];
        //var_dump($dados);die;

        if (empty($dados["idInscricao"])) {
            if ($this->inscricao->save($dados)) {
                return redirect()->route("inscricao.listar",$dados["idCliente"])->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso </strong>"
                );
            } else {
                return redirect()->back()->with(
                    "errors",
                    $this->inscricao->errors()
                );
            }
        } else {
            if ($this->inscricao->save($dados)) {
                return redirect()->to(base_url("inscricao-cliente/listar/".$dados["idCliente"]))->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Atualização realizada com sucesso </strong>"
                );
            } else {
                return redirect()->back()->with(
                    "errors",
                    $this->inscricao->errors()
                );
            }
        }
    }

    public function onDelete(int $idInscricao)
    {
        if($this->inscricao->delete($idInscricao)){
            return redirect()->route("cliente.listar")->with(
                "info",
                "<strong> <i class='bi bi-check-circle-fill'></i> Exclusão de inscrição realizada com sucesso </strong>"
            );
        }else{
            return redirect()->back()->with(
                "errors",
                $this->inscricao->errors()
            );
        }
    }
}
