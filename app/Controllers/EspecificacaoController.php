<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EspecificacaoModel;
use App\Models\PecaModel;
use CodeIgniter\Entity\Cast\ObjectCast;
use CodeIgniter\HTTP\ResponseInterface;

class EspecificacaoController extends BaseController
{

    private $especificacao;
    private $peca;

    public function __construct()
    {
        $this->especificacao = new EspecificacaoModel();
        $this->peca = new PecaModel();
    }

    public function listar()
    {
        $especificacoes = $this->especificacao->select(
            "especificacoes.idEspecificacao as idEspec,
             especificacoes.dimensao as dismensaoEspec,
             especificacoes.especificacao as especEspec,
             pecas.nome as nomePeca"
        )->join(
            "pecas",
            "pecas.idPeca=especificacoes.idPeca",
            "inner"
        )->paginate(10);
        //var_dump($especificacoes);die;
        $pager = $this->especificacao->pager;
        return view("especificacao/listar", [
            "especificacoes" => $especificacoes,
            "pager" => $pager
        ]);
    }

    public function inserir()
    {
        $pecas = $this->peca->findAll();
        return view("especificacao/inserir", [
            "pecas" => $pecas
        ]);
    }

    public function editar(int $param)
    {
        $pecas = $this->peca->findAll();
        $especificacao = $this->especificacao->find($param);
        return view("especificacao/editar", [
            "pecas" => $pecas,
            "especificacao" => $especificacao
        ]);
    }

    public function onSave()
    {
        $dados = [
            "idEspecificacao" => $this->request->getPost("idEspecificacao"),
            "idPeca" => $this->request->getPost("idPeca"),
            "dimensao" => $this->request->getPost("dimensao"),
            "especificacao" => $this->request->getPost("especificacao")
        ];

        if (empty($dados["idEspecificacao"])) {
            if ($this->especificacao->save($dados)) {
                return redirect()->route("especificacao.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso: </strong>".$dados["dimensao"]." ".$dados["especificacao"]
                );
            }else{
                return redirect()->back()->with("erro",$this->especificacao->errors());
            }
        } else {
            if ($this->especificacao->save($dados)) {
                return redirect()->route("especificacao.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'> </i> Atualização realizada com sucesso: </strong>".$dados["dimensao"]." ".$dados["especificacao"]
                );
            }else{
                return redirect()->back()->with("erro",$this->especificacao->errors());
            }
        }
    }

    public function onDelete(int $param)
    {
        $dados = $this->especificacao->find($param);

        if($this->especificacao->delete($param)){
            return redirect()->route("especificacao.listar")->with("infoExclusao",$dados->especificacao);
        }
    }
}
