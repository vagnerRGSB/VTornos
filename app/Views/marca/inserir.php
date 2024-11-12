<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border m-3">
        <h3 class="h3 text-center m-3"> <strong> Formulário Marca </strong></h3>

        <form action="<?= url_to("marca.onSave") ?>" method="post">
            <div class="m-3">
                <div class="m-2">
                    <label for="nome" class="form-label">Nome marca</label>
                    <input type="text" id="nome" name="nome" placeholder="Informe nome da marca (Obrigatório)" class="form-control" aria-describedby="info-nome">
                    <div id="info-nome" class="form-text">
                        <span class="text-danger">
                            <?= session()->getFlashdata("error")["nome"] ?? "" ?>
                        </span>
                    </div>
                </div>
            </div>
            <button class="btn btn-success m-3" type="submit"> <i class="bi bi-floppy"></i> Salvar </button>
            <a href="<?= url_to("marca.listar")?>" class="btn btn-secondary"> <i class="bi bi-list"></i> </i> Marcas</a>
        </form>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>