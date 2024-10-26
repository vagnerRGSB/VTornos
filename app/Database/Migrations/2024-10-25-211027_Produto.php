<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idProduto" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "quantia" => [
                "type" => "double"
            ],
            "idServico" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "idEstoque" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ]
        ]);
        $this->forge->addPrimaryKey("idProduto");
        $this->forge->addForeignKey(
            "idServico",
            "servicos",
            "idservico",
            "cascade",
            "cascade",
            "fk_servicos_has_produtos"
        );
        $this->forge->addForeignKey(
            "idEstoque",
            "estoques",
            "idEstoque",
            "cascade",
            "cascade",
            "fk_estoques_has_produtos"
        );
        $this->forge->createTable("produtos", true, ["engine" => "InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("produtos", true, true);
    }
}
