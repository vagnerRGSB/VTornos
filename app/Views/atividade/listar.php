<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<?php if (session()->has("info")) : ?>
    <div class="m-3">
        <div class="d-grid gap-2 d-md-block">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata()["info"] ?? "" ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->has("errors")) : ?>
    <div class="m-3">
        <div class="d-grid gap-2 d-md-block">
            <div class="alert alert-sucess alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata()["error"] ?? "" ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="border mt-3">
    <h3 class="h3 text-center m-3"><strong>Lista Atividades</strong></h3>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-start">Código</th>
                <th scope="col" class="text-start">Atividade</th>
                <th scope="col" class="text-start">Valor</th>
                <th scope="col" class="text-end">
                    <a class="btn btn-success btn-sm m-1" href="<?= url_to("atividade.inserir") ?>"> <i class="bi bi-plus"></i> Inserir </a>
                    </td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($atividades)) : ?>
                <?php foreach ($atividades as $atividade) : ?>
                    <tr>
                        <th scope="row" class="text-start"><?= $atividade->idAtividade ?></th>
                        <td class="text-start"><?= $atividade->nome ?></td>
                        <td class="text-start"><?= $atividade->valor ?></td>
                        <td class="text-end">
                        <a class="dropdown-togglebtn btn btn-primary btn-sm m-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i> Ações
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url("atividade/editar/".$atividade->idAtividade) ?>"> <i class="bi bi-pencil"></i> Editar</a></li>
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
                    <th colspan="5" class="text-center">
                        Nenhum registro encontrado no sistema
                    </th>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="m-3">
                <?= $pager->links(); ?>
    </div>
</div>
<!-- MODAL PARA DELETAR -->
<?php if (!empty($atividades)) : ?>
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
                    <a href="<?= base_url("atividades/onDelete/" . $atividade->idAtividade) ?>" class="btn btn-danger"> <i class="bi bi-trash"></i> Deletar</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>