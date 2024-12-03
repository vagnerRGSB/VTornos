<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border">
    <h3 class="h3 text-center m-3"><strong>Formulário Orçamento</strong></h3>
    <div class="m-3">
        <label class="form-label" for="nomeCliente">Nome do cliente</label>
        <input class="form-control" type="text" name="nomeCliente" id="nomeCliente" value="<?= $cliente->nome ?>" disabled>
    </div>
    <form action="<?= url_to("orcamento.onSave") ?>" method="post">
        <input type="hidden" name="idCliente" value="<?= $cliente->idCliente ?>">
        <div class="m-3">
            <label class="form-label" for="idSerie">Série</label>
            <select class="form-select" name="idSerie" id="idSerie" aria-describedby="info-serie">
                <option value="">Selecione uma Série (Obrigatório)</option>
                <?php foreach ($series as $serie) : ?>
                    <option value="<?= $serie->idSerie ?>">
                        <?= $serie->nomeMarca . " " . $serie->nomeModelo . " " . $serie->descricaoSerie ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="form-text">
                <span class="text-danger">
                    <?= session()->getFlashdata("errors")["idSerie"] ?? "" ?>
                </span>
            </div>
        </div>
        <div class="m-3">
            <label class="form-label" for="observacao">Observação</label>
            <input class="form-control" type="text" name="observacao" id="observacao" placeholder="Informe observação (Opcional)"
                aria-describedby="info-observacao">
            <div class="form-text">
                <span class="text-danger">
                    <?= session()->getFlashdata("errors")["observacao"] ?? "" ?>
                </span>
            </div>
        </div>

        <button class="btn btn-success m-3" type="submit"> <i class="bi bi-floppy"></i> Salvar</button>
        <a class="btn btn-secondary" href="<?= base_url("orcamento/listar/" . $cliente->idCliente) ?>"> <i class="bi bi-list"></i> Orçamentos </a>
    </form>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>