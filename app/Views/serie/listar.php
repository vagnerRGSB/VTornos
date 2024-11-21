<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3 mb-3">
    <a class="btn btn-secondary btn-sm" href="<?= url_to("modelo.listar") ?>"> <i class="bi bi-list"></i> Modelos</a>
    <a class="btn btn-secondary btn-sm" href="<?= url_to("maquinario.listar") ?>"> <i class="bi bi-list"></i> Maquinários</a>
    <a class="btn btn-secondary btn-sm" href="<?= url_to("marca.listar") ?>"> <i class="bi bi-list"></i> Marcas</a>
</div>
<div class="m-3">
    <?php if (session()->has("info")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> <i class="bi bi-check"></i> Registro realizado com sucesso : </strong> <?= session()->getFlashdata("infoInsercao") ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->has("error")) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata("errors") ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>

<div class="border">
    <h3 class="h3 text-center m-3"><strong>Lista das Series</strong></h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-start">Código</th>
                <th scope="col" class="text-start">Marca do modelo da serie</th>
                <th scope="col" class="text-end">
                    <a class="btn btn-success btn-sm m-1" href="<?= url_to("serie.inserir") ?>"> <i class="bi bi-plus"></i> Inserir</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($series)) : ?>
                <?php foreach ($series as $serie) : ?>
                    <tr>
                        <td scope="row" class="text-start"> <?= $serie->idSerie ?></td>
                        <td class="text-start"> <?= $serie->nomeMarca . " " . $serie->nomeModelo . " " . $serie->descricaoSerie ?> </td>
                        <td class="text-end">
                        <a class="dropdown-togglebtn btn btn-primary btn-sm m-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i> Ações
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url("serie/editar/".$serie->idSerie) ?>"> <i class="bi bi-pencil"></i> Editar</a></li>
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
                    <th colspan="3" scope="row" class="text-center"> Nenhum registro foi localizado no sistema</th>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="m-3">
        <?= $pager->links(); ?>
    </div>
</div>

<!-- modal para exclusao -->
<?php if (!empty($series)) : ?>
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
                    <a href="<?= base_url("serie/onDelete/".$serie->idSerie) ?>" class="btn btn-danger">Deletar</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>