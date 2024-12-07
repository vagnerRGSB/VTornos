<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border mt-3">
    <h3 class="h3 text-center m-3"><strong>Formulário Serviço</strong></h3>
    <form action="<?= url_to("servico.onSave") ?>" method="post">
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
            <label class="form-label" for="minutoServico">Valor</label>
            <input class="form-control" type="text" name="minutoServico" id="minutoServico"
            placeholder="Informe minutos trabalhados (Obrigatório)"
            aria-describedby="info-minuto">
            <div class="form-text">
                <span class="text-danger">
                    <?= session()->getFlashdata("errors")["minutoServico"] ?? "" ?>
                </span>
            </div>
        </div>
        <div class="m-3">
            <label class="form-label" for="descricao">Descrição <span class="text-danger">(Obrigatório)</span></label>
            <textarea class="form-control" name="descricao" id="" rows="10"></textarea>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>
<script>

</script>
<?= $this->endSection() ?>