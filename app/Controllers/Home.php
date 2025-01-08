<?php

namespace App\Controllers;

use App\Models\AtividadeModel;
use App\Models\ClienteModel;
use App\Models\EstoqueModel;
use App\Models\SerieModel;

class Home extends BaseController
{
    
    private $db;
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function principal()
    {
       
        $consulta = $this->db->table("clientes");
        $consulta->select("count(idCliente) as total_clientes");
        $query = $consulta->get();
        $total_clientes = $query->getRow();

        // $total_clientes = $this->cliente->selectCount("idCliente","total_clientes")->findAll(); var_dump($total_clientes);die;

        $consulta = $this->db->table("series");
        $consulta-> select("count(idSerie) as total_series");
        $query = $consulta->get();
        $total_series = $query->getRow();

        //$total_series = $this->serie->selectCount("idSerie","total_series")->findAll();

        $consulta = $this->db->table("atividades");
        $consulta-> select("count(idAtividade) as total_atividades");
        $query = $consulta->get();
        $total_atividades = $query->getRow();

        //$total_atividades = $this->atividade->selectCount("idAtividade","total_atividades")->findAll();

        $consulta = $this->db->table("estoques");
        $consulta->select("count(idEstoque) as total_produtos");
        $query = $consulta->get();
        $total_produtos = $query->getRow();

        $consulta = $this->db->table("estoques");
        return view('home/principal', [
            "count_clientes" => $total_clientes != null ? $total_clientes : 0,
            "count_series" => $total_series != null ? $total_series : 0,
            "count_atividades" => $total_atividades != null ? $total_atividades : 0,
            "count_produtos" => $total_produtos != null ? $total_produtos : 0
        ]);
    }
}
