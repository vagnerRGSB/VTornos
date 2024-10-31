<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border m-3">
    <h3 class="h3 text-center m-3">Formulário Especificação de peça</h3>
    <div class="container">
        <form action="<?= url_to("especificacao.onSave") ?>" method="post">
            <div class="m-3">
                <label for="idPeca" class="form-label">Tipo de peça</label>
                <select name="idPeca" id="idPeca" class="form-select" aria-describedby="info-peca">
                    <option value="">Seleção obrigatória</option>
                    <?php foreach ($pecas as $peca) : ?>
                        <option value="<?= $peca->idPeca ?>"> <?= $peca->nome ?> </option>
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
                    placeholder="Informa as dimenções da peça (Obrigatório)" class="form-control">
                <div id="info-dimensao" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("erro")["dimensao"] ?? "" ?>
                    </span>
                </div>
            </div>
            <div class="m-3">
                <label for="especificacao">Informe especificação do produto</label>
                <input type="text" name="especificacao" id="especificacao" aria-describedby="info-espec"
                    placeholder="Informe especificação do produto (Obrigatório)" class="form-control">
                <div id="info-espec" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("erro")["especificacao"] ?? " " ?>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-success m-3"> <i class="bi bi-floppy"></i> Salvar</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>