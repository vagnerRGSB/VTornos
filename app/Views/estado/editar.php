<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="border mt-3 mt-3">
    <div class="container">
        <h3 class="h3 text-center">Formulário Estado</h3>
        <form action="<?= url_to("estado.onSave") ?>" method="post">
            <div class="m-3">
                <input type="hidden" name="idEstado" value="<?= $estado->idEstado ?>">
                <label for="nome" class="form-label">Nome do Estado</label>
                <input type="text" name="nome" id="nome" class="form-control"
                placeholder="Informe nome do Estado (Obrigatório)" aria-describedby="info-nome">
                <div id="info-nome" name="info-nome" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("error")["nome"] ?? "" ?>
                    </span>
                </div>
            </div>
            <button class="btn btn-success m-3" type="submit">
            <i class="bi bi-floppy"></i> Salvar
            </button>
            <a class="btn btn-danger" href="<?= url_to("estado.listar") ?>"> <i class="bi bi-x-lg"></i> Voltar </a>
        </form>

    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>