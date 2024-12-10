<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="border mt-3">
    <h3 class="h5 text-center"><strong>Informações sobre Orcamento de serviço</strong></h3>
    <div class="row">
        <div class="col-4 m-3">
            <label class="form-label" for="nomeCliente"> Cliente </label>
            <input class="form-control" type="text"
                value="<?= $infoServico->nomeCliente ?>"
                disabled>
        </div>
        <div class="col-6 m-3">
            <label class="form-label" for="infoServico">Código Orçamento - Descrição - Serviço </label>
            <input class="form-control" type="text"
                value="<?= $infoServico->idOrcamento . " - " . $infoServico->nomeMarca . " " . $infoServico->nomeModelo . " " . $infoServico->descricaoSerie . " " . $infoServico->observacaoOrcamento . " - " . $infoServico->tituloServico ?> "
                disabled>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>