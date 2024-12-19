<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $table            = 'clientes';
    protected $primaryKey       = 'idCliente';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "idLocalidade",
        "categoria",
        "nome",
        "cpfCnpj",
        "endereco",
        "numero",
        "complemento",
        "email"
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
        "idLocalidade" => "required",
        "categoria" => "required",
        "nome" => "required|min_length[3]|max_length[200]",
        "cpfCnpj" => "required",
        "numero" => "required",
        "endereco" => "required|min_length[3]|max_length[200]",
        "email" => "valid_email|max_length[200]|min_length[3]",
        "complemento" => "max_length[200]"
    ];
    protected $validationMessages   = [
        "idLocalidade" => [
            "required" => "O campo localidade é requerido."
        ],
        "cpfCnpj" => [
            "required" => "O campo cpf ou cnpj é requerido."
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
