<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>


<div class="d-grid gap-2 d-md-flex justify-content-md-end m-3">
  <a href="<?= url_to("estoque.listar") ?>" class="btn btn-secondary btn-sm"> <i class="bi bi-list"></i> Estoques  </a>
  <a href="<?= url_to("marca.listar") ?>" class="btn btn-secondary btn-sm"> <i class="bi bi-list"></i> Marcas</a>
  <a href="<?= url_to("peca.listar") ?>" class="btn btn-secondary btn-sm"> <i class="bi bi-list"></i> Peças</a>
</div>


<div class="m-3">
    <?php if (session()->has("info")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata("info") ?? "" ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->has("error")) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata("error") ?? "" ?>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>

<div class="border m-3">
    <h3 class="h3 text-center"> <strong> Lista de especificações de peças </strong> </h3>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-start">Código</th>
                <th scope="col" class="text-start">Especificação das peças</th>
                <th scope="col" class="text-end">
                    <a class="btn btn-success btn-sm" href="<?= url_to("especificacao.inserir") ?>"> <i class="bi bi-plus"></i> Inserir</a>
                    </td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($especificacoes)) : ?>
                <?php foreach ($especificacoes as $espec) : ?>
                    <tr>
                        <th scope="row"><?= esc($espec->idEspec) ?></td>
                        <td><?= $espec->nomePeca." ". $espec->dismensaoEspec." ". $espec->especEspec  ?></td>
                        <td class="text-end">
                        <a class="dropdown-togglebtn btn btn-primary btn-sm m-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i> Ações
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url("especificao-pecas/editar/" . $espec->idEspec) ?>"> <i class="bi bi-pencil"></i> Editar</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"> <i class="bi bi-trash"></i> Excluir</a></li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <td colspan="3" scope="row" class="text-center">Nenhum registro encontrado no sistema</td>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="m-3">
                <?= $pager->links() ?>
    </div>
</div>

<?php if (!empty($especificacoes)) : ?>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="<?= base_url("/especificao-pecas/onDelete/" . $espec->idEspec) ?>" class="btn btn-danger">Deletar</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>