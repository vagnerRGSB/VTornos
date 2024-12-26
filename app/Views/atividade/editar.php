<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border mt-3">
    <h3 class="h3 text-center m-3"><strong>Formulário Atividades da firma</strong></h3>
    <form action="<?= url_to("atividade.onSave") ?>" method="post">
        <input type="hidden" name="idAtividade" value="<?= $atividade->idAtividade ?>">
    <div class="m-3">
        <label class="form-label" for="nome">Nome da Atividade</label>
        <input class="form-control" type="text" name="nome" id="nome"
        placeholder="Informe nome da Atividade (Obrigatório)" aria-describedby="info-nome"
        value="<?= $atividade->nome ?>">
        <div class="form-text" id="info-nome">
            <span class="text-danger">
                <?= session()->getFlashdata("errors")["nome"] ?? "" ?>
            </span>
        </div>
    </div>
    <button class="btn btn-success m-3" type="submit"> <i class="bi bi-floppy"></i> Salvar</button>
    <a class="btn btn-secondary" href="<?= url_to("atividade.listar") ?>"> <i class="bi bi-list"></i> Atividades </a>
    </form>
</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>