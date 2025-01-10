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
                                <a class="btn btn-success" href="<?= url_to("serie.inserir") ?>"><i class="bi bi-plus"></i> </a>
                                <a class="btn btn-secondary" href="<?= url_to("serie.listar") ?>"> <i class="bi bi-list"></i> </a>

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
                                <h6 class="h-6 card-category"> Produtos
                                    <span class="card-title badge text-bg-info">
                                        <?= $count_produtos->total_produtos ?>
                                    </span>
                                </h6>
                                <a class="btn btn-success" href="<?= url_to("estoque.inserir") ?>"><i class="bi bi-plus"></i> </a>
                                <a class="btn btn-secondary" href="<?= url_to("estoque.listar") ?>"> <i class="bi bi-list"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="container">
        Ola
    </div>


</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/dashboards/dashboards.js"></script>
<script src="https://code.highcharts.com/dashboards/modules/layout.js"></script>

<script type="text/javascript">
    $(function() {
        Highcharts.chart('container', {
            title: {
                text: 'Orçamentos por mês'
            },

            accessibility: {
                point: {
                    valueDescriptionFormat: '{xDescription}{separator}{value} million(s)'
                }
            },

            xAxis: {
                title: {
                    text: 'Meses'
                },
                categories: <?= $quantidade_servicos ?>
            },

            yAxis: {
                type: 'Quantidade',
                title: {
                    text: 'Quantia de orçamentos'
                }
            },

            tooltip: {
                headerFormat: '<b>{series.name}</b><br />',
                pointFormat: '{point.y} million(s)'
            },

            series: [{
                name: 'Serviços',
                keys: ['y', 'color'],
                data: <?= $eixoX ?>
            }]
        });

    });
</script>
<?= $this->endSection() ?>