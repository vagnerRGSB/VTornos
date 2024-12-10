<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MarcaModel;
use CodeIgniter\HTTP\ResponseInterface;

class MarcaController extends BaseController
{

    private $marca;

    public function __construct()
    {
        $this->marca = new MarcaModel();
    }
    public function listar()
    {
        $marcas = $this->marca->paginate(10);
        $pager = $this->marca->pager;

        return view(
            "marca/listar",
            [
                "marcas" => $marcas,
                "pager" => $pager
            ]
        );
    }
    public function inserir()
    {

        return view(
            "marca/inserir",
            []
        );
    }

    public function editar(int $param)
    {

        $marca = $this->marca->find($param);

        return view(
            "marca/editar",
            [
                "marca" => $marca
            ]
        );
    }

    public function onSave()
    {
        $dados = [
            "idMarca" => $this->request->getPost("idMarca"),
            "nome" => $this->request->getPost("nome")
        ];

        if (empty($dados["idMarca"])) {
            if ($this->marca->save($dados)) {
                return redirect()->route("marca.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso: </strong>"
                );
            } else {
                return redirect()->back()->with("errors", $this->marca->errors());
            }
        } else {
            if ($this->marca->save($dados)) {
                return redirect()->route("marca.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Atualização realizada com sucesso: </strong>"
                );
            } else {
                return redirect()->back()->with("errors", $this->marca->errors());
            }
        }
    }

    public function onDelete(int $param)
    {
        if ($this->marca->delete($param)) {
            return redirect()->route("marca.listar");
        } else {
            return redirect()->route("marca.listar");
        }
    }
}
