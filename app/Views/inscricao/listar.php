<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="d-grid gap-2 d-md-flex justify-content-md-end m-3">
    <a class="btn btn-secondary btn-sm" href="<?= url_to("cliente.listar") ?>"> <i class="bi bi-list"></i> Clientes </a>
</div>

<div class="m-3">
    <?php if (session()->has("info")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata("info") ?? "" ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->has("error")) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata("error") ?? "" ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>
<input type="hidden" name="idCliente" value="<?= $cliente->idCliente ?>">

<div class="border">
    <h5 class="h5 text-center m-3"><strong>Informações sobre o cliente</strong></h5>
    <div class="row">
        <div class="col-4 m-3">
            <label for="" class="form-label">Nome Cliente</label>
            <input type="text" value="<?= $cliente->nomeCliente ?>" class="form-control" disabled>
        </div>
        <div class="col-3 m-3">
            <label for="" class="form-label">Categoria</label>
            <input type="text" class="form-control" disabled
            value="<?= $cliente->categoriaCliente == 1 ? "Pessoa física - CPF" : "Pessoa Jurídica - CNPJ" ?>">
        </div>
        <div class="col-3 m-3">
            <label for="" class="form-label">Número Categoria</label>
            <input type="text" value="<?= $cliente->cpfCnpjCliente ?>" class="form-control" disabled>
        </div>
    </div>
</div>
<div class="border">
        <h3 class="h3 text-center"><strong>Lista de Inscrições</strong></h3>
        <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-start">Código</th>
                <th scope="col" class="text-start">Nome</th>
                <th scope="col" class="text=start">Localidade</th>
                <th scope="col" class="text-end">
                    <a class="btn btn-success btn-sm m-1" href="<?= base_url("inscricao-cliente/inserir/".$cliente->idCliente) ?>"> <i class="bi bi-plus"></i> Inserir</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($incricoes)) : ?>
                <?php foreach($incricoes as $incricao) : ?>
                    <tr>
                        <th scope="row" class="text-start"> <?= $inscricao->idInscricao ?> </th>
                        <td class="text-start"> <?= $incricao->nomeInscricao ?> </td>
                        <td class="text-start"> <?= $inscricao->localidadeInscricao ?> </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <th colspan="4" scope="row" class="text-center">Nenhum registro encontrado no sistema</th>
                </tr>
            <?php endif; ?>
        </tbody>
        <tbody>

        </tbody>
        </table>
</div>



<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>