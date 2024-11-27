<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="border m-3">

    <form action="<?= url_to("estoque.onSave") ?>" method="post">
        <h3 class="h3 text-center m-3"><strong>Formulário Estoque de peças</strong></h3>
        <div class="row">
            <input type="hidden" name="idEstoque" value="<?= $estoque->idEstoque ?>">
            <div class="col m-3">
                <label for="idEspecificacao" class="form-label">Especificação da peça</label>
                <select class="form-select" name="idEspecificacao" id="idEspecificacao" aria-describedby="info-especificacao">
                    <?php foreach ($especificacoes as $especificacao) : ?>
                        <option <?= $especificacao->idEspec==$estoque->idEspecificacao ?"selected" : "" ?>
                         value="<?= $especificacao->idEspec ?>"> <?= $especificacao->nomePeca . " " . $especificacao->dimensaoEspec . " " . $especificacao->especEspec ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="info-especificacao" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["idEspecificacao"] ?? "" ?>
                    </span>
                </div>
            </div>
            <div class="col m-3">
                <label for="idMarca" class="form-label"> Marca </label>
                <select class="form-select" name="idMarca" id="idMarca" aria-describedby="info-marca">
                    <?php foreach ($marcas as $marca) : ?>
                        <option <?= $marca->idMarca==$estoque->idMarca ? "selected" : "" ?>
                        value="<?= $marca->idMarca ?>"> <?= $marca->nome ?> </option>
                    <?php endforeach; ?>
                </select>
                <div id="info-marca" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["idMarca"] ?? "" ?>
                    </span>
                </div>
            </div>
            <div class="col m-3">
                <label class="form-label" for="modo">Modelo Organização</label>
                <select class="form-select" name="modo" id="modo" aria-describedby="info-modo">
                    <option <?= $estoque->modo == "1" ? "selected" : "" ?>
                    value="1">Peso Quilograma</option>
                    <option <?= $estoque->modo == "2" ? "selected" : "" ?>
                    value="2">Litro</option>
                    <option <?= $estoque->modo == "3" ? "selected" : "" ?>
                    value="3">Unidade</option>
                </select>
                <div id="info-modo" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["modo"] ?? "" ?>
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col m-3">
                    <label for="quantiaEstoque" class="form-label"> Quantia em estoque </label>
                    <input class="form-control" type="text" name="quantiaEstoque" id="quantiaEstoque"
                    placeholder="Informe quantia em estoque (Obrigatório)" aria-describedby="info-quantiEstoque"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                    value="<?= $estoque->quantiaEstoque ?>">
                    <div class="form-label">
                        <span class="text-danger">
                            <?= session()->getFlashdata("errors")["quantiaEstoque"] ?? "" ?>
                        </span>
                    </div>
                </div>

                <div class="col m-3">
                        <label class="form-label" for="minimoEstoque">Quantia mínima para estoque</label>
                        <input type="text" name="minimoEstoque" id="minimoEstoque" class="form-control"
                        placeholder="Informe valor mínimo para estoque" aria-describedby="info-minimoEstoque"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                        value="<?= $estoque->minimoEstoque ?>">
                        <div id="info-minimoEstoque" class="form-label">
                            <span class="text-danger">
                            <?= session()->getFlashdata("errors")["minimoEstoque"] ?? "" ?>
                            </span>
                        </div>
                </div>

                <div class="col m-3">
                        <label class="form-label" for="valor">Valor R$</label>
                        <input type="text" name="valor" id="valor" class="form-control"
                        placeholder="Informe valor (Obrigátorio)" aria-describedby="info-valor"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                        value="<?= $estoque->valor ?>">
                        <div class="form-label">
                            <span>
                                <?=session()->getFlashdata("errors")["valor"] ?? ""?>
                            </span>
                        </div>
                        
                </div>
            </div>

        </div>
        <button class="btn btn-success m-3" type="submit"> <i class="bi bi-floppy"></i> Salvar</button>
        <a class="btn btn-secondary" href="<?= url_to("estoque.listar") ?>"> <i class="bi bi-list"></i>  Estoques </a>
    </form>

</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>