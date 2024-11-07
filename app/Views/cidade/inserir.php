<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border m-3">
    <h3 class="h3 text-center m-3">Formulário Cidade</h3>
    <form action="<?= url_to("cidade.onSave") ?>" method="post">

        <div class="m-3">
            <label for="idEstado" class="form-label"> Estado </label>
            <select class="form-select" name="idEstado" id="idEstado" aria-describedby="info-idEstado">
                <option value="">Selecione um estado (Obrigatório) </option>
                <?php foreach($estados as $estado) : ?>
                 <option value="<?= esc($estado->idEstado) ?>"> <?= esc($estado->nome) ?> </option>
                <?php endforeach; ?>
            </select>
            <div id="info-idEstado" class="form-label">
                <span class="text-danger">
                <?= session()->getFlashdata("error")["idEstado"] ?? " " ?>
                </span>
            </div>
        </div>

        <div class="m-3">
            <label for="nome" class="form-label"> Nome da cidade </label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Informe nome cidade (Obrigatório)"
                aria-describedby="info-nome">
            <div id="info-nome" class="form-text">
                <span class="text-danger">
                    <?= session()->getFlashdata("error")["nome"] ?? "" ?>
                </span>
            </div>
        </div>
        <button class="btn btn-success m-3" type="submit"> <i class="bi bi-floppy"></i> Salvar </button>
        <a class="btn btn-secondary" href="<?= url_to("cidade.listar") ?>"> <i class="bi bi-list"></i> Cidades</a>
    </form>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>