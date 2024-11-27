<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Especificacao extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idEspecificacao" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "idPeca" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "dimensao" => [
                "type" => "varchar",
                "constraint" => 200
            ],
            "especificacao" => [
                "type" => "varchar",
                "constraint" => 200,
                "null" => true
            ]
        ]);
        $this->forge->addPrimaryKey("idEspecificacao");
        $this->forge->addForeignKey(
            "idPeca",
            "pecas",
            "idPeca"
        );
        $this->forge->createTable("especificacoes",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("especificacoes",true);
    }
}
