<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModeloModel;
use App\Models\SerieModel;
use CodeIgniter\HTTP\ResponseInterface;

class SerieController extends BaseController
{
    private $serie;
    private $modelo;

    public function __construct()
    {
        $this->serie = new SerieModel();
        $this->modelo = new ModeloModel();
    }
    public function listar()
    {
        $series = $this->serie->select(
            "series.idSerie as idSerie, series.descricao as descricaoSerie,
            modelos.nome as nomeModelo,
            marcas.nome as nomeMarca"
        )->join(
            "modelos",
            "modelos.idModelo=series.idModelo",
            "inner"
        )->join(
            "marcas",
            "marcas.idMarca=modelos.idMarca",
            "inner"
        )->orderBy("idSerie")->paginate(10);

        //var_dump($series);die;
        $pager = $this->serie->pager;

        return view("serie/listar", [
            "series" => $series,
            "pager" => $pager
        ]);
    }
    public function inserir()
    {
        $modelos = $this->modelo->findAll();
        return view("serie/inserir", [
            "modelos" => $modelos
        ]);
    }

    public function editar(int $param)
    {
        $serie = $this->serie->find($param);
        $modelos = $this->modelo->findAll();

        return view("serie/editar", [
            "serie" => $serie,
            "modelos" => $modelos
        ]);
    }

    public function onSave()
    {
        $dados = [
            "idSerie"   => $this->request->getPost("idSerie"),
            "idModelo"  => $this->request->getPost("idModelo"),
            "descricao" => $this->request->getPost("descricao"),
        ];

        //var_dump($dados);die;

        if (empty($dados["idSerie"])) {
            if ($this->serie->save($dados)) {
                return redirect()->route("serie.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso </strong>" .
                $dados["descricao"]);
            } else {
                return redirect()->back()->with("errors", $this->serie->errors());
            }
        } else {
            if ($this->serie->save($dados)) {
                return redirect()->route("serie.listar")->with("info",
            "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso </strong>");
            } else {
                return redirect()->back()->with("errors", $this->serie->errors());
            }
        }
    }

    public function onDelete(int $param)
    {

        if ($this->serie->delete($param)) {
            return redirect()->route("serie.listar");
        } else {
            return redirect()->redirect("serie.listar");
        }
    }
}
