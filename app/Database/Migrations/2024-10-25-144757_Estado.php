<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estado extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idEstado" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "nome" => [
                "type" => "varchar",
                "constraint" => 200
            ],
            "sigla" => [
                "type" => "varchar",
                "constraint" => 2
            ]
            ]);
            $this->forge->addPrimaryKey("idEstado");
            $this->forge->createTable("estados",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("estados",true);
    }
}
