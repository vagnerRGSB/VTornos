<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MaquinarioModel;
use App\Models\MarcaModel;
use App\Models\ModeloModel;
use CodeIgniter\HTTP\ResponseInterface;

class ModeloController extends BaseController
{
    private $modelo, $maquinario, $marca;

    public function __construct()
    {
        $this->modelo = new ModeloModel();
        $this->maquinario = new MaquinarioModel();
        $this->marca = new MarcaModel();
    }
    public function listar()
    {
        $modelos = $this->modelo->select(
            "modelos.idModelo as idModelo, modelos.nome as nomeModelo,
            marcas.nome as nomeMarca,
            maquinarios.nome as nomeMaquinario"
        )->join(
            "marcas",
            "marcas.idMarca=modelos.idMarca",
            "inner"
        )->join(
            "maquinarios",
            "maquinarios.idMaquinario=modelos.idMaquinario",
            "inner"
        )->paginate(10);
        $pager = $this->modelo->pager;

        return view("modelo/listar", [
            "modelos" => $modelos,
            "pager" => $pager
        ], [
            "cache" => 60,
            "cache_name" => "listar_modelo"
        ]);
    }

    public function inserir()
    {
        $maquinarios = $this->maquinario->findAll();
        $marcas = $this->marca->findAll();

        return view(
            "modelo/inserir",
            [
                "marcas" => $marcas,
                "maquinarios" => $maquinarios
            ],
            [
                "cache" => 60,
                "cache_name" => "inserir_modelo"
            ]
        );
    }

    public function editar(int $param)
    {
        $modelo = $this->modelo->find($param);
        $marcas = $this->marca->findAll();
        $maquinarios = $this->maquinario->findAll();

        return view(
            "modelo/editar",
            [
                "modelo" => $modelo,
                "marcas" => $marcas,
                "maquinarios" => $maquinarios
            ],
            [
                "cache" => 60,
                "cache_name" => "editar_modelo"
            ]
        );
    }

    public function onSave()
    {
        $dados = [
            "idModelo" => $this->request->getPost("idModelo"),
            "idMarca" => $this->request->getPost("idMarca"),
            "idMaquinario" => $this->request->getPost("idMaquinario"),
            "nome" => $this->request->getPost("nome")
        ];
        if (empty($dados["idModelo"]) || $dados["idModelo"] == "") {
            if ($this->modelo->save($dados)) {
                return redirect()->route("modelo.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso </strong>"
                );
            } else {
                return redirect()->back()->with("errors", $this->modelo->errors());
            }
        } else {
            if ($this->modelo->save($dados)) {
                return redirect()->route("modelo.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Atualização realizada com sucesso </strong>"
                );
            } else {
                return redirect()->back()->with("errors", $this->modelo->errors());
            }
        }
    }

    public function onDelete(int $param)
    {

        //var_dump($param);die;
        if ($this->modelo->delete($param)) {
            return redirect()->route("modelo.listar")->with(
                "info",
                "<strong> <i class='bi bi-check-circle-fill'></i> Exclusão realizada com sucesso </strong>"
            );
        } else {
            return redirect()->route("modelo.listar")->with(
                "errors",
                "Falha em excluir o registro"
            );
        }
    }
}
