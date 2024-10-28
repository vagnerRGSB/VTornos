<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="#">Lista de modelos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= url_to("maquinario.listar") ?>">Lista de maquinários</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= url_to("marca.listar") ?>">Lista de marcas</a>
  </li>
</ul>

<div class="border">
    <h3 class="h3 text-center">Lista de Modelos</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Modelo da serie</th>
                <th scope="col">
                    <a class="btn btn-primary btn-sm" href="">Inserir</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($series) || $series == "") : ?>
                <?php foreach($series as $serie) : ?>
                    <tr>
                        <td scope="row"> <?= esc($serie->idSerie) ?></td>
                        <td> <?= $nomeMarca." ".$nomeModelo." ".$nomeSerie." - ". $descricaoSerie ?> </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" classe="text-center">Nenhuma serie foi encontrada</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>