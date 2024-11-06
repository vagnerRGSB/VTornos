<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3 mb-3">
    <a class="btn btn-secondary btn-sm" href="<?= url_to("estoque.listar") ?>"> <i class="bi bi-list"></i> Estoques </a>
    <a class="btn btn-secondary btn-sm" href="<?= url_to("marca.listar") ?>"> <i class="bi bi-list"></i> Marcas</a>
    <a class="btn btn-secondary btn-sm" href="<?= url_to("especificacao.listar") ?>"> <i class="bi bi-list"></i> Especificações</a>
</div>

<div class="m-3">
    <?php if (session()->has("info")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> <i class="bi bi-check"></i> Registro realizado com sucesso : </strong> <?= session()->getFlashdata("infoInsercao") ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->has("errors")) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> <i class="bi bi-check"></i> Dados removidos com sucesso : </strong> <?= session()->getFlashdata("infoExclusao") ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>

<div class="border m-3">
    <h3 class="h3 text-center m-3">Especificações de peças</h3>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome peça</th>
                <td scope="col" class="text-end">
                    <a href="<?= url_to("peca.inserir") ?>" class="btn btn-primary btn-sm"> <i class="bi bi-plus"></i> Inserir</a>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pecas)) : ?>
                <?php foreach ($pecas as $peca) : ?>
                    <tr>
                        <td scope="row"><?= $peca->idPeca ?></td>
                        <td><?= $peca->nome ?></td>
                        <td class="text-end">
                            <a href="<?= base_url("categorias-pecas/editar/" . $peca->idPeca) ?>" class="btn btn-warning btn-sm "> <i class="bi bi-pencil"></i> Editar</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" class="text-center">Nenhum registro foi encontrado no sistema</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="m-3">
        <?= $pager->links() ?>
    </div>
</div>

<!-- MODAL PARA DELETAR -->
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="<?= base_url("categorias-pecas/onDelete/" . $peca->idPeca) ?>" class="btn btn-danger">Deletar</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>