<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'idUsuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "nome",
        "email",
        "senha"
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
        "nome" => "required|max_length[200]|min_length[3]",
        "email" => "required|valid_email|is_unique[usuarios.email]|max_length[200]|min_length[3]",
        "senha" => "required|max_length[8]|min_length[8]"
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ["hash_senha"];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ["hash_senha"];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function hash_senha(array $data){
        $data["data"]["senha"] = password_hash($data["data"]["senha"], PASSWORD_DEFAULT);
        //var_dump($data);die;
        return $data;
    }
}
