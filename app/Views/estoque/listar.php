<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="d-grid gap-2 d-md-flex justify-content-md-end m-3">
    <a class="btn btn-secondary btn-sm" href="<?= url_to("marca.listar") ?>"> <i class="bi bi-list"></i> Marcas </a>
    <a class="btn btn-secondary btn-sm" href="<?= url_to("especificacao.listar") ?>"> <i class="bi bi-list"></i> Especificações</a>
    <a class="btn btn-secondary btn-sm" href="<?= url_to("peca.listar") ?>"> <i class="bi bi-list"></i> Categorias</a>
</div>

<div class="m-3">
    <?php if (session()->has("info")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata("info") ?? "" ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->has("error")) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata("error") ?? "" ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>

<div class="border">
    <h3 class="h3 text-center m-3"><strong>Lista de Estoques dos produtos</strong></h3>

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-start">Código</th>
                <th scope="col" class="text-start">Nome</th>
                <td scope="col" class="text-end">
                    <a href="<?= url_to("estoque.inserir") ?>" class="btn btn-success btn-sm"> <i class="bi bi-plus"></i> Inserir</a>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($estoques)) : ?>
                <?php foreach ($estoques as $estoque) : ?>
                <tr>
                    <th scope="row" class="text-start"> <?= $estoque->idEstoque ?> </th>
                    <td class="text-start">
                    <?= $estoque->nomePeca." ".$estoque->dimensaoEspec." ". $estoque->nomeMarca ?>
                    </td>
                    <td colspan="3" class="text-end">
                    <a href="<?= base_url("estoque-pecas/editar/".$estoque->idEstoque) ?>" class="btn btn-warning btn-sm m-1"> <i class="bi bi-pencil"></i> Editar</a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="bi bi-trash"></i> Excluir
                    </button>
                </td>
                </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" class="text-center">Nenhum registro encontrado no sistema</td>
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