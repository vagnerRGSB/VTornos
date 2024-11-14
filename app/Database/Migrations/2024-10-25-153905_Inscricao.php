<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inscricao extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idInscricao" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "idLocalidade" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "idCliente" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "nome" => [
                "type" => "varchar",
                "constraint" => 200
            ],
            "inscMunicipal" => [
                "type" => "varchar",
                "constraint" => 20,
                "null" => true
            ],
            "inscEstadual" => [
                "type" => "varchar",
                "constraint" => 20,
                "null" => true
            ],
            "endereco" => [
                "type" => "varchar",
                "constraint" => 200,
                "null" => true
            ]
        ]);
        $this->forge->addPrimaryKey("idInscricao");
        $this->forge->addForeignKey(
            "idLocalidade",
            "localidades",
            "idLocalidade",
            "cascade",
            "cascade",
            "fk_localidades_has_inscricoes"
        );
        $this->forge->createTable("inscricoes",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("inscricoes",true,true);
    }
}
