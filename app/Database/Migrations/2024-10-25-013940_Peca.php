<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peca extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idPeca" => [
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

        $this->forge->addPrimaryKey("idPeca");
        $this->forge->createTable("pecas",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("pecas",true,true);
    }
}
