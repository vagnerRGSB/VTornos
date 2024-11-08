<?php

namespace App\Models;

use CodeIgniter\Model;

class EspecificacaoModel extends Model
{
    protected $table            = 'especificacoes';
    protected $primaryKey       = 'idEspecificacao';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "idPeca",
        "dimensao",
        "especificacao"
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
        "idPeca" => "required",
        "dimensao" => "required|max_length[200]|min_length[10]",
        "especificacao" => "required|max_length[200]|min_length[10]"
    ];
    protected $validationMessages   = [
        "idPeca" => [
            "required" => "O campo peça é requirido"
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
