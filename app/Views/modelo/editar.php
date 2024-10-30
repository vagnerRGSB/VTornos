<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("sytle") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="border m-3">
    <h3 class="h3 text-center m-3">Formulário para modelo</h3>

    <div class="container">
        <form action="<?= url_to("modelo.onSave") ?>" method="post">
            <div class="row">
                <div class="col">
                    <input type="hidden" name="idModelo" value="<?= $modelo->idModelo ?>">
                    <label for="idMaquinario" class="form-label"> Maquinário </label>
                    <select class="form-select form-select-sm" name="idMaquinario" id="idMaquinario" aria-describedby="info-maquinario">
                        <?php foreach ($maquinarios as $maquinario) : ?>
                            <option <?= $modelo->idMaquinario == $maquinario->idMaquinario ? "selected" : " "?>
                            value="<?= esc($maquinario->idMaquinario) ?>">
                                <?= esc($maquinario->nome) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div id="info-maquinario" class="form-label">
                        <span class="text-danger">
                            <?= session()->getFlashdata("erro")["idMaquinario"] ?? "" ?>
                        </span>
                    </div>
                </div>
                <div class="col">
                    <label for="idMarca" class="form-label"> Marca </label>
                    <select class="form-select form-select-sm" name="idMarca" id="idMarca" aria-describedby="info-marca">
                        <?php foreach ($marcas as $marca) : ?>
                            <option <?= $modelo->idMarca == $marca->idMarca ? "selected" : "" ?>
                            value="<?= esc($marca->idMarca) ?>">
                                <?= esc($marca->nome) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div id="info-marca" class="form-label">
                        <span class="text-danger">
                            <?= session()->getFlashdata("erro")["idMarca"] ?? "" ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col">
                    <label for="nome" class="form-label"> Nome modelo </label>
                    <input class="form-control" type="text" name="nome" id="nome" aria-describedby="info-nome"
                        value="<?= esc($modelo->nome) ?>">
                    <div id="info-nome" class="form-label">
                        <span class="text-danger">
                            <?= session()->getFlashdata("erro")["nome"] ?? "" ?>
                        </span>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success m-3"> <i class="bi bi-floppy"></i> Salvar </button>

        </form>

    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>