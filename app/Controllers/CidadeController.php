<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CidadeModel;
use App\Models\EstadoModel;
use CodeIgniter\HTTP\ResponseInterface;

class CidadeController extends BaseController
{

    private $cidade;
    private $estado;

    public function __construct()
    {
        $this->cidade = new CidadeModel();
        $this->estado = new EstadoModel();
    }
    public function listar()
    {
        $cidades = $this->cidade->select(
            "cidades.idCidade as idCidade, cidades.nome as nomeCidade,
            estados.sigla as siglaEstado"
        )->join(
            "estados",
            "estados.idEstado=cidades.idEstado",
            "inner"
        )->paginate(10);
        $pager = $this->cidade->pager;

        return view("cidade/listar", [
            "cidades" => $cidades,
            "pager" => $pager
        ]);
    }

    public function inserir()
    {
        $estados = $this->estado->findAll();

        return view("cidade/inserir", [
            "estados" => $estados
        ]);
    }

    public function editar(int $param)
    {
        $cidade = $this->cidade->find($param);
        $estados = $this->estado->findAll();

        return view("cidade/editar", [
            "cidade" => $cidade,
            "estados" => $estados
        ]);
    }

    public function onSave()
    {
        $dados = [
            "idCidade" => $this->request->getPost("idCidade"),
            "idEstado" => $this->request->getPost("idEstado"),
            "nome" => $this->request->getPost("nome")
        ];

        if (empty($dados["idCidade"])) {
            if ($this->cidade->save($dados)) {
                return redirect()->route("cidade.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso </strong> "
                );
            } else {
                return redirect()->back()->with("errors", $this->cidade->errors());
            }
        } else {
            if ($this->cidade->save($dados)) {
                return redirect()->route("cidade.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Atualização realizada com sucesso </strong> "
                );
            } else {
                return redirect()->back()->with("errors", $this->cidade->errors());
            }
        }
    }

    public function onDelete(int $param)
    {
        $dados = $this->cidade->find($param);

        if ($this->cidade->delete($param)) {
            return redirect()->route("cidade.listar")->with(
                "info",
                "<strong> Exclusão realizada com sucesso: </strong>" . $dados->nome
            );
        } else {
            return redirect()->route("cidade.listar")->with(
                "error",
                "Não foi possível realizar a exclusão"
            );
        }
    }
}
