<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Atividade;
use App\Models\AtividadeModel;
use CodeIgniter\HTTP\ResponseInterface;

class AtividadeController extends BaseController
{
    private $atividade;

    public function __construct()
    {
        $this->atividade = new AtividadeModel();
    }
    public function listar()
    {
        $atividades = $this->atividade->paginate(10);
        $pager = $this->atividade->pager;
        return view("atividade/listar", [
            "atividades" => $atividades,
            "pager" => $pager
        ]);
    }
    public function inserir()
    {
        return view("atividade/inserir");
    }
    public function editar(int $param)
    {
        $atividade = $this->atividade->find($param);
        return view("atividade/editar", [
            "atividade" => $atividade
        ]);
    }

    public function onSave()
    {
        $dados = [
            "idAtividade" => $this->request->getPost("idAtividade"),
            "nome" => $this->request->getPost("nome"),
            "valor" => $this->request->getPost("valor")
        ];
        if (empty($dados["idAtividade"])) {
            if ($this->atividade->save($dados)) {
                return redirect()->route("atividade.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Inserção realizada com sucesso </strong>"
                );
            } else {
                return redirect()->back()->with(
                    "errors",
                    $this->atividade->errors()
                );
            }
        } else {
            if ($this->atividade->save($dados)) {
                return redirect()->route("atividade.listar")->with(
                    "info",
                    "<strong> <i class='bi bi-check-circle-fill'></i> Atualização realizada com sucesso </strong>"
                );
            } else {
                return redirect()->back()->with(
                    "errors",
                    $this->atividade->errors()
                );
            }
        }
    }

    public function onDelete(int $param){
        if($this->atividade->delete($param)){
            return redirect()->route("atividade.listar")->with(
                "info",
                "<strong> <i class='bi bi-check-circle-fill'></i> Exclusão realizada com sucesso </strong>"
            );
        }else{
            return redirect()->back()->with(
                "errors",
                $this->atividade->errors()
            );
        }
    }
}
