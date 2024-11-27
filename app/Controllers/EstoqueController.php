<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EspecificacaoModel;
use App\Models\EstoqueModel;
use App\Models\MarcaModel;
use CodeIgniter\HTTP\ResponseInterface;

class EstoqueController extends BaseController
{

    private $estoque;
    private $marca;
    private $especificacao;

    public function __construct()
    {
        $this->estoque          = new EstoqueModel();
        $this->marca            = new MarcaModel();
        $this->especificacao    = new EspecificacaoModel();
    }
    public function listar()
    {
        $estoques = $this->estoque->select(
            "estoques.idEstoque as idEstoque,
             pecas.nome as nomePeca,
             especificacoes.dimensao as dimensaoEspec,
             marcas.nome as nomeMarca"
        )->join(
            "especificacoes",
            "especificacoes.idEspecificacao=estoques.idEspecificacao",
            "inner"
        )->join(
            "marcas",
            "marcas.idMarca=estoques.idMarca",
            "inner"
        )->join(
            "pecas",
            "pecas.idPeca=especificacoes.idPeca"
        )->paginate(10);
        $pager = $this->estoque->pager;

        return view("estoque/listar", [
            "estoques" => $estoques,
            "pager" => $pager
        ]);
    }

    public function inserir()
    {

        $marcas = $this->marca->findAll();
        $especificacoes = $this->especificacao->select(
            "especificacoes.idEspecificacao as idEspec, especificacoes.dimensao as dimensaoEspec, especificacoes.especificacao as especEspec,
            pecas.nome as nomePeca"
        )->join(
            "pecas",
            "especificacoes.idPeca=pecas.idPeca",
            "inner"
        )->findAll();

        return view("estoque/inserir", [
            "marcas" => $marcas,
            "especificacoes" => $especificacoes
        ]);
    }

    public function editar(int $param)
    {
        $estoque = $this->estoque->find($param);
        $marcas = $this->marca->findAll();
        $especificacoes = $this->especificacao->select(
            "especificacoes.idEspecificacao as idEspec, especificacoes.dimensao as dimensaoEspec, especificacoes.especificacao as especEspec,
            pecas.nome as nomePeca"
        )->join(
            "pecas",
            "especificacoes.idPeca=pecas.idPeca",
            "inner"
        )->findAll();
        return view("estoque/editar", [
            "estoque" => $estoque,
            "marcas" => $marcas,
            "especificacoes" => $especificacoes
        ]);
    }

    public function onSave()
    {
        $dados = [
            "idEstoque" => $this->request->getPost("idEstoque"),
            "idMarca" => $this->request->getPost("idMarca"),
            "idEspecificacao" => $this->request->getPost("idEspecificacao"),
            "valor" => $this->request->getPost("valor"),
            "quantiaEstoque" => $this->request->getPost("quantiaEstoque"),
            "minimoEstoque" => $this->request->getPost("minimoEstoque"),
            "modo" => $this->request->getPost("modo")
        ];

        //var_dump($dados);die;

        if (empty($dados["idEstoque"])) {
            if ($this->estoque->save($dados)) {
                return redirect()->route("estoque.listar")->with(
                    "info",
                    "<strong> Inserção realizado como sucesso: </strong>"
                );
            } else {
                return redirect()->back()->with(
                    "errors",
                    $this->estoque->errors()
                );
            }
        } else {
            if ($this->estoque->save($dados)) {
                return redirect()->route("estoque.listar")->with(
                    "info",
                    "<strong> Atualizaçao realizado como sucesso </strong>"
                );
            } else {
                return redirect()->back()->with(
                    "errors",
                    $this->estoque->errors()
                );
            }
        }
    }

    public function onDelete(int $param)
    {
        if ($this->estoque->delete($param)) {
            return redirect()->route("estoque.listar")->with(
                "info",
                "<strong> <i class='bi bi-check-circle-fill'></i> Registro excluído com sucesso </strong>"
            );
        } else {
            return redirect()->back()->with(
                "error",
                "Não foi possível realizar operação de exclusão"
            );
        }
    }
}
