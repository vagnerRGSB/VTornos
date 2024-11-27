<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Maquinario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idMaquinario" => [
                "type" => "int",
                "constraint" => 200,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "nome" => [
                "type" => "varchar",
                "constraint" => 200
            ]
        ]);
        $this->forge->addPrimaryKey("idMaquinario");
        $this->forge->createTable("maquinarios", true, [
            "engine" => "InnoDB"
        ]);
    }

    public function down()
    {
        $this->forge->dropTable("maquinarios", true);
    }
}
