<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border m-3">
    <h3 class="h3 text-center m-3"> <strong> Formulário Categoria de Peças </strong> </h3>

    <div class="container">
        <form action="<?= url_to("peca.onSave") ?>" method="post">
            <input type="hidden" name="idPeca" value="<?=$peca->idPeca?>">
            <div class="m-3">
                <label for="nome" class="form-label">Nome categoria de peça</label>
                <input type="text" name="nome" id="nome" aria-describedby="info-nome" placeholder="Informe nome (Obrigatório)"
                class="form-control"
                value="<?=$peca->nome?>">
                <div id="info-nome" class="form-label">
                    <span class="text-danger">
                            <?= session()->getFlashdata("erro")["nome"] ?? "" ?>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-success m-3"> <i class="bi bi-floppy"></i> Salvar</button>
            <a href="<?= url_to("peca.listar") ?>" class="btn btn-secondary"> <i class="bi bi-list"></i> </i> Peças</a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>