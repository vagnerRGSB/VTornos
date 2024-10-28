<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="m-3">
    <?php if (session()->has("infoInsercao")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> <i class="bi bi-check"></i> Registro realizado com sucesso : </strong> <?= session()->getFlashdata("infoInsercao") ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->has("infoAtualizacao")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> <i class="bi bi-check"></i> Atualização concluída com sucesso : </strong> <?= session()->getFlashdata("infoAtualizacao") ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->has("infoExclusao")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> <i class="bi bi-check"></i> Dados removidos com sucesso : </strong> <?= session()->getFlashdata("infoExclusao") ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>
<div class="border m-3">
    <h3 class="h3 text-center m-3">Lista de Marcas</h3>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-start">Código</th>
                <th scope="col" class="text-start">Nome marca</th>
                <td scope="col" class="text-end">
                    <a href="<?= url_to("marca.inserir") ?>" class="btn btn-primary btn-sm"> <i class="bi bi-plus"></i> Inserir </a>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($marcas)) : ?>
                <?php foreach ($marcas as $marca) : ?>
                    <tr>
                        <td scope="row"><?= esc($marca->idMarca) ?></td>
                        <td><?= esc($marca->nome) ?></td>
                        <td colspan="3" class="text-end">
                            <a href="<?= base_url("marca/editar/".$marca->idMarca) ?>" class="btn btn-warning btn-sm"> <i class="bi bi-pencil"></i> Editar</a>
                            <a href="" class="btn btn-danger btn-sm"> <i class="bi bi-trash"></i> Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">Nenhuma marca foi encontrada</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="m-3">
        <?= $pager->links() ?>
    </div>
</div>


<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>