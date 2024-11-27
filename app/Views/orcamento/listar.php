<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="border mt-3">
    <h5 class="h5 text-center m-3"><strong>Informações sobre o cliente</strong></h5>
    <input type="hidden" name="idCliente" value="<?= $cliente->idCliente ?>">
    <div class="row">
        <div class="col-4 m-3">
            <label for="" class="form-label">Nome Cliente</label>
            <input type="text" value="<?= $cliente->nome ?>" class="form-control" disabled>
        </div>
        <div class="col-3 m-3">
            <label for="" class="form-label">Categoria</label>
            <input type="text" class="form-control" disabled
                value="<?= $cliente->categoria == 1 ? "Pessoa física - CPF" : "Pessoa Jurídica - CNPJ" ?>">
        </div>
        <div class="col-3 m-3">
            <label for="" class="form-label">Número Categoria</label>
            <input type="text" value="<?= $cliente->cpfCnpj ?>" class="form-control" disabled>
        </div>
    </div>
</div>

<div class="border">
    <h3 class="h3 text-center"><strong>Lista Orcamento</strong></h3>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-start">Código</th>
                <th scope="col" class="text-start">Série</th>
                <th scope="col" class="text-end">
                    <a class="btn btn-success btn-sm m-1" href=""> <i class="bi bi-plus"></i> Inserir</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($orcamentos)) : ?>
                <?php foreach ($orcamentos as $orcamento) : ?>
                    <tr>
                        <th scope="row" class="text-start"><?= $orcamento->idOrcamento ?></th>
                        <td>
                            <?= $orcamento->nomeMaquinario . " " . $orcamento->nomeMarca . " " . $orcamento->nomeModelo . " " . $orcamento->nomeSerie ?>
                        </td>
                        <td>
                            <a class="dropdown-togglebtn btn btn-primary btn-sm m-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i> Ações
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url("marca/editar/" . $marca->idMarca) ?>"> <i class="bi bi-pencil"></i> Editar</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"> <i class="bi bi-trash"></i> Excluir</a></li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <th scope="row" colspan="3" class="text-center">Nenhum registro encontrado no sistema</th>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
    <div>
        <?= $pager->links(); ?>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>