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
        $clientes = $this->cliente->paginate(10);
        $pager = $this->cliente->pager;
        return view("cliente/listar",[
            "clientes" => $clientes,
            "pager" => $pager
        ]);
    }
    public function inserir()
    {

        $localidades = $this->localidade->findAll();
        return view("cliente/inserir", [
            "localidades" => $localidades
        ]);
    }
    public function editar(int $param)
    {

        $cliente = $this->cliente->find($param);
        $localidades = $this->localidade->findAll();

        //var_dump($cliente);die;

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
        //var_dump($dados_cliente);die;

        if(empty($dados_cliente["idCliente"])){
            if($this->cliente->save($dados_cliente)){
                return redirect()->route("cliente.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso : </strong> ".$dados_cliente["nome"]
                );
            }else{
                return redirect()->back()->with(
                    "errors",
                    $this->cliente->errors()
                );
            }
        }else{
            if($this->cliente->save($dados_cliente)){
                return redirect()->route("cliente.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Atualização realizada com sucesso </strong>"
                );
            }else{
                return redirect()->back()->with(
                    "errors",
                    $this->cliente->errors()
                );
            }
        }

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
                "errors",
                "<strong> <i class='bi bi-bug'></i> Falha em realizar a exclusão! </strong>"
            );
        }
    }
}
