<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CidadeModel;
use App\Models\LocalidadeModel;
use CodeIgniter\HTTP\ResponseInterface;

class LocalidadeController extends BaseController
{
    private $localidade;
    private $cidade;

    public function __construct()
    {
        $this->localidade = new LocalidadeModel();
        $this->cidade = new CidadeModel();
    }
    public function listar()
    {
        $localidades = $this->localidade->select(
            "localidades.idLocalidade as idLocalidade, localidades.nome as nomeLocalidade,
            cidades.nome as nomeCidade,
            estados.sigla as siglaEstado"
        )->join(
            "cidades",
            "cidades.idCidade=localidades.idCidade",
            "inner"
        )->join(
            "estados",
            "estados.idEstado=cidades.idEstado",
            "inner"
        )->paginate(10);

        $pager = $this->localidade->pager;
        return view("localidade/listar", [
            "localidades" => $localidades,
            "pager" => $pager
        ]);
    }
    public function inserir()
    {
        $cidades = $this->cidade->select(
            "cidades.idCidade as idCidade, cidades.nome as nomeCidade,
            estados.sigla as siglaEstado"
        )->join(
            "estados",
            "estados.idEstado=cidades.idEstado",
            "inner"
        )->findAll();

        return view("localidade/inserir", [
            "cidades" => $cidades
        ]);
    }
    public function editar(int $param)
    {
        $localidade = $this->localidade->find($param);
        $cidades = $this->cidade->findAll();
        return view("localidade/editar", [
            "localidade" => $localidade,
            "cidades" => $cidades
        ]);
    }
    public function onSave()
    {

        $dados = [
            "idLocalidade" => $this->request->getPost("idLocalidade"),
            "idCidade" => $this->request->getPost("idCidade"),
            "nome" => $this->request->getPost("nome"),
            "cep" => $this->request->getPost("cep")
        ];

       if(empty($dados["idLocalidae"])){
        if($this->localidade->save($dados)){
            return redirect()->route("localidade.listar")->with("info",
            "<strong> Inserção realizada como sucesso: </strong>".$dados["nome"]);
        }else{
            return redirect()->back()->withInput()->with("error",$this->localidade->errors());
        }
       }else{
        if($this->localidade->save($dados)){
            return redirect()->route("localidade.listar")->with("info",
            "<strong> Atualização realizada como sucesso: </strong>".$dados["nome"]);
        }else{
            return redirect()->back()->withInput()->with("error",$this->localidade->errors());
        }
       }
    }
    public function onDelete(int $param)
    {

        $localidade = $this->localidade->find($param);
    }
}
