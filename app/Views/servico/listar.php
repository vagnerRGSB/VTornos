<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>



<div class="border mt-3">
    <h5 class="h5 text-center m-3"><strong>Informações sobre Ordem Serviço</strong></h4>
    <div class="row">
        <div class="col-1 m-3">
            <label class="form-label" for="idOrcamento">Código</label>
            <input class="form-control" type="text" name="idOrcamento" id="idOrcamento" disabled value="<?= $orcamento->idOrcamento ?>">
        </div>
        <div class="col m-3">
            <label class="form-label" for="nomeCliente">Maquinário</label>
            <input class="form-control" type="text" name="nomeCliente" id="nomeCliente" disabled 
            value="<?= $maquinario->nomeMarca." ". $maquinario->nomeModelo." ".$maquinario->descricaoSerie." ".$maquinario->observacaoOrcamento ?>">
        </div>
        <div class="col m-3">
            <label class="form-label" for="nomeCliente">Cliente</label>
            <input class="form-control" type="text" name="nomeCliente" id="nomeCliente" disabled value="<?= $cliente->nome ?>">
        </div>
    </div>
</div>
<div class="border">
    <h3 class="h3 text-center m-3"><strong>Lista dos Serviços</strong></h3>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-start">Código</th>
                <th scope="col" class="text-start">Data</th>
                <th scope="col" class="text-start">Título</th>
                <th scope="col" class="text-end">
                    <a class="btn btn-success btn-sm m-1" href="<?= base_url("servico/inserir/".$orcamento->idOrcamento) ?>"> <i class="bi bi-plus"></i> Inserir</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($servicos)) : ?>
                <?php foreach($servicos as $servico) : ?>
                    <tr>
                        <th scope="row" class="text-start"><?= $servico->idServico ?></th>
                        <td class="text-start"><?= date("d/m/Y", strtotime($servico->dataCadastro))?></td>
                        <td class="text-start"><?= $servico->titulo?></td>
                        <td class="text-end">
                        <a class="dropdown-togglebtn btn btn-primary btn-sm m-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i> Ações
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url("servico/editar/".$servico->idServico) ?>"> <i class="bi bi-pencil"></i> Editar</a></li>
                                <li><a class="dropdown-item" href="<?= base_url("produto/listar/".$servico->idServico) ?>"> <i class="bi bi-list"></i> Produtos</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"> <i class="bi bi-trash"></i>  Excluir</a></li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <th colspan="4" scope="row" class="text-center">Nenhum registro foi encontrado no sistema</th>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="m-3">
        <?= $pager->links(); ?>
    </div>
</div>

<!-- modal para exclusao -->
<?php if (!empty($servicos)) : ?>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="<?= base_url("servico/onDelete/".$servico->idServico) ?>" class="btn btn-danger">Deletar</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>