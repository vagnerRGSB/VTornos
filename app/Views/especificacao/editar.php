<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border m-3">
    <h3 class="h3 text-center m-3">Formulário Especificação de peça</h3>
    <div class="container">
        <form action="<?= url_to("especificacao.onSave") ?>" method="post">
            <div class="m-3">
                <input type="hidden" name="idEspecificacao" 
                value="<?= $especificacao->idEspecificacao ?>">
                <label for="idPeca" class="form-label">Tipo de peça</label>
                <select name="idPeca" id="idPeca" class="form-select" aria-describedby="info-peca">
                    <?php foreach ($pecas as $peca) : ?>
                        <option <?= $peca->idPeca==$especificacao->idPeca ? "selected" : "" ?>
                        value="<?= $peca->idPeca ?>"> <?= $peca->nome ?> </option>
                    <?php endforeach; ?>
                </select>
                <div id="info-peca" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("erro")["idPeca"] ?? "" ?>
                    </span>
                </div>
            </div>
            <div class="m-3">
                <label for="dimensao" class="form-label">Dimensões da peça</label>
                <input type="text" name="dimensao" id="dimensao" aria-describedby="info-dimensao"
                    placeholder="Informa as dimenções da peça (Obrigatório)" class="form-control"
                    value="<?= $especificacao->dimensao ?>">
                <div id="info-dimensao" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("erro")["dimensao"] ?? "" ?>
                    </span>
                </div>
            </div>
            <div class="m-3">
                <label for="especificacao">Informe especificação do produto</label>
                <input type="text" name="especificacao" id="especificacao" aria-describedby="info-espec"
                    placeholder="Informe especificação do produto (Obrigatório)" class="form-control"
                    value="<?= $especificacao->especificacao ?>">
                <div id="info-espec" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("erro")["especificacao"] ?? " " ?>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-success m-3"> <i class="bi bi-floppy"></i> Salvar</button>
            <a href="<?= url_to("especificacao.listar") ?>" class="btn btn-secondary"> <i class="bi bi-list"></i> Especificações</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>