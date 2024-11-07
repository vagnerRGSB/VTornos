<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $data = [
            "nome" => "Vagner Roballo Garcia",
            "email" => "vagnerrgsb@email.com",
            "senha" => password_hash("Vags1989",PASSWORD_DEFAULT)
        ];

        $this->db->table("usuarios")->insert($data);
    }
}
