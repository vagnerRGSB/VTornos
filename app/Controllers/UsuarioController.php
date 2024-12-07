<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class UsuarioController extends BaseController
{
    private $usuario;
    public function __construct()
    {
        $this->usuario = new UsuarioModel();
    }
    public function listarTodosUsuarios()
    {

        $usuarios = $this->usuario->paginate(10);
        $pager = $this->usuario->pager;

        return view("usuario/listarTodosUsuarios", [
            "usuarios" => $usuarios,
            "pager" => $pager
        ], [
            "cache" => 60,
            "cache_name" => "listar_todos_usuarios"
        ]);
    }
    public function editarMeuPerfil()
    {

        $validator = $this->validate([
            "nome" => "required|max_length[200]|min_length[3]",
            "senha" => "required|max_length[8]|min_length[3]"
        ]);
        if (!$validator) {
            return redirect()->back()->with("errors", $this->validator->getErrors());
        } else {
        }
    }
    public function alterarMinhaSenha() {}
    public function inserir()
    {
        return view(
            "usuario/inserir",
            [],
            [
                "cache" => 60,
                "cache_name" => "alterar_senha"
            ]
        );
    }
    public function editar(int $param)
    {
        $editar = $this->usuario->find($param);

        return view(
            "usuario/editar",
            [
                "usuario" => $editar
            ],
            [
                "cache" => 60,
                "cache_name" => "editar_usuario"
            ]
        );
    }

    public function onSave()
    {
        $dados = [
            "idUsuario" => $this->request->getPost("idUsuario"),
            "nome" => $this->request->getPost("nome"),
            "email" => $this->request->getPost("email"),
            "senha" => $this->request->getPost("senha")
        ];

        //var_dump($this->usuario->save($dados));die;

        if (empty($dados["idUsuario"]) || $dados["idUsuario"] == "") {
            if ($this->usuario->save($dados)) {
                session()->getFlashdata("info-erro", "Seguintes campos são obrigatórios");
                return redirect()->route("usuarios.listar")->with("sucesso", "Usuário cadastrado com sucesso (" . $dados["nome"] . ")");
            } else {
                session()->getFlashdata("info-erro", "Seguintes campos são obrigatórios");
                return redirect()->back()->with("erro", $this->usuario->errors());
            }
        } else {
            if ($this->usuario->save($dados)) {
                return redirect()->route("usuarios.listar")->with("sucesso", "Usuário editado com sucesso (" . $dados["nome"] . ")");
            } else {
                return redirect()->back()->with("erro", $this->usuario->errors());
            }
        }
    }

    public function onDelete(int $param)
    {
        if ($this->usuario->delete($param)) {
            return redirect()->route("usuario.listar");
        } else {
            return redirect()->route("usuario.listar");
        }
    }
}
