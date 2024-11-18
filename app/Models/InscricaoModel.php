<?php

namespace App\Models;

use CodeIgniter\Model;

class InscricaoModel extends Model
{
    protected $table            = 'inscricoes';
    protected $primaryKey       = 'idInscricao';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "idLocalidade",
        "idCliente",
        "nome",
        "inscMunicipal",
        "inscEstadual",
        "endereco"
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
        "idCliente" => "required",
        "idLocalidade" => "required",
        "nome" => "required|max_length[200]|min_length[3]",
        "inscMunicipal" => "max_length[20]|is_unique[inscricoes.inscMunicipal]",
        "inscEstadual" => "required|max_length[20]|is_unique[inscricaoes.inscEstadual]",
        "endereco" => "max_length[200]|min_length[3]"
    ];
    protected $validationMessages   = [
        "idCliente" => [
            "required" => "O campo cliente é requerido"
        ],
        "idLocalidade" => [
            "required" => "O campo localidade é requerido"
        ],
        "inscMunicipal" => [
            "is_unique[inscricoes.inscMunicipal]" => "O campo inscrição municipal deve conter um valor único",
            "max_length[20]" => "O campo inscrição municipal deve conter menos 20 caracteres"
        ],
        "inscEstadual" => [
            "required" => "O campo inscrição estadual é requerido",
            "is_unique[inscricoes.inscEstadual]" => "O campo inscrição estadual deve conter um valor único",
            "max_length[20]" => "O campo inscrição municipal deve conter menos 20 caracteres"
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
