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
            "descricao" => [
                "type"=>"varchar",
                "constraint"=>300
            ],
            "minutoServico"=>[
                "type"=>"int",
                "constraint"=>5
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
        $this->forge->dropTable("servicos", true, true);
    }
}
