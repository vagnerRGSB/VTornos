<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="border m-3">
    <h3 class="h3 text-center m-3"><strong>Formulário Localidade</strong></h3>
    <div class="container">
        <form action="<?= url_to("localidade.onSave") ?>" method="post">
            <input type="hidden" name="idLocalidade" value=<?= $localidade->idLocalidade ?>>
            <div class="m-3">
                <label class="form-label" for="idCidade">Cidades</label>
                <select class="form-select" name="idCidade" id="idCidade">
                    <?php foreach($cidades as $cidade) : ?>
                        <option <?= $cidade->idCidade == $localidade->idCidade ? "selected" : " " ?>
                        value="<?= $cidade->idCidade ?>">
                            <?= $cidade->nomeCidade." - ".$cidade->siglaEstado ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="row row-cols-2">
                <div class="col m-3">
                    <label class="form-label" for="nome">Nome localidade </label>
                    <input class="form-control" type="text" name="nome" id="nome"
                    placeholder="Informe nome da localidade (Obrigatório)" aria-describedby="info-nome"
                    value="<?= $localidade->nome ?>">
                    <div class="form-label">
                        <span class="text-danger">
                            <?= session()->getFlashdata("error") ?? "" ?>
                        </span>
                    </div>
                </div>

                <div class="col m-3">
                    <label class="form-label" for="cep">Cep</label>
                    <input class="form-control" type="number" name="cep" id="cep"
                    placeholder="Informe número Cep (Obrigatório)" aria-describedby="info-cep"
                    value="<?= $localidade->cep ?>">
                    <div class="form-label" id="info-cep">
                        <span class="text-danger">
                            <?= session()->getFlashdata("error") ?? "" ?>
                        </span>
                    </div>
                </div>
            </div>
            <button class="btn btn-success m-3" type="submit"> <i class="bi bi-floppy"></i> Salvar </button>
            <a class="btn btn-secondary" href="<?= url_to("localidade.listar") ?>"> <i class="bi bi-list"></i> Localidades</a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>