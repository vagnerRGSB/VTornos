<?php

namespace App\Models;

use CodeIgniter\Model;

class EstoqueModel extends Model
{
    protected $table            = 'estoques';
    protected $primaryKey       = 'idEstoque';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "idMarca",
        "idEspecificacao",
        "valor",
        "quantiaEstoque",
        "minimoEstoque",
        "modo"
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
        "idMarca" => "required",
        "idEspecificacao" => "required",
        "valor" => "required",
        "quantiaEstoque" => "required",
        "minimoEstoque" => "required",
        "modo" => "required"
    ];
    protected $validationMessages   = [
        "idMarca" => [
            "required" => "O campo marca é requerido"
        ],
        "idEspecificacao" => [
            "required" => "O campo especificacação é requirido"
        ],
        "valorUnitario" => [
            "required" => "O campo valor unitário é requerido"
        ],
        "quantiaEstoque" => [
            "required" => "O campo quantia estoque é requerido"
        ],
        "minimoEstoque" => [
            "required" => "O campo mínimo em estoque é requerido"
        ],
        "modo" => [
            "required" => "O Campo modelo organização é requirido"
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
