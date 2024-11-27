<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Marca extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idMarca" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "nome" => [
                "type" => "varchar",
                "constraint" => 200
            ]
        ]);
        $this->forge->addPrimaryKey("idMarca");
        $this->forge->createTable("marcas", true, [
            "engine" => "InnoDB"
        ]);
    }

    public function down()
    {
        $this->forge->dropTable("marcas", true);
    }
}
