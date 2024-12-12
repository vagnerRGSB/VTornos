<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicoModel extends Model
{
    protected $table            = 'servicos';
    protected $primaryKey       = 'idServico';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "idOrcamento",
        "idAtividade",
        "titulo",
        "dataCadastro",
        "descricao",
        "valor"
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        "idAtividade" => "required",
        "dataCadastro" => "required",
        "titulo" => "required|min_length[3]|max_length[200]",
        "descricao"=>"required|min_length[3]|max_length[300]",
        "valor"=>"required"
    ];
    protected $validationMessages   = [
        "idAtividade"=>[
            "required" => "O campo atividade é requerido."
        ],
        "dataCadastro" => [
            "required" => "O campo data é requerido."
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
