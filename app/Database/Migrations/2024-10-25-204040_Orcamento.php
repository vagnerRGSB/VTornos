<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orcamento extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idOrcamento" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "idCliente" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "idSerie" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "observacao" => [
                "type" => "varchar",
                "constraint" => 200,
                "null" => true
            ]
        ]);

        $this->forge->addPrimaryKey("idOrcamento");
        $this->forge->addForeignKey(
            "idCliente",
            "clientes",
            "idCliente",
            "cascade",
            "cascade",
            "fk_clientes_has_orcamentos"
        );
        $this->forge->addForeignKey(
            "idSerie",
            "series",
            "idSerie",
            "cascade",
            "cascade",
            "fk_series_has_orcamentos"
        );
        $this->forge->createTable("orcamentos", true, ["engine" => "InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("orcamentos", true, true);
    }
}
