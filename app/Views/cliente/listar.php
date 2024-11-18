<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="m-3">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-secondary btn-sm" href="<?= url_to("localidade.listar") ?>"> <i class="bi bi-list"></i> Localidades</a>
        <a class="btn btn-secondary btn-sm" href="<?= url_to("cidade.listar") ?>"> <i class="bi bi-list"></i> Cidades</a>
        <a class="btn btn-secondary btn-sm" href="<?= url_to("estado.listar") ?>"> <i class="bi bi-list"></i> Estados</a>
    </div>
</div>
<div class="m-3">
    <?php if (session()->has("info")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata("info") ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->has("errors")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata("errors") ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>

<div class="border">
    <h3 class="h3 text-center m-3"> <strong>Lista de Clientes</strong> </h3>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-start">Código</th>
                <th scope="col" class="text-start">Nome completo</th>
                <th scope="col" class="text-end">
                    <a class="btn btn-success btn-sm m-1" href="<?= url_to("cliente.inserir") ?>"> <i class="bi bi-plus"></i> Inserir</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($clientes)) : ?>
                <?php foreach ($clientes as $cliente) : ?>
                    <tr>
                        <th scope="row" class="text-start"><?= $cliente->idCliente ?></th>
                        <td class="text-start"><?= $cliente->nome ?></td>
                        <td class="text-end">

                            <a class="dropdown-togglebtn btn btn-primary btn-sm m-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i> Ações
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url("cliente/editar/".$cliente->idCliente) ?>"> <i class="bi bi-pencil"></i> Editar</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-list"></i> Listar ordens de serviços</a></li>
                                <li><a class="dropdown-item" href="<?= base_url("inscricao-cliente/listar/".$cliente->idCliente) ?>"> <i class="bi bi-list"></i>  Listar inscrição</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"> <i class="bi bi-trash"></i>  Excluir</a></li>
                            </ul>

                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <th colspan="3" scope="row" class="text-center">Nenhum registro encontrado no sistema</th>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="m-3">
        <?= $pager->links(); ?>
    </div>
</div>

<!-- MODAL PARA DELETAR -->
<?php if (!empty($clientes)) : ?>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="bi bi-x"></i> Cancelar</button>
                    <a href="<?= base_url("cliente/onDelete/" . $cliente->idCliente) ?>" class="btn btn-danger"> <i class="bi bi-trash"></i> Deletar</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>