<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("sytle") ?>
<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="bg-body-tertiary">

    <div class="row justify-content-center bg-secondary text-white">
        <div class="col-sm-2 col-md-2 m-1">
            <div class="card card-stats card-round bg-light text-dark">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <h6 class="h-6 card-category">Clientes
                                    <span class="card-title badge text-bg-info">
                                        <?= $count_clientes->total_clientes ?>
                                    </span>
                                </h6>
                                <a class="btn btn-success" href="<?= url_to("cliente.inserir") ?>"><i class="bi bi-plus"></i> </a>
                                <a class="btn btn-secondary" href="<?= url_to("cliente.listar") ?>"> <i class="bi bi-list"></i> </a>
                                <a class="btn btn-info" href=""> <i class="bi bi-filetype-pdf"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-2 col-md-2 m-1">
            <div class="card card-stats card-round bg-light text-dark">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <h6 class="h-6 card-category">Séries Maquinários
                                    <span class="card-title badge text-bg-info">
                                        <?= $count_series->total_series ?>
                                    </span>
                                </h6>
                                <a class="btn btn-success" href="<?= url_to("cliente.inserir") ?>"><i class="bi bi-plus"></i> </a>
                                <a class="btn btn-secondary" href="<?= url_to("cliente.listar") ?>"> <i class="bi bi-list"></i> </a>
                                <a class="btn btn-info" href=""> <i class="bi bi-filetype-pdf"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-2 col-md-2 m-1">
            <div class="card card-stats card-round bg-light text-dark">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <h6 class="h-6 card-category">Atividades
                                    <span class="card-title badge text-bg-info">
                                        <?= $count_atividades->total_atividades ?>
                                    </span>
                                </h6>
                                <a class="btn btn-success" href="<?= url_to("atividade.inserir") ?>"><i class="bi bi-plus"></i> </a>
                                <a class="btn btn-secondary" href="<?= url_to("atividade.listar") ?>"> <i class="bi bi-list"></i> </a>
                                <a class="btn btn-info" href=""> <i class="bi bi-filetype-pdf"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-2 col-md-2 m-1">
            <div class="card card-stats card-round bg-light text-dark">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <h6 class="h-6 card-category">Atividades
                                    <span class="card-title badge text-bg-info">
                                        <?= 100 ?>
                                    </span>
                                </h6>
                                <a class="btn btn-success" href="<?= url_to("atividade.inserir") ?>"><i class="bi bi-plus"></i> </a>
                                <a class="btn btn-secondary" href="<?= url_to("atividade.listar") ?>"> <i class="bi bi-list"></i> </a>
                                <a class="btn btn-info" href=""> <i class="bi bi-filetype-pdf"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>