<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="d-grid gap-2 d-md-flex justify-content-md-end m-3">
    <a class="btn btn-secondary btn-sm" href="<?= url_to("cidade.listar") ?>"> <i class="bi bi-list"></i> Cidades</a>
    <a class="btn btn-secondary btn-sm" href="<?= url_to("estado.listar") ?>"> <i class="bi bi-list"></i> Estados</a>
</div>

<div class="m-3">
    <?php if (session()->has("info")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata("info") ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->has("error")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata("error") ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>

<div class="border">
    <h3 class="h3 text-center m-3"><strong> Lista de Localidades </strong></h3>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-start">Código</th>
                <th scope="col" class="text-start">Localidade</th>
                <th scope="col" class="text-end">
                    <a class="btn btn-success btn-sm" href="<?= url_to("localidade.inserir") ?>"> <i class="bi bi-plus"></i> Inserir</a>
                    </td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($localidades)) : ?>
                <?php foreach($localidades as $localidade) : ?>
                    <tr>
                        <th scope="row" class="text-start"> <?= $localidade->idLocalidade ?></th>
                        <td class="text-start">
                            <?= $localidade->nomeLocalidade." - ".$localidade->nomeCidade." - ".$localidade->siglaEstado ?>
                        </td>
                        <td class="text-end">
                        <a href="<?= base_url("localidade/editar/".$localidade->idLocalidade) ?>" class="btn btn-warning btn-sm"> <i class="bi bi-pencil"></i> Editar</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" scope="row" class="text-center">Não foi encontrado nenhum registro no sistema</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="m-3">
        <?= $pager->links(); ?>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>