<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border m-3">
    <h3 class="h3 text-center m-3">Formulário Categoria de Peças</h3>

    <div class="container">
        <form action="<?= url_to("peca.onSave") ?>" method="post">
            <div class="m-3">
                <label for="nome" class="form-label">Nome categoria de peça</label>
                <input type="text" name="nome" id="nome" aria-describedby="info-nome" placeholder="Informe nome (Obrigatório)"
                class="form-control">
                <div id="info-nome" class="form-label">
                    <span class="text-danger">
                            <?= session()->getFlashdata("erro")["nome"] ?? "" ?>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-success m-3"> Salvar</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>