<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cidade extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idCidade" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "idEstado" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "nome" => [
                "type" => "varchar",
                "constraint" => 200
            ]
            ]);
            $this->forge->addPrimaryKey("idCidade");
            $this->forge->addForeignKey(
                "idEstado",
                "estados",
                "idEstado"
            );
            $this->forge->createTable("cidades",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("cidades",true);
        
    }
}
