<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="border m-3">
    <h3 class="h3 text-center m-3"><strong>Formulário Serie</strong></h3>
    <div class="container">
        <form action="<?= url_to("serie.onSave") ?>" method="post">
        <input type="hidden" name="idSerie" value="<?= $serie->idSerie ?>">
            <div class="col m-3">
                <label for="idModelo" class="form-label">Modelo</label>
                <select class="form-select" name="idModelo" id="idModelo" aria-describedby="info-idModelo">
                    <?php foreach ($modelos as $modelo) : ?>
                        <option <?= $modelo->idModelo == $serie->idSerie ? "selected" : " " ?>
                        value="<?= esc($modelo->idModelo) ?>"><?= esc($modelo->nome) ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="info-idModelo" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["idModelo"] ?? "" ?>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3 mb-3">
                    <label for="descricao" class="form-label">Descrição serie</label>
                    <input type="text" name="descricao" class="form-control" aria-describedby="info-descricao"
                        placeholder="Informe descrição (Obrigatório)"
                        value="<?= $serie->descricao ?>">
                    <div id="info-descricao" class="form-label">
                        <span class="text-danger">
                            <?= session()->getFlashdata("errors")["descricao"] ?? "" ?>
                        </span>
                    </div>
                </div>
                <div class="col mt-3 mb-3">
                    <label for="ano" class="form-label">Ano</label>
                    <input type="number" name="ano" class="form-control" aria-describedby="info-ano" placeholder="Informe Ano (Obrigatório)"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                        value="<?= $serie->ano ?>">
                    <div id="info-ano" class="form-label">
                        <span class="text-danger">
                            <?= session()->getFlashdata("errors")["ano"] ?? "" ?>
                        </span>
                    </div>
                </div>
            </div>
            <button class="btn btn-success m-3" type="submit"> <i class="bi bi-floppy"></i> Salvar </button>
            <a class="btn btn-secondary" href="<?= url_to("serie.listar")?>"> <i class="bi bi-list"></i> Series </a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>