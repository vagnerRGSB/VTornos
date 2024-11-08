<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PecaModel;
use CodeIgniter\HTTP\ResponseInterface;

class PecaController extends BaseController
{
    private $peca;

    public function __construct()
    {
        $this->peca = new PecaModel();
    }
    public function listar()
    {
        $pecas = $this->peca->paginate(10);
        $pager = $this->peca->pager;
        return view("peca/listar", [
            "pecas" => $pecas,
            "pager" => $pager
        ]);
    }

    public function inserir()
    {

        return view("peca/inserir");
    }

    public function editar(int $param)
    {
        //var_dump($param);die;
        $peca = $this->peca->find($param);
        return view("peca/editar", [
            "peca" => $peca
        ]);
    }

    public function onSave()
    {
        $dados = [
            "idPeca" => $this->request->getPost("idPeca"),
            "nome" => $this->request->getPost("nome")
        ];

        if (empty($dados["idPeca"])) {
            if ($this->peca->save($dados)) {
                return redirect()->route("peca.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso: </strong>" . $dados["nome"]
                );
            } else {
                return redirect()->back()->with("error", $this->peca->errors());
            }
        } else {
            if ($this->peca->save($dados)) {
                return redirect()->route("peca.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Atualização realizada com sucesso: </strong>" . $dados["nome"]
                );
            } else {
                return redirect()->back()->with("erro", $this->peca->errors());
            }
        }
    }

    public function onDelete($param)
    {
        $dados = $this->peca->find($param);

        if ($this->peca->delete($param)) {
            return redirect()->route("peca.listar")->with("infoExclusao", $dados->nome);
        } else {
            return redirect()->route("peca.listar");
        }
    }
}
