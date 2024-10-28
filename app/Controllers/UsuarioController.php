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
        ]);
    }
    public function editarMeuPerfil() {}
    public function alterarMinhaSenha() {}
    public function inserir()
    {
        return view("usuario/inserir");
    }
    public function editar(int $param)
    {
        $editar = $this->usuario->find($param);

        return view("usuario/editar", [
            "usuario" => $editar
        ]);
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
}
