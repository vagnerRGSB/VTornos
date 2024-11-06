<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstadoModel;
use CodeIgniter\HTTP\ResponseInterface;

class EstadoController extends BaseController
{
    private $estado;

    public function __construct()
    {
        $this->estado = new EstadoModel();
    }
    public function listar()
    {
        $estados = $this->estado->findAll();
        return view("estado/listar",[
            "estados" => $estados
        ]);
    }
    public function inserir()
    {

        return view("estado/inserir");
    }
    public function editar(int $param)
    {

        $estado = $this->estado->find($param);
        return view("estado/editar", [
            "estado" => $estado
        ]);
    }
    public function onSave(){

        $dados = [
            "idEstado" => $this->request->getPost("idEstado"),
            "nome" => $this->request->getPost("nome")
        ];
        //var_dump($dados);die;

        if(empty($dados["idEstado"])){
            if($this->estado->save($dados)){
                return redirect()->route("estado.listar")->with("info",
                "<strong>Inserção realizada com sucesso : </strong> ".$dados["nome"]);
            }else{
                return redirect()->back()->with("error", $this->estado->errors());
            }
        }else{
            if($this->estado->save($dados)){
                return redirect()->route("estado.listar")->with("info",
                "<strong> Atualização realizada com sucesso : </strong> ".$dados["nome"]);
            }else{
                return redirect()->back()->with("error", $this->estado->errors());
            }
        }
                
    }
    public function onDelete(int $param){
        $estado = $this->estado->find($param);

        if($this->estado->delete($param)){
            return redirect()->route("estado.listar")->with("info","Cadastro");
        }else{
            return redirect()->route("estado.listar")->with("errors","Não foi possivel realiza exclusão no sistema");
        }
    }
}
