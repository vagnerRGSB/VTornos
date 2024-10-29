<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<ul class="nav justify-content-center m-3">
    <li class="nav-item">
        <a class="nav-link" href="#"> <i class="bi bi-list"></i> Marcas </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"> <i class="bi bi-list"></i> Especificações</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"> <i class="bi bi-list"></i> Categorias</a>
    </li>
</ul>

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
    <h3 class="h3 text-center">Lista de Estoques de Peças</h3>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>