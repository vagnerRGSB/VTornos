<?php

namespace App\Controllers;

use App\Models\EstoqueModel;

class Home extends BaseController
{
    private $produto_estoque;

    public function __construct()
    {
        $this->produto_estoque = new EstoqueModel();
    }
    public function principal()
    {
        $param_where = [
            "result" => "quantiaEstoque < minimoEstoque"
        ];
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
            "produto_estoques" => $produtos_estoques,
            "pager" => $pager
        ]);
    }
}
