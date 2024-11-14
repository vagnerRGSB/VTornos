<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="border m-3">
    <h3 class="h3 text-center m-3"><strong>Formulário de Cliente</strong></h3>
    <form action="<?= url_to("cliente.onSave") ?>" method="post">
        <div class="row">
            <div class="col m-3">
                <input type="hidden" name="idCliente" value="<?= $cliente->idCliente ?>">
                <label for="nome" class="form-label"> Nome do cliente </label>
                <input type="text" name="nome" class="form-control" placeholder="Informe nome do cliente (Obrigatório)"
                    aria-describedby="info-nome">
                <div id="info-nome" class="form-text">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["nome"] ?? "" ?>
                    </span>
                </div>
            </div>

            <div class="col-2 m-3">
                <label class="form-label" for="categoria">Categoria</label>
                <select class="form-select" name="categoria" id="categoria" aria-describedby="info-categoria">
                    <option <?php $cliente->categoria == "f" ? "selected" : "" ?>
                     value="f">Pessoa física - CPF</option>
                    <option <?php $cliente->categoria == "j" ? "selected" : "" ?>
                     value="j">Pessoa Jurídica - CNPJ</option>
                </select>
                <div class="form-text" id="info-categoria">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["categoria"] ?? "" ?>
                    </span>
                </div>
            </div>

            <div class="col m-3">
                <label class="form-label" for="cpfCnpj">Número do cadastro</label>
                <input type="text" name="cpfCnpj" class="form-control" placeholder="Informe número do cadastro conforme campo Categoria (Obrigatório)"
                    aria-describedby="info-cadastro"
                    value=<?= $cliente->numero ?>>
                <div id="info-cadastro" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["cpfCnpj"] ?? "" ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col m-3">
                <label class="form-label" for="idLocalidade">Localidade</label>
                <select class="form-select" name="idLocalidade" id="idLocalidade" aria-describedby="info-idLocalidade">
                    <?php foreach ($localidades as $localidade) : ?>
                        <option <?= $cliente->idLocalidade == $localidade->idLocalidade  ? "selected" : ""?>
                        value="<?= $localidade->idLocalidade ?>"> <?= $localidade->nome . " - " . $localidade->cep ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col m-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email"
                    placeholder="Informe e-mail (Opcional)" aria-describedby="info-email"
                    value="<?= $cliente->email ?>">
                <div id="info-email" class="form-text">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["email"] ?? "" ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col m-3">
                <label class="form-label" for="endereco">Endereço</label>
                <input class="form-control" type="text" name="endereco" placeholder="Informe endereço (Obrigatório)"
                    aria-describedby="info-endereco"
                    value="<?= $cliente->endereco ?>">
                <div id="info-endereco" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["endereco"] ?? "" ?>
                    </span>
                </div>
            </div>
            <div class="col m-3">
                <label class="form-label" for="numero">Número</label>
                <input class="form-control" type="text" name="endereco" placeholder="Informe número (Obrigatório)"
                    aria-describedby="info-numero"
                    value="<?= $cliente->numero ?>">
                <div id="info-numero" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["numero"] ?? "" ?>
                    </span>
                </div>
            </div>
            <div class="col m-3">
                <label class="form-label" for="complemento">Complemento</label>
                <input class="form-control" type="text" name="complemento" id="complemento"
                    placeholder="Informe complemento (Opcional)" aria-describedby="info-complemento"
                    value="<?= $cliente->complemento ?>">
                <div id="info-complemento" class="form-label">
                    <span class="text-danger">
                        <?= session()->getFlashdata("errors")["complemento"] ?? "" ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="border m-3">
            <h5 class="h5 text-center"><strong>Lista de Incrições</strong></h5>
            <div class="d-grid gap-2 m-3">
                <a class="btn btn-primary btn-sm" href=""> <i class="bi bi-plus"></i> Inserir</a>
            </div>

        </div>


        <button class="btn btn-success m-3" type="submit"> <i class="bi bi-floppy"></i> Salvar</button>
        <a href="<?= url_to("cliente.listar") ?>" class="btn btn-secondary"> <i class="bi bi-list"></i> Clientes</a>
    </form>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>