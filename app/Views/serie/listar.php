<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="<?= url_to("modelo.listar") ?>"> <i class="bi bi-list"></i> Modelos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= url_to("maquinario.listar") ?>"> <i class="bi bi-list"></i> Maquinários</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= url_to("marca.listar") ?>"> <i class="bi bi-list"></i> Marcas</a>
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

<div class="border">
    <h3 class="h3 text-center">Lista das Series</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Marca do modelo da serie</th>
                <th scope="col">
                    <a class="btn btn-primary btn-sm" href="<?= url_to("serie.inserir") ?>">Inserir</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($series)) : ?>
                <?php foreach($series as $serie) : ?>
                    <tr>
                        <td scope="row"> <?= esc($serie->idSerie) ?></td>
                        <td> <?= $nomeMarca." ".$nomeModelo." ".$nomeSerie?> </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" scope="row" classe="text-center"> Nenhuma serie foi encontrada</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>