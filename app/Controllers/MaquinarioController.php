<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MaquinarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class MaquinarioController extends BaseController
{
    private $maquinario;

    public function __construct()
    {
        $this->maquinario = new MaquinarioModel();
    }
    public function listar()
    {
        $maquinarios = $this->maquinario->paginate(10);
        $pager = $this->maquinario->pager;

        return view(
            "maquinario/listar",
            [
                "maquinarios" => $maquinarios,
                "pager" => $pager
            ],
            [
                "cache" => 60,
                "cache_name" => "listar_maquinario"
            ]
        );
    }
    public function inserir()
    {
        return view(
            "maquinario/inserir",
            [],
            [
                "cache" => 60,
                "cache_name" => "inserir_maquinario"
            ]
        );
    }
    public function editar(int $param)
    {
        $maquinario = $this->maquinario->find($param);

        return view(
            "maquinario/editar",
            [
                "maquinario" => $maquinario
            ],
            [
                "cache" => 60,
                "cache_name" => "editar_maquinario"
            ]
        );
    }
    public function onSave()
    {
        $dados = [
            "idMaquinario" => $this->request->getPost("idMaquinario"),
            "nome" => $this->request->getPost("nome")
        ];

        if (empty($dados["idMaquinario"]) || $dados["idMaquinario"] == "") {
            if ($this->maquinario->save($dados)) {
                return redirect()->route("maquinario.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso </strong>"
                );
            } else {
                return redirect()->back()->with("errors", $this->maquinario->errors());
            }
        } else {
            if ($this->maquinario->save($dados)) {
                return redirect()->route("maquinario.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Atualização realizada com sucesso </strong>"
                );
            } else {
                return redirect()->back()->with("errors", $this->maquinario->errors());
            }
        }
    }

    public function onDelete(int $param)
    {
        $dados = $this->maquinario->find($param);

        if ($this->maquinario->delete($param)) {
            return redirect()->route("maquinario.listar");
        } else {
            return redirect()->route("maquinario.listar");
        }
    }
}
