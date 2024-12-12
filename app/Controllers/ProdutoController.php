<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Orcamento;
use App\Models\EstoqueModel;
use App\Models\OrcamentoModel;
use App\Models\ProdutoModel;
use App\Models\ServicoModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProdutoController extends BaseController
{
    private $servico;
    private $orcamento;
    private $produto;
    private $estoque;

    public function __construct()
    {
        $this->servico = new ServicoModel();
        $this->orcamento = new OrcamentoModel();
        $this->produto = new ProdutoModel();
        $this->estoque = new EstoqueModel();
    }
    public function listar(int $idServico)
    {

        $infoServico = $this->servico->select(
            "orcamentos.idOrcamento, orcamentos.observacao as observacaoOrcamento,
            servicos.idServico,servicos.titulo as tituloServico,
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
        )->where("idServico", $idServico)->first();

        $produtos = $this->produto->select(
            "produtos.idProduto as idProduto, produtos.quantia as quantiaProduto,
            estoques.valor as valorProduto,
            pecas.nome as nomePeca,
            especificacoes.dimensao as dimensaoPeca, especificacoes.especificacao as especificacaoPeca,
            marcas.nome as nomeMarca"
        )->join(
            "estoques",
            "estoques.idEstoque=produtos.idEstoque",
            "inner"
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
        )->where("idServico",$idServico)->paginate(10);
        $pager = $this->produto->pager;
       
        return view(
            "produto/listar",
            [
                "infoServico" => $infoServico,
                "produtos" => $produtos,
                "pager" => $pager
            ],
            []
        );
    }
    public function inserir(int $idServico)
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
        )->where("idServico", $idServico)->first();

        $estoques = $this->estoque->select(
            "estoques.idEstoque as idEstoque,
            pecas.nome as nomePeca,
            especificacoes.dimensao as dimensaoPeca, especificacoes.especificacao as especificacaoPeca,
            marcas.nome as nomeMarca"
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
        )->orderBy("idEstoque")->findAll();
        return view(
            "produto/inserir",
            [
                "infoServico" => $infoServico,
                "estoques" => $estoques,
                "idServico" => $idServico
            ]
        );
    }

    public function editar(int $idProduto)
    {
        $produto = $this->produto->find($idProduto);

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
        )->where("idServico", $produto->idServico)->first();

        $estoques = $this->estoque->select(
            "estoques.idEstoque as idEstoque,
            pecas.nome as nomePeca,
            especificacoes.dimensao as dimensaoPeca, especificacoes.especificacao as especificacaoPeca,
            marcas.nome as nomeMarca"
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
        )->orderBy("idEstoque")->findAll();

        return view("produto/editar",[
            "infoServico" => $infoServico,
            "produto"=>$produto,
            "estoques"=> $estoques
        ]);

    }
    public function onSave()
    {
        $dados = [
            "idProduto" => $this->request->getPost("idProduto"),
            "idServico" => $this->request->getPost("idServico"),
            "idEstoque" => $this->request->getPost("idEstoque"),
            "quantia" => $this->request->getPost("quantia")
        ];
       
        
        if(empty($dados["idProduto"])){
            if($this->produto->save($dados)){
                return redirect()->to(base_url("produto/listar/".$dados["idServico"]))->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso </strong>"
                );
            }else{
                return redirect()->back()->with(
                    "errors",
                    $this->produto->errors()
                );
            }
        }else{
            if($this->produto->save($dados)){
                return redirect()->to(base_url("produto/listar/".$dados["idServico"]))->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Atualização realizada com sucesso </strong>"
                );
            }else{
                return redirect()->back()->with(
                    "errors",
                    $this->produto->errors()
                );
            }
        }
    }
}
