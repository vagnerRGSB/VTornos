<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="border mt-3">
    <h3 class="h5 text-center"><strong>Informações sobre Orcamento de serviço</strong></h3>
    <div class="row">
        <div class="col-4 m-3">
            <label class="form-label" for="nomeCliente"> Cliente </label>
            <input class="form-control" type="text"
                value="<?= $infoServico->nomeCliente ?>"
                disabled>
        </div>
        <div class="col-6 m-3">
            <label class="form-label" for="infoServico">Código Orçamento - Descrição - Serviço </label>
            <input class="form-control" type="text"
                value="<?= $infoServico->idOrcamento . " - " . $infoServico->nomeMarca . " " . $infoServico->nomeModelo . " " . $infoServico->descricaoSerie . " " . $infoServico->observacaoOrcamento . " - " . $infoServico->tituloServico ?> "
                disabled>
        </div>
    </div>
</div>
<div class="border">
    <h3 class="h3 text-center m-3"><strong>Lista dos produtos para o serviço</strong></h3>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-start">Código</th>
                <th scope="col" class="text-start">Descrição</th>
                <th scope="col" class="text-start">Valor Unitário</th>
                <th scope="col" class="text-start">Quantia </th>
                <th scope="col" class="text-end">
                    <a class="btn btn-success btn-sm m-1" href="<?= base_url("produto/inserir/".$infoServico->idServico) ?>">
                        <i class="bi bi-plus"></i> Inserir
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($produtos)) : ?>
                <?php foreach ($produtos as $produto) : ?>
                    <tr>
                        <th scope="col" class="text-start"><?= $produto->idProduto ?></th>
                        <td class="text-start"><?= $produto->nomePeca . " " . $produto->dimensaoPeca . " " . $produto->especificacaoPeca . " " . $produto->nomeMarca ?></td>
                        <td class="text-start"><?= $produto->valorProduto ?></td>
                        <td class="text-start"><?= $produto->quantiaProduto ?></td>
                        <td class="text-end">
                            <a class="dropdown-togglebtn btn btn-primary btn-sm m-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i> Ações
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url("produto/editar/" . $produto->idProduto) ?>"> <i class="bi bi-pencil"></i> Editar</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"> <i class="bi bi-trash"></i> Excluir</a></li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <th class="text-center" colspan="6" scope="row">Nenhum registro encontrado no sistema</th>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="m-3">
                <?= $pager->links(); ?>
    </div>
</div>

<?php if (!empty($pecas)) : ?>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="bi bi-x"></i> Cancelar</button>
                    <a href="<?= base_url("categorias-pecas/onDelete/" . $peca->idPeca) ?>" class="btn btn-danger"> <i class="bi bi-trash"></i> Deletar</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>