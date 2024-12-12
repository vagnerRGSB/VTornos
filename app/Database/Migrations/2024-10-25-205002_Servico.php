<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Servico extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "idServico" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "idOrcamento" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "idAtividade" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true
            ],
            "dataCadastro" => [
                "type"=>"date"
            ],
            "titulo"=>[
                "type"=>"varchar",
                "constraint"=>200
            ],
            "descricao" => [
                "type"=>"varchar",
                "constraint"=>300
            ],
            "valor"=>[
                "type"=>"double"
            ]
        ]);
        $this->forge->addPrimaryKey("idServico");
        $this->forge->addForeignKey(
            "idAtividade",
            "atividades",
            "idAtividade"
        );
        $this->forge->addForeignKey(
            "idOrcamento",
            "orcamentos",
            "idOrcamento"
        );
        $this->forge->createTable("servicos", true, ["engine" => "InnoDB"]);
    }

    public function down()
    {
        $this->forge->dropTable("servicos", true);
    }
}
