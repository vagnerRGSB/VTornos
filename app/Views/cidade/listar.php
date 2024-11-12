<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="m-3">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-secondary btn-sm" href=" <?= url_to("localidade.listar") ?>"> <i class="bi bi-list"></i> Localidades </a>
        <a class="btn btn-secondary btn-sm" href="<?= url_to("estado.listar") ?>"> <i class="bi bi-list"></i> Estados </a>
    </div>
</div>

<?php if (session()->has("info")) : ?>
    <div class="m-3">
        <div class="d-grid gap-2 d-md-block">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata()["info"] ?? "" ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->has("error")) : ?>
    <div class="m-3">
        <div class="d-grid gap-2 d-md-block">
            <div class="alert alert-sucess alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata()["error"] ?? "" ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="border m-3">
    <h3 class="h3 text-center m-3">Lista de Cidades</h3>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-start m-1">Código</th>
                <th scope="col" class="text-start m-1">Nome Cidade - Estado</th>
                <td scope="col" class="text-end m-1">
                    <a class="btn btn-primary btn-sm" href="<?= url_to("cidade.inserir") ?>"> <i class="bi bi-plus"></i> Inserir </a>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($cidades)) : ?>
                    <?php foreach($cidades as $cidade) : ?>
                        <tr>
                            <th scope="row" class="text-start m-1"><?= esc($cidade->idCidade) ?></th>
                            <td class="text-start m-1"><?= esc($cidade->nomeCidade)." - ". esc($cidade->siglaEstado) ?></td>
                            <td colspan="3" class="text-end">
                            <a href="<?= base_url("/cidade/editar/".$cidade->idCidade) ?>" class="btn btn-warning btn-sm text-end m-1 "> <i class="bi bi-pencil"></i> Editar</a>
                            <button type="button" class="btn btn-danger btn-sm text-end" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" scope="row" class="text-center">Nenhum resgitro foi encontrado no sistema</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
    <div class="m-3">
                <?= $pager->links(); ?>
    </div>
</div>


<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>