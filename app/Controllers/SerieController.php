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
        $series = $this->serie->paginate(10);
        $pager = $this->serie->pager;

        return view("serie/listar", [
            "series" => $series,
            "pager" => $pager
        ]);
    }
    public function inserir(){
        $modelos = $this->modelo->findAll();
        return view("serie/inserir",[
            "modelos" => $modelos
        ]);
    }

}
