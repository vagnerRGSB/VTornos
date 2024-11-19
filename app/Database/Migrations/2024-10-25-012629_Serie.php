<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Serie extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idSerie" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "idModelo" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "ano" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "null" => true
            ],
            "descricao" => [
                "type" => "varchar",
                "constraint" => 200,
                "null" => true
            ]
        ]);
        $this->forge->addPrimaryKey("idSerie");
        $this->forge->addForeignKey(
            "idModelo",
            "modelos",
            "idModelo"
        );
        $this->forge->createTable("series",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("series",true,true);
    }
}
