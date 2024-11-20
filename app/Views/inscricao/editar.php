<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border m-3">
    <h3 class="h3 text-center m-3"><strong>Formulário Inscrição</strong></h3>
    <form action="<?= url_to("inscricao.onSave") ?>" method="post">
        <input type="hidden" name="idCliente" value="<?= $cliente->idCliente ?>">
        <input type="hidden" name="idInscricao" value="<?= $inscricao->idInscricao ?>">
        <div class="m-3">
            <label class="form-label" for="nome">Nome da Inscrição</label>
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Informe nome da inscrição (Obrigatório)"
                aria-describedby="info-nome"
                value="<?= $inscricao->nome ?>">
            <div class="form-text" id="info-nome">
                <span class="text-danger">
                    <?= session()->getFlashdata("errors")["nome"] ?? "" ?>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col m-3">
                <label class="form-label" for="inscMunicipal">Inscrição Municipal</label>
                <input class="form-control" type="text" name="inscMunicipal" id="inscMunicipal"
                    placeholder="Informe código municipal (Opcional)" aria-describedby="info-inscMunicipal"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                    value="<?= $inscricao->inscMunicipal ?>">
                <div class="form-text" id="info-inscMunicipal">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["inscMunicipal"] ?? "" ?>
                    </span>
                </div>
            </div>
            <div class="col m-3">
                <label class="form-label" for="inscEstadual">Inscrição Estadual</label>
                <input class="form-control" type="text" name="inscEstadual" id="inscEstadual"
                    placeholder="Informe Código Estadual (Obrigatório)" aria-describedby="info-inscEstadual"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                    value="<?= $inscricao->inscEstadual ?>">
                <div class="form-text" id="info-inscEstadual">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["inscEstadual"] ?? "" ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col m-3">
                <label for="idLocalidade"> Localidade </label>
                <select class="form-select" name="idLocalidade" id="idLocalidade" aria-describedby="info-localidade">
                    <?php foreach ($localidades as $localidade) : ?>
                        <option <?= $localidade->idLocalidade==$inscricao->idLocalidade ? "selected" : "" ?>
                        value="<?= $localidade->idLocalidade ?>">
                            <?= $localidade->nomeLocalidade." ".$localidade->nomeCidade." ".$localidade->siglaEstado ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="form-text" id="info-localidade">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["idLocalidade"] ?? "" ?>
                    </span>
                </div>
            </div>
            <div class="col m-3">
                <label class="form-label" for="endereco">Endereço</label>
                <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Informe endereço completo (Opcional)"
                    aria-describedby="info-endereco"
                    value="<?= $inscricao->endereco ?>">
                <div class="info-endereco" id="info-endereco">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["endereco"] ?? "" ?>
                    </span>
                </div>
            </div>
        </div>
        <button class="btn btn-success m-3" type="submit"> <i class="bi bi-floppy"></i> Salvar </button>
        <a class="btn btn-secondary" href="<?= url_to("cliente.listar") ?>"> <i class="bi bi-list"></i> Clientes </a>
    </form>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>