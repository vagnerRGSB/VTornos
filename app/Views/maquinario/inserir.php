<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border m-3">
    <h3 class="h3 text-center m-3"><strong>Formulário Maquinário</strong></h3>

    <div class="container">
        <form action="<?= url_to("maquinario.onSave") ?>" method="post">
            <div class="m-3">
                <label for="nome" class="form-label">Nome maquinário</label>
                <input type="text" id="nome" name="nome" class="form-control" aria-describedby="info-nome"
                    placeholder="Informe nome maquinário (Obrigatório)">
                <div id="info-nome" class="form-text">
                    <span class="text-danger"><?= session()->getFlashdata("erro")["nome"] ?? "" ?></span>
                </div>
            </div>
            <button class="btn btn-success m-3" type="submit"> <i class="bi bi-floppy"></i> Salvar </button>
            <a href="<?= url_to("maquinario.listar") ?>" class="btn btn-secondary"> <i class="bi bi-list"></i> Maquinários</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>