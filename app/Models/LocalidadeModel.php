<?php

namespace App\Models;

use CodeIgniter\Model;

class LocalidadeModel extends Model
{
    protected $table            = 'localidades';
    protected $primaryKey       = 'idLocalidade';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "idCidade",
        "nome",
        "cep"
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
        "idCidade" => "required",
        "nome" => "required|max_length[200]|min_length[2]",
        "cep" => "required|max_length[8]|min_length[8]"
    ];
    protected $validationMessages   = [
        "idCidade" => [
            "required" => "O campo cidade é requirido"
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
