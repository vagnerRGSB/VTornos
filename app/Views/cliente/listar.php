<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="m-3">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-secondary btn-sm" href="<?= url_to("localidade.listar") ?>"> <i class="bi bi-list"></i> Localidades</a>
        <a class="btn btn-secondary btn-sm" href="<?= url_to("cidade.listar") ?>"> <i class="bi bi-list"></i> Cidades</a>
        <a class="btn btn-secondary btn-sm" href="<?= url_to("estado.listar") ?>"> <i class="bi bi-list"></i> Estados</a>
    </div>
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

<div class="border">
    <h3 class="h3 text-center m-3"> <strong>Lista de Clientes</strong> </h3>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-start">Código</th>
                <th scope="col" class="text-start">Nome completo</th>
                <th scope="col" class="text-end">
                    <a class="btn btn-primary btn-sm m-1" href="<?= url_to("cliente.inserir") ?>"> <i class="bi bi-plus"></i> Inserir</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($clientes)) : ?>
                <?php foreach($clientes as $cliente) : ?>
                    <tr>
                        <th scope="row" class="text-start"><?= $cliente->idCliente ?></th>
                        <td class="text-start"><?= $cliente->nome ?></td>
                        <td class="text-end">
                        <a href="#" class="btn btn-warning btn-sm text-end m-1"> <i class="bi bi-pencil"></i> Editar </a>
                        <button type="button" class="btn btn-danger btn-sm text-end" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <th colspan="3" scope="row" class="text-center">Nenhum registro encontrado no sistema</th>
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