<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Modelo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idModelo" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "idMaquinario" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "idMarca" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "nome" => [
                "type" => "varchar",
                "constraint" => 200
            ]
        ]);
        $this->forge->addPrimaryKey("idModelo");
        $this->forge->addForeignKey(
            "idMaquinario",
            "maquinarios",
            "idMaquinario",
            "cascade",
            "cascade",
            "fk_maquinarios_has_modelos"
        );
        $this->forge->addForeignKey(
            "idMarca",
            "marcas",
            "idMarca",
            "cascade",
            "cascade",
            "fk_marcas_has_modelos"
        );
        $this->forge->createTable("modelos",true,["engine"=>"InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("modelos",true,true);
    }
}
