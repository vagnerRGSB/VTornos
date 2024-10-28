<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border m-3">
    <h3 class="h3 text-center m-3">Formulário para cadastro de maquinário</h3>

    <div class="container">
        <form action="<?= url_to("maquinario.onSave") ?>" method="post">
        <input type="hidden" name="idMaquinario" value="<?= esc($maquinario->idMaquinario) ?>">
        <div class="m-3">
            <label for="nome" class="form-label">Nome maquinário</label>
            <input type="text" id="nome" name="nome" class="form-control" aria-describedby="info-nome"
            placeholder="Informe nome maquinário (Obrigatório)"
            value = "<?= esc($maquinario->nome) ?>">
            <div id="info-nome" class="form-text">
                <span class="text-danger"><?= session()->getFlashdata("erro")["nome"] ?? "" ?></span>
            </div>
        </div>
        <button class="btn btn-success btn-sm m-3" type="submit"> <i class="bi bi-floppy"></i> Salvar</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>