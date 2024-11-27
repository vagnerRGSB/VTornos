<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estoque extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idEstoque" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "idMarca" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "idEspecificacao" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "valor" => [
                "type" => "double",
                "null" => true,
                "default" => 0,
                "unsigned" => true
            ],
            "quantiaEstoque" => [
                "type" => "double",
                "null" => true,
                "default" => 0,
                "unsigned" => true
            ],
            "modo" => [
                "type" => "int",
                "unsigned" => true
            ],
            "minimoEstoque"=>[
                "type" => "double",
                "null" => true,
                "default" => 0,
                "unsigned" => true
            ]
        ]);
        $this->forge->addPrimaryKey("idEstoque");
        $this->forge->addForeignKey(
            "idMarca",
            "marcas",
            "idMarca"
        );
        $this->forge->addForeignKey(
            "idEspecificacao",
            "especificacoes",
            "idEspecificacao",
        );
        $this->forge->createTable("estoques",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("estoques",true);
    }
}
