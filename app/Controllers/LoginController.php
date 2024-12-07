<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    private $usuario;

    public function __construct()
    {
        $this->usuario = new UsuarioModel();
    }
    public function telaLogin()
    {
        return view("layouts/pag_login",[],[
            "cache"=>60,
            "cache_name"=>"tela_login"
        ]);
    }

    public function onLogin(){

        $validate = $this->validate([
            "email" => "required|valid_email",
            "senha" => "required"
        ]);

        if(!$validate){
            return redirect()->back()->with("errors", $this->validator->getErrors());
        }else{
            $login = $this->usuario->where("email", $this->request->getPost("email"))->first();

            if(!$login){
                return redirect()->back()->with("infoError", "Verifique suas credenciais e tente novamente!");
            }
            if(!password_verify($this->request->getPost("senha"), $login->senha)){
                return redirect()->back()->with("infoError", "Verifique suas credenciais e tente novamente!");
            }
            unset($login->senha);
            session()->set("login",$login);
            return redirect()->route("home.principal");
        }
    }

    public function onLogout(){
        session()->destroy();

        return view("layouts/pag_login");
    }
}
