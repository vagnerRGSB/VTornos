<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="border mt-3 mt-3">
        <div class="container">
                <h3 class="h3 text-center"><strong>Formulário Estado</strong></h3>
                <form action="<?= url_to("estado.onSave") ?>" method="post">
                        <input type="hidden" name="idEstado" value="<?= $estado->idEstado ?>">
                        <div class="m-3">
                                <label for="nome" class="form-label">Nome do Estado</label>
                                <input type="text" name="nome" id="nome" class="form-control"
                                        placeholder="Informe nome do Estado (Obrigatório)" aria-describedby="info-nome"
                                        value="<?= $estado->nome ?>">
                                <div id="info-nome" name="info-nome" class="form-text">
                                        <span class="text-danger">
                                                <?= session()->getFlashdata("error")["nome"] ?? "" ?>
                                        </span>
                                </div>
                        </div>
                        <div class="col-6 m-3">
                                <label for="sigla" class="form-label">Informe sigla do estado</label>
                                <input type="text" name="sigla" id="sigla" class="form-control"
                                        placeholder="Informe sigla do estado (Obrigatório)" aria-describedby="info-sigla"
                                        value="<?= $estado->sigla ?>">
                                <div id="info-sigla" class="form-text">
                                        <span class="text-danger">
                                                <?= session()->getFlashdata("error")["sigla"] ?? "" ?>
                                        </span>
                                </div>
                        </div>
                        <button class="btn btn-success m-3" type="submit">
                                <i class="bi bi-floppy"></i> Salvar
                        </button>
                        <a class="btn btn-secondary " href="<?= url_to("estado.listar") ?>"><i class="bi bi-list"></i> Estados </a>
                </form>

        </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>