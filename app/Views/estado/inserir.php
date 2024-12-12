<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="border mt-3">
    <h3 class="h3 text-center m-3"><strong>Formulário estado</strong></h3>
    <form action="<?= url_to("estado.onSave") ?>" method="post">
        <div class="row">
            <div class="col-6 m-3">
                <label for="nome" class="form-label">Nome do Estado</label>
                <input type="text" name="nome" id="nome" class="form-control"
                    placeholder="Informe nome do Estado (Obrigatório)" aria-describedby="info-nome">
                <div id="info-nome" name="info-nome" class="form-text">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["nome"] ?? "" ?>
                    </span>
                </div>
            </div>
            <div class="col-4 m-3">
                <label for="sigla" class="form-label">Informe sigla do estado</label>
                <input type="text" name="sigla" id="sigla" class="form-control"
                    placeholder="Informe sigla do estado (Obrigatório)" aria-describedby="info-sigla">
                <div id="info-sigla" class="form-text">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["sigla"] ?? "" ?>
                    </span>
                </div>
            </div>
        </div>
        <button class="btn btn-success m-3" type="submit">
            <i class="bi bi-floppy"></i> Salvar
        </button>
        <a class="btn btn-secondary " href="<?= url_to("estado.listar") ?>"><i class="bi bi-list"></i> Estados </a>
    </form>
</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>