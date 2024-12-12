<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border mt-3">
    <h3 class="h3 text-center m-3"><strong>Fomulário produtos para o serviço</strong></h3>
    <div class="col-6 m-3">
        <label class="form-label" for="infoServico">Informações sobre o serviço</label>
        <input class="form-control" type="text"
            value="<?= $infoServico->nomeMarca . " " . $infoServico->nomeModelo . " " . $infoServico->descricaoSerie . " " . $infoServico->observacaoOrcamento . "; " . $infoServico->tituloServico . " - " . $infoServico->nomeCliente ?>"
            disabled>
    </div>
    <form action="<?= url_to("produto.onSave") ?>" method="post">
        <input type="hidden" name="idProduto" value="<?= $produto->idProduto ?>">
        <input type="hidden" name="idServico" value="<?= $produto->idServico ?>">
        <div class="row">
            <div class="col-6 m-3">
                <label class="form-label" for="idEstoque">Produtos em estoque</label>
                <select class="form-select" name="idEstoque" id="idEstoque" aria-describedby="info-produto">
                    <option value="">Selecione um produto (Obrigatório) </option>
                    <?php foreach ($estoques as $estoque) : ?>
                        <option <?= $estoque->idEstoque == $produto->idEstoque ? "selected" : "" ?> 
                        value="<?= $estoque->idEstoque ?>">
                            <?= $estoque->nomeMarca . " " . $estoque->nomePeca . " " . $estoque->especificacaoPeca . " " . $estoque->dimensaoPeca ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="form-text" id="info-produto">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["idEstoque"] ?? ''  ?>
                    </span>
                </div>
            </div>
            <div class="col-3 m-3">
                <label class="form-label" for="quantia">Quantia </label>
                <input class="form-control" type="text" name="quantia" id="quantia" placeholder="Informe quantia (Obrigatório)" aria-describedby="info-quantia"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                    value="<?= $produto->quantia ?>">
            </div>
        </div>
        <button class="btn btn-success m-3" type="submit"> <i class="bi bi-floppy"></i> Salvar</button>
        <a class="btn btn-secondary" href="<?= base_url("servico/listar/".$produto->idServico) ?>"> <i class="bi bi-list"></i> Produtos para o serviço</a>
    </form>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>