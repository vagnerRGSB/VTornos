<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idUsuario" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "nome" => [
                "type" => "varchar",
                "constraint" => 200
            ],
            "email" => [
                "type" => "varchar",
                "constraint" => 200,
                "unique" => true
            ],
            "senha" => [
                "type" => "varchar",
                "constraint" => 200,
            ]
        ]);
        $this->forge->addPrimaryKey("idUsuario");
        $this->forge->createTable("usuarios", true, [
            "engine" => "InnoDB"
        ]);
    }

    public function down()
    {
        $this->forge->dropTable("usuarios", true, true);
    }
}
