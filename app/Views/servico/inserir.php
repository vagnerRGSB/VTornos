<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border mt-3">
    <h3 class="h3 text-center m-3"><strong>Formulário Serviço</strong></h3>
    <form action="<?= url_to("servico.onSave") ?>" method="post">
        <input type="hidden" name="idOrcamento" value="<?=$orcamento->idOrcamento?>">
        <div class="row">
            <div class="col-2 m-3">
                <label class="form-label" for="dataCadastro">Data Inserção <span class="text-danger">(Obrigatório)</span></label>
                <input class="form-control" type="date" name="dataCadastro" id="dataCadastro" aria-describedby="info-data">
                <div class="form-text" id="info-data">
                    <span class="text-danger"><?= session()->getFlashdata("errors")["dataCadastro"] ?? "" ?></span>
                </div>
            </div>
            <div class="col m-3">
                <label class="form-label" for="titulo">Título</label>
                <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Informe título (Obrigatório)"
                    aria-describedby="info-titulo">
            </div>
            <div class="col m-3">
                <label class="form-label" for="idAtividade">Tipo de Atividade</label>
                <select class="form-select" name="idAtividade" id="idAtividade">
                    <option value="">Informe uma atividade (Obrigatório)</option>
                    <?php foreach ($atividades as $atividade) : ?>
                        <option value="<?= $atividade->idAtividade ?>"><?= $atividade->nome . " - R$" . $atividade->valor ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-3 m-3">
            <label class="form-label" for="valor">Valor</label>
            <input class="form-control" type="text" name="valor" id="valor"
            placeholder="Informe valor  (Obrigatório)"
            aria-describedby="info-minuto"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
            <div class="form-text">
                <span class="text-danger">
                    <?= session()->getFlashdata("errors")["valor"] ?? "" ?>
                </span>
            </div>
        </div>
        <div class="m-3">
            <label class="form-label" for="descricao">Descrição <span class="text-danger">(Obrigatório)</span></label>
            <textarea class="form-control" name="descricao" id="" rows="10"></textarea>
        </div>
        <button class="btn btn-success m-3" type="submit"> <i class="bi bi-floppy"></i> Salvar</button>
        <a class="btn btn-secondary" href="<?= base_url("servico/listar/".$orcamento->idOrcamento)?>"> <i class="bi bi-list"></i> Serviços</a>
    </form>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>
<script>

</script>
<?= $this->endSection() ?>