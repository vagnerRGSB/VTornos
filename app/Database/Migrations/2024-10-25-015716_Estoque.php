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
            "valorUnitario" => [
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
            ]
        ]);
        $this->forge->addPrimaryKey("idEstoque");
        $this->forge->addForeignKey(
            "idMarca",
            "marcas",
            "idMarca",
            "cascade",
            "cascade",
            "fk_marcas_has_estoques"
        );
        $this->forge->addForeignKey(
            "idEspecificacao",
            "especificacoes",
            "idEspecificacao",
            "cascade",
            "cascade",
            "fk_especificacoes_has_estoques"
        );
        $this->forge->createTable("estoques",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("estoques",true,true);
    }
}
