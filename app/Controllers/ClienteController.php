<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModel;
use App\Models\LocalidadeModel;
use CodeIgniter\HTTP\ResponseInterface;

class ClienteController extends BaseController
{
    private $cliente;
    private $localidade;

    public function __construct()
    {
        $this->cliente = new ClienteModel();
        $this->localidade = new LocalidadeModel();
    }
    public function listar()
    {
        return view("cliente/listar");
    }
    public function inserir()
    {

        $localidades = $this->localidade->findAll();
        return view("cliente/editar", [
            "localidades" => $localidades
        ]);
    }
    public function editar(int $param)
    {

        $cliente = $this->cliente->find($param);
        $localidades = $this->localidade->findAll();

        return view("cliente/editar", [
            "cliente" => $cliente,
            "localidades" => $localidades
        ]);
    }

    public function onSave(){
        //inputs estáticos
        $dados_cliente = [
            "idCliente" => $this->request->getPost("idCliente"),
            "categoria" => $this->request->getPost("categoria"),
            "nome" => $this->request->getPost("nome"),
            "cpfCnpj" => $this->request->getPost("cpfCnpj"),
            "idLocalidade" => $this->request->getPost("idLocalidade"),
            "endereco" => $this->request->getPost("endereco"),
            "numero" => $this->request->getPost("numero"),
            "complemento" => $this->request->getPost("complemento"),
            "email" => $this->request->getPost("email")
        ];
        var_dump($dados_cliente);die;

        // <PENSAR COMO ATRIBUIR OS DADOS DA INSCRIção QUE SÃO GERADOS DINAMICAMENTE>

        
    }

    public function onDelete(int $param)
    {
        if($this->cliente->delete($param)){
            return redirect()->route("cliente.listar")->with(
                "info",
                "<strong> <i class='bi bi-check-circle-fill'></i> Remoção realizada com sucesso </strong>"
            );
        }else{
            return redirect()->back()->with(
                "error",
                "<strong> <i class='bi bi-bug'></i> Falha em realizar a exclusão! </strong>"
            );
        }
    }
}
