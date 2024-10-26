<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Localidade extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idLocalidade" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "idCidade" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "nome" => [
                "type" => "varchar",
                "constraint" => 200
            ],
            "cep" => [
                "type" => "varchar",
                "constraint" => "20"
            ]
        ]);
        $this->forge->addPrimaryKey("idLocalidade");
        $this->forge->addForeignKey(
            "idCidade",
            "cidades",
            "idCidade",
            "cascade",
            "cascade",
            "fk_cidades_has_localidades"
        );
        $this->forge->createTable("localidades",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("localidades",true,true);
    }
}
