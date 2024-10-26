<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cliente extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idCliente" => [
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
            "categoria" => [
                "type" => "varchar",
                "constraint" => 1,
                "default" => "f",
                "null" => true
            ],
            "nome" => [
                "type" => "varchar",
                "constraint" => 200,
            ],
            "cpfCnpj" => [
                "type" => "varchar",
                "constraint" => 20,
                "null" => true,
                "unique" => true
            ],
            "endereco" => [
                "type" => "varchar",
                "constraint" => 200,
                "null" => true
            ],
            "numero" => [
                "type" => "int",
                "constraint" => 6,
                "null" => true
            ],
            "complemento" => [
                "type" => "int",
                "constraint" => 200,
                "null" => true
            ],
            "email" => [
                "type" => "varchar",
                "constraint" => 200,
                "unique" => true,
                "null" => true
            ]
        ]);
        $this->forge->addPrimaryKey("idCliente");
        $this->forge->addForeignKey(
            "idLocalidade",
            "localidades",
            "idLocalidade",
            "cascade",
            "cascade",
            "fk_localidades_has_clientes"
        );
        $this->forge->createTable("clientes",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("clientes",true,true);
    }
}
