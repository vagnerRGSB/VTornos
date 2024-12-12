<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3 mb-3">
<a class="btn btn-secondary btn-sm" href="<?= url_to("serie.listar") ?>"> <i class="bi bi-list"></i> Series</a>
<a class="btn btn-secondary btn-sm" href="<?= url_to("modelo.listar") ?>"> <i class="bi bi-list"></i> Modelos</a>
<a class="btn btn-secondary btn-sm" href="<?= url_to("marca.listar") ?>"> <i class="bi bi-list"></i> Marcas</a>
</div>

<div class="m-3">
    <?php if (session()->has("info")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata("info") ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->has("errors")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata("errors") ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>

<div class="border m3">
    <h3 class="h3 text-center m-3"><strong>Lista de maquinários</strong></h3>

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-start">Código</th>
                <th scope="col" class="text-start">Nome maquinário</th>
                <td scope="col" colspan="3" class="text-end">
                    <a href="<?= url_to("maquinario.inserir") ?>" class="btn btn-success btn-sm m-1"> <i class="bi bi-plus"></i> Inserir</a>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($maquinarios)) : ?>
                <?php foreach ($maquinarios as $maquinario) : ?>
                    <tr>
                        <th scope="row"><?= esc($maquinario->idMaquinario) ?></th>
                        <td><?= esc($maquinario->nome) ?></td>
                        <td colspan="3" class="text-end">
                        <a class="dropdown-togglebtn btn btn-primary btn-sm m-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i> Ações
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url("maquinario/editar/".$maquinario->idMaquinario) ?>"> <i class="bi bi-pencil"></i> Editar</a></li>
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
                    <td colspan="3" scope="row" class="text-center"> Nenhum registro encontrado no sistema </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="m-3">
        <?= $pager->links() ?>
    </div>
</div>

<!-- MODAL PARA DELETAR -->
 <?php if(!empty($maquinarios)) : ?>
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
                <a href="<?= base_url("maquinario/onDelete/" . $maquinario->idMaquinario) ?>" class="btn btn-danger"> Deletar</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>