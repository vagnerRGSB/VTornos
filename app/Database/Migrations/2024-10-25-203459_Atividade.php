<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Atividade extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idAtividade" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "nome" => [
                "type" => "varchar",
                "constraint" => 200,
            ],
            "valor" => [
                "type" => "double",
                "null" => true,
                "default" => 0
            ]
        ]);
        $this->forge->addPrimaryKey("idAtividade");
        $this->forge->createTable("atividades", true, ["engine" => "InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("atividades", true);
    }
}
